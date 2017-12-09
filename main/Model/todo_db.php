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

}

?>