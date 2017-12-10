<?php

class TodoDB{

	public static function insertNew($email, $id, $createdDate, $dueDate, $message, $isDone){

		$db = Database::getDB();
		$query = 'INSERT INTO kas58.todos (owneremail, ownerid, createddate, duedate, message, isdone) VALUES (:email, :id, :createdDate, :dueDate, :message, :isDone)';
		$statement = $db->prepare($query);
		$statement->bindValue(':email', $email);
		$statement->bindValue(':id', $id);
		$statement->bindValue(':createdDate', $createdDate);
		$statement->bindValue(':dueDate', $dueDate);
		$statement->bindValue(':message', $message);
		$statement->bindValue(':isDone', $isDone);
		$statement->execute();
		$statement->closeCursor();
	}

	public static function getToDo($user_id){
		$db = Database::getDB();
		$query = 'SELECT * FROM kas58.accounts WHERE id = :id';
		$statement = $db->prepare($query);
		$statement->bindValue(':id', "$user_id");
		$statement->execute();
	    $todos = $statement->fetchAll();
	    $statement->closeCursor();
	    
	  	return $todos;
	}

	public static function deleteTodo($id){
		$db = Database::getDB();
		$query = 'DELETE FROM kas58.todos WHERE id = :id';
		$statement = $db->prepare($query);
		$statement->bindValue(':id', "$id");
		$statement->execute();
		$statement->closeCursor();
	}

	public static function updateIsDone($status, $id){
		$db = Database::getDB();
		$query = 'UPDATE kas58.todos SET isdone = :status WHERE id = :id';
		$statement = $db->prepare($query);
		$statement->bindValue(':status', "$status");
		$statement->bindValue(':id', "$id");
		$statement->execute();
		$statement->closeCursor();
	}

	public static function updateMessage($message, $id){
		$db = Database::getDB();
		$query = 'UPDATE kas58.todos SET message = :message WHERE id = :id';
		$statement = $db->prepare($query);
		$statement->bindValue(':message', "$message");
		$statement->bindValue(':id', "$id");
		$statement->execute();
		$statement->closeCursor();
	}

	public static function updateDueDate($dueDate, $id){
		$db = Database::getDB();
		$query = 'UPDATE kas58.todos SET duedate = :dueDate WHERE id = :id';
		$statement = $db->prepare($query);
		$statement->bindValue(':dueDate', "$dueDate");
		$statement->bindValue(':id', "$id");
		$statement->execute();
		$statement->closeCursor();
	}

}

?>