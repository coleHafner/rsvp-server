<?php

class GuestsController extends ApplicationController {
	public function index() {
	}

	public function show($guest_id = null) {
		$g = $this->getGuest($guest_id);
		return $g->toArray();

	}

	public function save() {

		$conn = Guest::getConnection();
		$conn->beginTransaction();
		$g = $this->getGuest();

		try {

			$g->fromArray($_REQUEST);
			$g->save();
			$conn->commit();

			$this->persistant['messages'][] = 'Guest saved';
			$this->redirect('guests/show/' . $g->getId());

		}catch(Exception $e) {
			$this->persistant['errors'][] = $e->getMessage();
			$conn->rollBack();
		}

		$this->redirect('guests/edit/' . $g->getId());
	}

	private function getGuest($guest_id = null) {

		$guest_id = !empty($_REQUEST['guest_id']) ? $_REQUEST['id'] : $guest_id;

		if (empty($guest_id)) {
			return new Guest;
		}

		return Guest::retrieveByPK($guest_id);
	}
}