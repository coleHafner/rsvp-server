<?php
require_once('setup.php');

$username = @$argv[1];
$password = @$argv[2];
$wedding_name = @$argv[3];

if (!$username) {
	$username = getInput('username');
}

if (!$password) {
	$password = getInput('password');
}

if (!$wedding_name) {
	$wedding_name = getInput('wedding name');
}

$conn = User::getConnection();
$conn->beginTransaction();

try {

	$wedding = getWeddingByName($wedding_name, false);

	if ($wedding === false) {
		throw new RuntimeException('Error: Wedding "' . $wedding_name . '" does not exist.');
	}
	
	$user = new User;
	$user->setUsername($username);
	$encrypted_pass = User::passwordEncrypt(User::passwordSalt(), $password);
	$user->setPassword($encrypted_pass);
	$user->setWedding($wedding);
	$user->save();
	$conn->commit();

} catch (Exception $e) {
	$conn->rollBack();
	throw $e;
}
