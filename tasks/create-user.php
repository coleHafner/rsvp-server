<?php
require_once('setup.php');

$username = getInput('username');
$password = getInput('password');
$wedding_name = getInput('wedding name');

$conn = User::getConnection();
$conn->beginTransaction();

try {

	$wedding = getWeddingByName($wedding_name);
	
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
