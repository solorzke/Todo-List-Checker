<?php
session_start();

require('../Model/user_db.php');
	
	if(isset($_POST['email']) && isset($_POST['password'])) {

		$email_user = $_POST['email'];
		$password_user = $_POST['password'];

		if (UserDB::verifyLogin($email_user, $password_user) == true){
			$_SESSION['id'] = UserDB::getID($email_user, $password_user);
			$_SESSION['email'] = $email_user;
			$_SESSION['last_login_timestamp'] = time();

			header('Location: index.php?action=list_todos');
		}

		else{
			header("Location: sign_in.php");
		}
	}

	else{
		echo "<p>No information entered. Try Again. </p>";
		header("Location: sign_in.php");
	}

	/*
	$a_num = UserDB::verifyLogin($email_user, $password_user);
	foreach($a_num as $he){
		echo $he[0];
	}

	*/
?> 