<?php

class Guest extends baseGuest {

	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 0;

	public function guestHasSpecialType() {
		$q = new Query(GuestGuestType::getTableName() . ' g2gt');
		$q->join(GuestType::getTableName() . ' gt', 'gt.id = g2gt.guest_type_id');
		$q->add('g2gt.guest_id', $this->getId());
		$q->add('gt.is_special', '1');
		return GuestGuestType::doCount($q);
	}

	public function getBadgeType() {
		$q = new Query(GuestGuestType::getTableName() . ' g2gt');
		$q->join(GuestType::getTableName() . ' gt', 'gt.id = g2gt.guest_type_id');
		$q->addColumn('gt.id AS guest_type_id');
		$q->addColumn('LOWER( gt.title ) AS title');
		$q->add('g2gt.guest_id', $this->getId());
		$q->add('gt.is_special', '1');
		$found_types = GuestGuestType::fetch($q);

		if (is_array($found_types)) {
			reset($found_types);
			$selected_id = current($found_types)->getGuestTypeId();
			$q = new Query;
			$q->add('id', $selected_id);
			$gt_results = GuestType::doSelect($q);
			$return = array_shift($gt_results);
		}//if any types were found

		return ( isset($return) && is_object($return) ) ? $return : null;
	}

	function updateGroupRsvpStatus($rsvp_answer, $guest_list = array(), $rsvp_through_site = '1') {

		$update_timestamp = strtotime('now');
		$actual_count = ( $rsvp_answer == '1' ) ? count($guest_list) : 0;
		$is_attending = ( in_array($this->getId(), $guest_list) ) ? '1' : '0';
		$this->updateIndividualRsvpStatus($this, $is_attending, $update_timestamp, $actual_count, $rsvp_through_site);

		foreach ($this->getChildren() as $sub_g) {
			$is_attending = ( in_array($sub_g->getId(), $guest_list) ) ? "1" : "0";
			$this->updateIndividualRsvpStatus($sub_g, $is_attending, $update_timestamp, $actual_count, $rsvp_through_site);
		}
		return true;
	}

	function updateIndividualRsvpStatus($guest, $is_attending, $update_timestamp, $actual_count, $rsvp_through_site) {

		$guest->setIsAttending($is_attending);
		$guest->setRsvpThroughSite($rsvp_through_site);
		$guest->setUpdateTimestamp($update_timestamp);

		if (!$guest->getParentId()) {
			$guest->setActualCount($actual_count);
		}

		return $guest->save();
	}

	function getChildren() {
		$q = new Query();
		$q->add('parent_id', $this->getId());
		$q->add('active', 1);
		return self::doSelect($q);
	}

	function getNumChildren() {
		$q = new Query();
		$q->add('parent_id', $this->getId());
		$q->add('active', 1);
		return self::doCount($q);
	}

	function getParentAddressId() {
		$pg_id = $this->getParentId();
		if (!$pg_id) {
			$return = $this->getAddressId();
		} else {
			$q = new Query;
			$q->add('parent_id', $pg_id);
			$g = array_shift(self::doSelect());
			$return = $g->getAddressId();
		}

		return $return;
	}

	function addGuestTypeId($gtId) {

		if (!$this->getId())
			return false;

		$g2gt = new GuestGuestType;
		$g2gt->setGuestId($this->getId());
		$g2gt->setGuestTypeId($gtId);
		return $g2gt->save();
	}

	static function getGuestQueries(User $user) {

		$q = new Query;

		if (!$user->isAdmin()) {
			$q->add('wedding_id', $user->getWeddingId());
		}

		$qNew = clone $q;
		$qNew->add('is_new', 1);

		$qTotal = clone $q;
		$qTotal->add('is_new', 0);

		$qReplied = clone $q;
		$qReplied->add('is_attending', null, Query::IS_NOT_NULL);
		$qReplied->add('is_new', 0);

		$qAttending = clone $q;
		$qAttending->add('updated', null, Query::IS_NOT_NULL);
		$qAttending->add('is_attending', 1);

		$qNotAttending = clone $q;
		$qNotAttending->add('is_attending', 0);
		$qNotAttending->add('updated', null, Query::IS_NOT_NULL);

		$qRecent = clone $q;
		$qRecent->add('updated', null, Query::IS_NOT_NULL);
		$qRecent->add('is_attending', null, Query::IS_NOT_NULL);
		$qRecent->orderBy('updated', Query::DESC);
		$qRecent->setLimit(10);

		$qShuttle = clone $qAttending;
		$qShuttle = $qShuttle->addColumn('SUM(shuttle_count) AS shuttle_count');
		$qShuttle->setTable('guest');

		return array(
			'new' => $qNew,
			'total' => $qTotal,
			'recent' => $qRecent,
			'replied' => $qReplied,
			'shuttle' => $qShuttle,
			'attending' => $qAttending,
			'not_attending' => $qNotAttending,
		);
	}

	function isParent() {
		return (bool)$this->getParentId();
	}

	function delete() {
		parent::delete();

		if ($this->isParent()) {
			foreach ($this->getChildren() as $child) {
				$child->delete();
			}
		}
	}

	public static function getStats(User $user) {

		$qs = self::getGuestQueries($user);

		$stats = array(
			'new' => self::doCount($qs['new']),
			'total' => self::doCount($qs['total']),
			'replied' => self::doCount($qs['replied']),
			'attending' => self::doCount($qs['attending']),
			'not_attending' => self::doCount($qs['not_attending']),
		);

		$wedding = $user->getWedding();

		if ($user->isAdmin()
			|| ($wedding instanceof Wedding
			&& $wedding->getShuttleEnabled())) {
			$count = $qs['shuttle']->doSelect()->fetch(PDO::FETCH_ASSOC);
			$stats['shuttle'] = !empty($count['shuttle_count']) ? $count['shuttle_count'] : 0;
		}

		return $stats;
	}

	public static function getGuestLists(User $user) {
		$qs = self::getGuestQueries($user);

		return array(
			'new' => self::doSelect($qs['new']),
			'total' => self::doSelect($qs['total']),
			'recent' => self::doSelect($qs['recent']),
			'replied' => self::doSelect($qs['replied']),
			'attending' => self::doSelect($qs['attending']),
			'not_attending' => self::doSelect($qs['not_attending']),
		);
	}

	public static function getGuestListComplete(array $filters, User $user = null) {

		$q = new Query(Guest::getTableName() . ' g');
		$q->orderBy('g.last_name', Query::ASC);

		//wedding
		if ($user instanceof User && $user->getWeddingId()) {
			$q->add('g.wedding_id', $user->getWeddingId());

		}else if(!empty($filters['wedding_id'])) {
			$q->add('g.wedding_id', $filters['wedding_id']);
		}

		//is_attending
		switch(@$filters['is_attending']) {
			case '0':
				$q->add('is_attending', 0);
				break;

			case '1':
				$q->add('is_attending', 1);
				break;
		}

		//name
		if (!empty($filters['first_name'])) {
			$q->add('g.first_name', $filters['first_name'] . '%', Query::LIKE);
		}

		if (!empty($filters['last_name'])) {
			$q->add('g.last_name', $filters['last_name'] . '%', Query::LIKE);
		}

		//echo $q;die;
		return self::doSelect($q);
	}

	public static function getAllParents(User $user) {

		$q = new Query;
		$q->add('parent_id', null, Query::IS_NULL);
		$q->orderBy('last_name', Query::ASC);

		if (!$user->isAdmin()) {
			$q->add('wedding_id', $user->getWeddingId());
		}

		return self::doSelect($q);
	}

	public static function validateActivationCode($code) {
		$q = new Query;
		$q->add('activation_code', $code);
		$q->add('activation_code', $code, Query::IS_NOT_NULL);
		return ( self::doCount($q) > 0 ) ? true : false;
	}

	public static function getGuestFromActivationCode($code) {
		$q = new Query;
		$q->add('activation_code', $code, Query::LIKE);
		return self::doSelect($q);
	}

	public static function validateGuestId($guest_id) {
		$q = new Query;
		$q->add('id', $guest_id);
		return ( self::doCount() > 0 ) ? true : false;
	}

	public static function getGuestFromId($guest_id) {
		$q = new Query;
		$q->add('id', $guest_id);
		$result = Guest::doSelect($q);
		return array_shift($result);
	}

	public static function getUniqueActivationCode($salt = false) {

		//old way
		//$raw =  md5($salt . date("F d\, Y H:i:s"));
		//$code = strtolower(substr($raw, 0, 10));
		//new way
		$code = rand(1000, 9999);

		$q = new Query;
		$q->add(Guest::ACTIVATION_CODE, $code);
		if (Guest::doCount($q) > 0) {
			self::getUniqueActivationCode($salt);
		}

		return $code;
	}

	public function doEdit($form_vals) {

		//print_r($form_vals);die;
		$this->setFirstName($form_vals['first_name']);
		$this->setLastName($form_vals['last_name']);
		$this->setWeddingId($form_vals['wedding_id']);

		if (!empty($form_vals['parent_id'])) {
			$this->setParentId($form_vals['parent_id']);
		}
		
		if (!empty($form_vals['activation_code'])) {
			$this->setActivationCode($form_vals['activation_code']);
		}
		
		if (array_key_exists('rsvp_dinner_enabled', $form_vals)) {
			$this->setRsvpDinnerEnabled($form_vals['rsvp_dinner_enabled']);
		}
		
		if (array_key_exists('dinner_count', $form_vals)) {
			$this->setDinnerCount($form_vals['dinner_count']);
		}
		
		if (array_key_exists('shuttle_count', $form_vals)) {
			$this->setShuttleCount($form_vals['shuttle_count']);
		}

		$isAttending = 0;
		
		if (array_key_exists('is_attending', $form_vals)) {
			$isAttending = (isset($form_vals['is_attending'])) ? 1 : 0;
		}
		
		$this->setIsAttending($isAttending);

		if ($this->isNew()) {
			$this->setRsvpThroughSite(0);
			$this->save();

			$gt = GuestType::doSelectOne();
			
			if ($gt) {
				$this->addGuestTypeId($gt->getId());
			}

			if (empty($form_vals['parent_id'])) {
				$this->setActivationCode(Guest::getUniqueActivationCode($form_vals['first_name']));
			}
		}

		return $this->save();
	}

	public function toArray() {
		$arr = parent::toArray();
		$arr['is_attending'] = !$this->getIsAttending() ? false : true;
		return $arr;
	}
}
