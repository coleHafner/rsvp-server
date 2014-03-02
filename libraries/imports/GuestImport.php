<?php

class GuestImport extends BaseImport {

	const COL_FIRST_NAME	= 0;
	const COL_LAST_NAME		= 1;
	const COL_ADDR_STREET	= 2;
	const COL_ADDR_CITY		= 3;
	const COL_ADDR_STATE	= 4;
	const COL_ADDR_ZIP		= 5;

	public function run() {
		$fp = fopen($this->filename, 'r');
		$data = array();
		$this->startRun();

		try {

			//get raw data
			while (!feof($fp)) {

				$line = fgetcsv($fp);

				if (!$line) {
					$this->skip($line, 'no line');
					continue;
				}

				$guest = array_combine($this->cols, $line);
				$first_names = self::_splitNames($guest[self::COL_FIRST_NAME]);
				$last_names = self::_splitNames($guest[self::COL_LAST_NAME]);

				//import guests
				for ($i = 0; $i < count($first_names); $i++) {

					$address = null;

					if (!empty($guest[self::COL_ADDR_STREET]) &&
						!empty($guest[self::COL_ADDR_CITY]) &&
						!empty($guest[self::COL_ADDR_STATE]) &&
						!empty($guest[self::COL_ADDR_ZIP])) {
						$address = $this->processAddress($guest);
					}//valid address

					$first_name = trim($first_names[$i]);
					$last_name = (isset($last_names[$i])) ? trim($last_names[$i]) : trim($last_names[0]);

					$parent_guest_id = $i == 0 ? null : $guest_obj->getGuestId();
					
					$guest_obj = $this->processGuest(
						$first_name,
						$last_name,
						$address,
						$parent_guest_id,
						count($first_names)
					);

					if (!$guest_obj instanceof Guest) {
						$this->skip($guest, 'guest did not create');
						continue;
					}

					$g2gt = $this->processGuestType($guest_obj);

					if (!$g2gt instanceof GuestToGuestType) {
						$this->skip($guest, 'guest to guest type did not create');
						continue;
					}
				}

				$this->showProgress();
			}

			$this->endrun(true);

		}catch (Exception $e) {
			$this->endRun(false);
			throw $e;
		}
	}

	/**
	 * @param	array		$guest		guest info
	 * @return	Address
	 */
	public function processAddress(array $guest) {
		//check duplicate
		$query = new Query;
		$query->add(Address::STREET_ADDRESS, $guest[self::COL_ADDR_STREET]);
		$query->add(Address::STATE, $guest[self::COL_ADDR_STATE]);
		$query->add(Address::CITY, $guest[self::COL_ADDR_CITY]);
		$query->add(Address::ZIP, $guest[self::COL_ADDR_ZIP]);
		$result = Address::doSelect($query);
		$address = array_shift($result);

		if(!$address) {
			$address = new Address;
			$address->setStreetAddress($guest[self::COL_ADDR_STREET]);
			$address->setState($guest[self::COL_ADDR_STATE]);
			$address->setCity($guest[self::COL_ADDR_CITY]);
			$address->setZip($guest[self::COL_ADDR_ZIP]);
			$address->setActive(Address::STATUS_ACTIVE);
			$address->save();

			$this->log->talk("Added address: " . $address, true);

		}//dup address

		return $address;
	}

	/**
	 * Creates a new guest record
	 * @param	string		$first_name
	 * @param	string		$last_name
	 * @param	Address		$address
	 * @param	int			$parent_guest_id
	 * @return	Guest
	 */
	public function processGuest(
		$first_name,
		$last_name,
		Address $address = null,
		$parent_guest_id = null,
		$expected_count = null) {

		$query = new Query;
		$query->add(Guest::FIRST_NAME, $first_name);
		$query->add(Guest::LAST_NAME, $last_name);
		$result = Guest::doSelect($query);
		$g = array_shift($result);

		if ($g instanceof Guest) {
			return $g;
		}
		$g = new Guest;
		$g->setFirstName($first_name);
		$g->setLastName($last_name);
		$g->setActive(Guest::STATUS_ACTIVE);

		if ($address instanceof Address) {
			$g->setAddressId($address->getAddressId());
		}

		$g->save();
		$this->log->talk("Added Guest: " . $g->getFirstName() . " " . $g->getLastName(), true);

		//parent guest id
		if (!$parent_guest_id) {
			//you only get an activation code if you're a parent guest
			$code = Guest::getUniqueActivationCode($first_name);
			$g->setActivationCode($code);
			$g->setExpectedCount($expected_count);

		}else {
			$g->setParentGuestId($parent_guest_id);
		}

		$g->save();

		return $g;
	}

	/**
	 * Creates a guest to guest type relationship between guest and type.
	 * @param	Guest	$guest
	 * @param	int		$alt_type
	 * @return	GuestToGuestType
	 * @throws	RuntimeException
	 */
	public function processGuestType(Guest $guest, $alt_type = null) {

		$chosen_type = $alt_type === null ? GuestType::TYPE_GUEST : $alt_type;
		$guest_type = GuestType::retrieveByPK($chosen_type);

		if (!$guest_type instanceof GuestType) {
			throw new RuntimeException('Error: Guest type "' . $chosen_type . '" is not valid."');
		}

		$g2gt = new GuestToGuestType;
		$g2gt->setGuestId($guest->getGuestId());
		$g2gt->setGuestTypeId($guest_type->getGuestTypeId());
		$g2gt->save();
		return $g2gt;
	}

	private function _splitNames($names) {

		$names = strtolower(trim($names));

		if (strpos($names, 'and') !== false) {
			return explode('and', $names);
		}

		return array($names);
	}
}