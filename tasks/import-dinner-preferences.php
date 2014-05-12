<?php

require_once('setup.php');
$filename = getInput('Absolute path of guest file');

$wedding_name = 'JoyceSegal';
$wedding = getWeddingByName($wedding_name, true);

if (!$wedding instanceof Wedding) {
	throw new RuntimeException('Error: Wedding "' . $wedding_name . '" not found.');
}

$importer = new JoyceSegalDinnerImport($filename);
$importer->setLogging(true);
$importer->setSilent(false);
$importer->run();