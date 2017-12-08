<?php

require('Model/user_db.php');
	
	if(isset($_POST['email']) && isset($_POST['password'])) {

		$email_user = $_POST['email'];
		$password_user = $_POST['password'];

		if (UserDB::verifyLogin($email_user, $password_user) == true){
			header('Location: https://web.njit.edu/~kas58/is218_Project/main_page.php');
		}

		else{
			header("Location: https://web.njit.edu/~kas58/is218_Project/sign_in.php");
		}
	}

	else{
		echo "<p>No information entered. Try Again. </p>";
		header("Location: https://web.njit.edu/~kas58/is218_Project/sign_in.php");
	}

	/*
	$a_num = UserDB::verifyLogin($email_user, $password_user);
	foreach($a_num as $he){
		echo $he[0];
	}

	*/
?> 