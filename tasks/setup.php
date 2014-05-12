<?php

require_once('../config.php');
ini_set('auto_detect_line_endings', true);

function getInput($msg) {
	fwrite(STDOUT, "$msg: ");
	return trim(fgets(STDIN));
}

/**
 * @param	string		$name
 * @param	boolean		$create		will create wedding if it doesn't exist
 * @return	Wedding
 * @throws	RuntimeException
 */
function getWeddingByName($name, $create = false) {
	$wedding = Wedding::retrieveByName($name);

	if (!$wedding instanceof Wedding && $create === true) {
		$wedding = new Wedding;
		$wedding->setName($name);
		$wedding->save();
	}

	if(!$wedding instanceof Wedding) {
		return false;
	}

	return $wedding;
}