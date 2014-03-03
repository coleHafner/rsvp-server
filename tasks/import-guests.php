<?php

require_once('setup.php');
ini_set('auto_detect_line_endings', true);
$filename = @$argv[1];
$wedding_name = @$argv[2];


if (!$filename) {
	$filename = getInput('Absolute path of guest file');
}

if (!$wedding_name) {
	$wedding_name = getInput('Name of wedding');
}

$wedding = getWeddingByName($wedding_name, true);

$importer = new GuestImport($filename);
$importer->setLogging(true);
$importer->setSilent(false);
$importer->setWedding($wedding);
$importer->run();

