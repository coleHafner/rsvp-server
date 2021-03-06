<?php

class GuestGroup {

	/**
	 * @var	boolean
	 */
	private $valid = false;

	/**
	 * @var	Guest[]
	 */
	private $guests = array();

	/**
	 * @var	Guest
	 */
	private $parent = null;

	/**
	 * @var	string
	 */
	public $activation_code = null;

	public function hydrate() {
		$this->setGuests();
		$this->setValid();
	}

	/**
	 * @return array
	 */
	public function toArray() {
		return array(
			'parent' => $this->parent,
			'valid' => $this->valid,
			'activation_code' => $this->activation_code,
			'guests' => $this->guests
		);
	}

	public function fromArray($source) {

		if (empty($source['activation_code'])) {
			throw new RuntimeException('Error: No activation code found');
		}

		$g = Guest::retrieveByActivationCode($source['activation_code']);

		if (!$g instanceof Guest) {
			throw new RuntimeException('Error: Activation code "' . $source['activation_code'] . '" is not valid.');
		}

		$shuttle_count = !empty($source['shuttle_count']) ?
			$source['shuttle_count'] : 0;

		$dinner_count = !empty($source['dinner_count']) ?
			$source['dinner_count'] : 0;

		$g->setShuttleCount($shuttle_count);
		$g->setDinnerCount($dinner_count);
		
		$this->activation_code = $source['activation_code'];
		$this->parent = $g;
		$this->valid = true;

		foreach($_REQUEST['guests'] as $guest) {
			$g = Guest::retrieveByPK($guest['id']);
			unset($guest['id']);
			$g->fromArray($guest);
			$this->guests[] = $g;
		}
	}

	public function save() {

		$this->parent->save();

		foreach($this->guests as $guest) {

			if ($guest->getId() == $this->parent->getId()) {
				continue;
			}

			$guest->setRsvpThroughSite(true);
			$guest->save();
		}
	}

	/**
	 * Sets the valid flag.
	 * @return	void
	 */
	private function setValid() {
		$this->valid = count($this->guests) > 0;
	}


	/**
	 * Returns false if no guests or no activation code, true otherwise.
	 * @return boolean
	 */
	private function setGuests() {

		if (!$this->activation_code) {
			return false;
		}

		$guest = Guest::retrieveByActivationCode($this->activation_code);

		if (!$guest) {
			return false;
		}

		$this->parent = $guest;
		$this->guests = array_merge(array($guest), $guest->getChildren());
		return true;
	}
}