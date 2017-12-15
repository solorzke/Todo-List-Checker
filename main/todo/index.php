<?php
session_start();
require('../Model/user_db.php');
require('../Model/todo_db.php');

$userf = UserDB::getUser($_SESSION['id']);
$_SESSION['userInfo'] = $userf; //User object returned

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_todos';
    }
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
	$userId = $_SESSION['userInfo']->getID();
	$message = filter_input(INPUT_POST, 'message');
	$completion = filter_input(INPUT_POST, 'status') != 0 ? '1': '0';
	$date = filter_input(INPUT_POST, 'date');
	$dueTime = filter_input(INPUT_POST, 'time');
	$createdDate = date('m-d-Y \a\t H:i:s'); //<-- Time the form was sent to create a todo list

	$arr = explode('-', $date);
	$date = $arr[1].'-'.$arr[2].'-'.$arr[0];

	TodoDB::insertNew($email, $userId, $);



}

?>