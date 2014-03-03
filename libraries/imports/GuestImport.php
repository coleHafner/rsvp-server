<?php

class GuestImport extends BaseImport {
	/**
	 * @var	Wedding
	 */
	private $wedding = null;

	public function run() {
		//this should be overidden
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
		$parent_guest_id = null,
		$expected_count = null) {

		$first_name = $this->namePretty($first_name);
		$last_name = $this->namePretty($last_name);

		$query = new Query;
		$query->add(Guest::FIRST_NAME, $first_name);
		$query->add(Guest::LAST_NAME, $last_name);
		$query->add(Guest::WEDDING_ID, $this->wedding->getId());
		$result = Guest::doSelect($query);
		$g = array_shift($result);

		if ($g instanceof Guest) {
			return $g;
		}
		$g = new Guest;
		$g->setFirstName($first_name);
		$g->setLastName($last_name);
		$g->setActive(Guest::STATUS_ACTIVE);
		$g->setWedding($this->wedding);
		$g->save();

		//parent guest id
		if (!$parent_guest_id) {
			//you only get an activation code if you're a parent guest
			$code = Guest::getUniqueActivationCode($first_name);
			$g->setActivationCode($code);
			$g->setExpectedCount($expected_count);

		}else {
			$g->setParentId($parent_guest_id);
		}

		$g->save();

		return $g;
	}

	/**
	 * Creates a guest to guest type relationship between guest and type.
	 * @param	Guest	$guest
	 * @param	int		$alt_type
	 * @return	GuestGuestType
	 * @throws	RuntimeException
	 */
	public function processGuestType(Guest $guest, $alt_type = null) {

		$chosen_type = $alt_type === null ? GuestType::TYPE_GUEST : $alt_type;
		$guest_type = GuestType::retrieveByPK($chosen_type);

		if (!$guest_type instanceof GuestType) {
			throw new RuntimeException('Error: Guest type "' . $chosen_type . '" is not valid."');
		}

		$q = new Query;
		$q->add(GuestGuestType::GUEST_ID, $guest->getId());
		$q->add(GuestGuestType::GUEST_TYPE_ID, $chosen_type);
		$g2gt = GuestGuestType::doSelectOne($q);

		if ($g2gt instanceof GuestGuestType) {
			return $g2gt;
		}

		$g2gt = new GuestGuestType;
		$g2gt->setGuestId($guest->getId());
		$g2gt->setGuestTypeId($guest_type->getId());
		$g2gt->save();
		return $g2gt;
	}

	/**
	 * @param	Wedding		$wedding
	 * @return	GuestImport
	 */
	public function setWedding(Wedding $wedding) {
		$this->wedding = $wedding;
		return $this;
	}

	/**
	 * @return	Wedding
	 */
	public function getWedding() {
		return $this->wedding;
	}

	/**
	 * Cleans up a name
	 * @param	string	$name
	 * @return	string
	 */
	public function namePretty($name) {
		return ucfirst(strtolower(trim($name)));
	}
}