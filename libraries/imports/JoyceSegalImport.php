<?php
class JoyceSegalImport extends GuestImport {

	const COL_FIRST_NAME	= 0;
	const COL_LAST_NAME		= 1;

	public function run() {
		$fp = fopen($this->filename, 'r');
		$data = array();
		$this->startRun();

		try {

			//get raw data
			while (!feof($fp)) {

				$line = fgetcsv($fp);

				if (!$line) {
					$this->skip(array(), 'no line');
					continue;
				}

				$first_names = $this->_splitNames($line[self::COL_FIRST_NAME]);
				$last_names = $this->_splitNames($line[self::COL_LAST_NAME]);

				//import guests
				for ($i = 0; $i < count($first_names); $i++) {

					$first_name = trim($first_names[$i]);
					$last_name = (isset($last_names[$i])) ? trim($last_names[$i]) : trim($last_names[0]);

					$parent_guest_id = $i == 0 ? null : $guest_obj->getId();

					$guest_obj = $this->processGuest(
						$first_name,
						$last_name,
						$parent_guest_id,
						count($first_names)
					);

					if (!$guest_obj instanceof Guest) {
						$this->skip($line, 'guest did not create');
						continue;
					}

					$g2gt = $this->processGuestType($guest_obj);

					if (!$g2gt instanceof GuestGuestType) {
						$this->skip($line, 'guest to guest type did not create');
						continue;
					}
				}

				$this->showProgress();
			}

			$this->endRun(true);

		}catch (Exception $e) {
			$this->exception($line, $e);
			throw $e;
		}
	}

	private function _splitNames($names, $delim = ' and ') {

		$names = strtolower(trim($names));

		if (strpos($names, $delim) !== false) {
			return explode($delim, $names);
		}

		return array($names);
	}
}