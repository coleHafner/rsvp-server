<?php

class Address extends baseAddress {

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

	public function __toString() {
		return $this->getStreetAddress() . " " . $this->getCity() . " " . $this->getState() . " " . $this->getZip();
	}
}
