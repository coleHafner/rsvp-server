<?php

class GuestGroupsController extends ApplicationController {

	public function index() {
		//nothing
	}

	public function show($activation_code = null) {
		$gg = $this->getGuestGroup($activation_code);
		return $gg->toArray();
	}

	public function edit($activation_code = null) {
		$gg = $this->getGuestGroup($activation_code);
	}

	public function save() {

		$conn = Guest::getConnection();
		$conn->beginTransaction();

		try {
			$gg = new GuestGroup;
			$gg->fromArray($_REQUEST);
			$gg->save();
			$conn->commit();
			$this->persistant['messages'] = 'Guest Group Saved Successfully';
			$this->redirect('guest-groups/show/' . $gg->activation_code);
		}catch (Exception $e) {
			$this->persistant['errors'] = $e->getMessage();
			$conn->rollBack();
		}

		$this->redirect('guest-groups/edit/' . $gg->activation_code);
	}

	private function getGuestGroup($activation_code = null) {

		$activation_code = !empty($_REQUEST['activation_code']) ?
			$_REQUEST['activation_code'] : $activation_code;

		$gg = new GuestGroup;
		$gg->activation_code = $activation_code;
		$gg->hydrate($activation_code);
		return $gg;
	}
}