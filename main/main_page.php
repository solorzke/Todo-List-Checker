<?php
session_start();
require('Model/user_db.php');
require('Model/todo_db.php');

if(!isset($_SESSION['email']) || !isset($_SESSION['id'])){
	header("Location: Location: https://web.njit.edu/~kas58/is218_Project/main/sign_in.php");
}

$userf = UserDB::getUser($_SESSION['id']);
$_SESSION['userInfo'] = $userf;

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Project | Home Page</title>
	</head>
	<body>
		<h1>This is a test!</h1>
		<p>Welcome <?php echo "{$_SESSION['userInfo']->getFname()} {$_SESSION['userInfo']->getLname()}"; ?> </p>
		<p>Your birthday is on: <?php echo "{$_SESSION['userInfo']->getBirthday()}"?></p>

		<p>
		</p>
		<br>

		<h2>To-Do List: </h2>
	</body>
</html>