<?php

class BlackKingImport extends GuestImport {

	const COL_NAMES = 0;
	const COL_NUM_EXPECTED = 1;

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

				//grab names
				$guests = $this->_splitNames($line[self::COL_NAMES]);
				$parent_guest_id = null;
				$i = 0;

				foreach($guests as $guest_name) {

					$guest = $this->processGuest(
						$guest_name[0],
						@$guest_name[1],
						$parent_guest_id,
						$line[self::COL_NUM_EXPECTED]
					);

					if (!$guest instanceof Guest) {
						print_r($line);
						throw new RuntimeException('Error: Guest did not import.');
					}

					if ($i == 0) {
						$parent_guest_id = $guest->getId();
					}

					$this->processGuestType($guest);
					$i++;
				}
				$this->showProgress();
			}

			$this->endRun(true);

		}catch(Exception $e) {
			$this->exception($line, $e);
			$this->endRun(false);
			throw $e;
		}
	}

	/**
	 * Takes in a string of names and returns an array of first/last name combos
	 * @param	string	$names
	 * @return	array
	 */
	public function _splitNames($names) {
		$guests = array();
		$delim = '&';

		if (strpos($names, $delim) === false) {
			$guests[] = explode(' ', $names);
			return $guests;
		}

		$name_split = explode($delim, $names);

		if (count($name_split) > 2) {
			return $this->_addMultiGuests($name_split);
		}

		if (count($name_split) === 2 &&
			strpos($name_split[0], '^') === false &&
			count(explode(' ', trim($name_split[0]))) == 2 &&
			count(explode(' ', trim($name_split[1])) == 2)) {
			return $this->_addMultiGuests($name_split);
		}

		$first = array_shift($name_split);
		$second = array_shift($name_split);

		$last_name = null;

		if (strpos($second, ' ') === false) {
			throw new RuntimeException('No last name found for "' . $names . '"');
		}

		$second_split = explode(' ', trim($second));
		$first_name = array_shift($second_split);
		$last_name = array_shift($second_split);

		$guests[] = array($first_name, $last_name);

		//second first
		if (strpos($first, '^') !== false) {
			foreach(explode('^', $first) as $first_name) {
				$guests[] = array($first_name, $last_name);
			}
		}else {
			$guests[] = array($first, $last_name);
		}

		return $guests;
	}

	/**
	 * Takes an array of string and breaks it into an array of arrays
	 * @param	array	$names
	 * @return	array
	 */
	private function _addMultiGuests(array $names) {

		$guests = array();

		foreach($names as $name) {
			$name = trim($name);

			if (strpos($name, ' ')) {
				$guests[] = explode(' ', $name);
			}else {
				$guests[] = array($name);
			}

		}

		return $guests;
	}
}