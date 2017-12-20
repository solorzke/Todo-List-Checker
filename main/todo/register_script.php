<?php
require('../Model/user_db.php');

$fname = filter_input(INPUT_POST, 'fname');
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$birthday = $_POST['birthday'];
$male = $_POST['male'];
$female = $_POST['female'];
$other = $_POST['other'];
$password = $_POST['password'];


if(UserDB::emailExists($email) == true){
	header('Location: register.php');
}

if(!is_null($male)){
	$new_user = new User($email, $fname, $lname, $phone, $birthday, $male, $password);
	$insertNewUser = UserDB::insertNew($new_user);
	header('Location: sign_in.php');
}

elseif (!is_null($female)) {
	$new_user = new User($email, $fname, $lname, $phone, $birthday, $female, $password);
	$insertNewUser = UserDB::insertNew($new_user);
	header('Location: sign_in.php');
}

elseif(!is_null($other)){
	$new_user = new User($email, $fname, $lname, $phone, $birthday, $other, $password);
	$insertNewUser = UserDB::insertNew($new_user);
	header('Location: sign_in.php');
}
?>