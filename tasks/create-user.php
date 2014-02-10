<?php
require_once('setup.php');

$username = getInput('username');
$password = getInput('password');
$wedding_name = getInput('wedding name');

$conn = User::getConnection();
$conn->beginTransaction();

try {

	$wedding = Wedding::retrieveByName($wedding_name);

	if(!$wedding instanceof Wedding) {
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
