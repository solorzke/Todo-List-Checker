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
	$userId = $_SESSION['id'];
	$message = filter_input(INPUT_POST, 'message');
	$completion = filter_input(INPUT_POST, 'status') != 0 ? '1': '0';
	$date = filter_input(INPUT_POST, 'date');
	$dueTime = filter_input(INPUT_POST, 'time');
	$createdDate = date('Y-m-d H:i:s'); //<-- Time the form was sent to create a todo list

	$arr = explode('-', $date);
	$arr2 = explode(':', $dueTime);
	$date = date('Y-m-d H:i:s', mktime($arr2[0], $arr2[1], $arr2[2], $arr[1], $arr[2], $arr[0]));
	TodoDB::insertNew($email, $userId, $createdDate, $date, $message, $completion);
	header("Location: index.php?action=list_todos");
}

if($action == 'delete_todo'){
	$todo_id = filter_input(INPUT_POST, 'todo_id');
	TodoDB::deleteTodo($todo_id);
	header('Location: index.php?action=list_todos');
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
		$arr = explode('-', $date);
		$arr2 = explode(':', $dueTime);
		$date = date('Y-m-d H:i:s', mktime($arr2[0], $arr2[1], $arr2[2], $arr[1], $arr[2], $arr[0]));
		TodoDB::updateDueDate($date, $id);
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

?>