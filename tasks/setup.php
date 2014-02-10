<?php

require_once('../config.php');

function getInput($msg) {
	fwrite(STDOUT, "$msg: ");
	return trim(fgets(STDIN));
}