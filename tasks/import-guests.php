<?php

require_once('setup.php');
ini_set('auto_detect_line_endings', true);

$filename = getInput('Absolute path of guest file');
$wedding_name = getInput('Name of wedding');

$wedding = getWeddingByName($wedding_name, true);

$importer = new GuestImport($filename);
$importer->setLogging(true);
$importer->setSilent(false);
$importer->run();

