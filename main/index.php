<?php
require('/Model/database.php');
require('/Model/user.php');
require('/Model/user_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'test';
    }
}
if($action == 'test'){
	include('sign_in.php');
}


else if($action == 'sign_in'){
	$email_user = filter_input(INPUT_POST, 'email');
	$pw = filter_input(INPUT_POST, 'password');

	$emails = UserDB::getEmails();
	$passwords = UserDB::getPasswords();
	$email_checks = false;
	$password_checks = false;

	foreach($emails as $email){
		if ($email_user === $email) {
			# code...
			$user_checks = true;
			break;
		}
	}

	foreach($passwords as $password){
		if ($password === $pw) {
			# code...
			$password_checks = true;
			break;
		}
	}

	if ($user_checks && $password_checks) {
		# code...
		header('Location: https://web.njit.edu/~kas58/is218_Project/main_page.php');
	}
	else{
		header("Location: ?.sign_in.php");
	}
}

?>