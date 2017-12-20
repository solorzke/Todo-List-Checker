<?php
session_start();
require('../Model/user_db.php');
require('../Model/todo_db.php');

function timeForm($string){
	$results = explode(' ', $string);
	$date = explode('-', $results[0]);
	$time = explode(':', $results[1]);
	$date = $date[1].'/'.$date[2].'/'.$date[0].' @ '.$time[0].':'.$time[1].':'.$time[2];
	return $date;
}

$userf = UserDB::getUser($_SESSION['id']);
$_SESSION['userInfo'] = $userf; //User object returned

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_todos';
    }
}

if(!isset($_SESSION['userInfo'])){
	header('Location: sign_in.php');
}

elseif ((time() - $_SESSION['last_login_timestamp']) > 900) {
	header('index.php?action=sign_out');
}

if($action == 'list_todos'){
	$categories = TodoDB::getTodo($_SESSION['id']);
	include 'main_page.php';
}

if($action == 'add_todo_form'){
	include 'add_todo.php';
}


if($action == 'add_todo'){
	
	$email = $_SESSION['userInfo']->getEmail();
	$userId = $_SESSION['id'];
	$message = filter_input(INPUT_POST, 'message');
	$completion = filter_input(INPUT_POST, 'status') != 0 ? '1': '0';
	$date = filter_input(INPUT_POST, 'date');
	$dueTime = filter_input(INPUT_POST, 'time');
	$createdDate = date('Y-m-d H:i:s'); //<-- Time the form was sent to create a todo list
	$dateTime;

	if ($date != NULL && $dueTime != NULL) {
		$dateT = explode('/', $date);
		$time = explode(':', $dueTime);

		$dateTime = date('Y-m-d H:i:s', mktime($time[0], $time[1], $time[2], $dateT[0], $dateT[1], $dateT[2]));
	}

	TodoDB::insertNew($email, $userId, $createdDate, $dateTime, $message, $completion);
	header("Location: index.php?action=list_todos");
}

if($action == 'delete_todo'){
	$todo_id = filter_input(INPUT_POST, 'todo_id');
	TodoDB::deleteTodo($todo_id);
	header('Location: index.php?action=list_todos');
}

if ($action == 'checkOff') {
	# code...
	$check = filter_input(INPUT_POST, 'checkbox');
	$id = filter_input(INPUT_POST, 'id');

	if($check == 1){
		TodoDB::updateIsDone($check, $id);
		header('Location: index.php?action=list_todos');
	}

	if($check == 0){
		TodoDB::updateIsDone($check, $id);
		header('Location: index.php?action=list_todos');
	}
}

if($action == 'edit_todo_form'){
	$id = filter_input(INPUT_POST, 'id');
	$dueDate = filter_input(INPUT_POST, 'dueDate');
	$message = filter_input(INPUT_POST, 'message');
	$isDone = filter_input(INPUT_POST, 'isDone');
	include 'edit_todo.php';
}

if($action == 'edit_todo'){
	$date = filter_input(INPUT_POST, 'date');
	$message = filter_input(INPUT_POST, 'message');
	$completion = filter_input(INPUT_POST, 'status');
	$dueTime = filter_input(INPUT_POST, 'time');
	$id = filter_input(INPUT_POST, 'id');

	if ($date != NULL && $dueTime != NULL) {
		$dateT = explode('/', $date);
		$time = explode(':', $dueTime);

		$dateTime = date('Y-m-d H:i:s', mktime($time[0], $time[1], $time[2], $dateT[0], $dateT[1], $dateT[2]));
		TodoDB::updateDueDate($dateTime, $id);
	}

	else{
		header('Location: index.php?action=edit_todo_form');
	}

	if ($message != NULL) {
		TodoDB::updateMessage($message, $id);
	}
	if ($completion != NULL) {
		TodoDB::updateIsDone($completion, $id);
	}

	header('Location: index.php?action=list_todos');
}


if($action == 'updateEmailForm'){
	$currentEmail = $_SESSION['userInfo']->getEmail();
	$currentPassword = $_SESSION['userInfo']->getPassword();
	include 'updateEmailPass.php';
}

if($action == 'updateEmailPass'){
	$currentEmail = filter_input(INPUT_POST, 'currentEmail');
	$currentPassword = filter_input(INPUT_POST, 'currentPassword');
	$newPassword = filter_input(INPUT_POST, 'newPassword');
	$newPassAgain = filter_input(INPUT_POST, 'newPasswordAgain');

	if($currentEmail == $_SESSION['userInfo']->getEmail() && $currentPassword == $_SESSION['userInfo']->getPassword()){

		if($newPassword == $newPassAgain){
			UserDB::updatePass($newPassword, $_SESSION['id']);
			header('Location: index.php?action=list_todos');
		}

		else{
			echo('An error occured. Try Again!');
			header('Location: index.php?action=updateEmailForm');
		}
		
	}

	else{
		echo('An error occured. Try Again!');
		header('Location: index.php?action=updateEmailForm');
	}
}

if ($action == 'sign_out') {
	if (session_destroy()) {
		header('Location: sign_in.php');
	}
}

?>