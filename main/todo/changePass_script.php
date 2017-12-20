<?php 
require('../Model/user_db.php');
require('../Model/todo_db.php');

$currEmail = filter_input(INPUT_POST, 'currentEmail');
$currPass = filter_input(INPUT_POST, 'currentPassword');
$newPass = filter_input(INPUT_POST, 'newPassword');
$newPassAgain = filter_input(INPUT_POST, 'newPasswordAgain');

if (UserDB::emailExists($currEmail) == true && UserDB::passwordExists($currPass, $currEmail) == true) {
	# code...
	if($newPass == $newPassAgain){
		UserDB::updatePass($newPass, UserDB::getID($currEmail, $currPass));
		header('Location: sign_in.php');
	}

	else{
		header('Location: changePass.php');
	}
}

else{
	header('Location: changePass.php');
}

?>