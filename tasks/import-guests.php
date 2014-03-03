<?php

require_once('setup.php');
ini_set('auto_detect_line_endings', true);
$filename = @$argv[1];
$wedding_name = @$argv[2];
$weddings = array('JoyceSegal', 'BlackKing');
list($joyce, $king) = $weddings;
$importer = null;

if (!$filename) {
	$filename = getInput('Absolute path of guest file');
}

if (!$wedding_name) {
	$wedding_name = getInput('Name of wedding');
}

if (!in_array($wedding_name, $weddings)) {
	throw new RuntimeException('Error: Wedding Name should be either "JoyceSegal" or "BlackKing"');
}

$wedding = getWeddingByName($wedding_name, true);

if ($wedding_name === $joyce) {
	$importer = new JoyceSegalImport($filename);

}else if ($wedding_name === $king) {
	$importer = new BlackKingImport($filename);
}

$importer->setLogging(true);
$importer->setSilent(false);
$importer->setWedding($wedding);
$importer->run();