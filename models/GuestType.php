<?php

class GuestType extends baseGuestType {

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    const SPECIAL_YES = 1;
    const SPECIAL_NO = 0;

	const TYPE_GUEST = 1;

    public static function getAllValids() {
		$q = new Query;
		$q->orderBy('title', Query::ASC);
		return self::doSelect($q);
    }//getAllValids()
}
