<?php 

include 'database.php';
include 'user.php';
class UserDB{
	//$user must be a User Object to access the class's objects.
	public static function insertNew($user){
		$db = Database::getDB();
		$email = $user->getEmail();
		$fname = $user->getFname();
		$lname = $user->getLname();
		$phone = $user->getPhone();
		$birthday = $user->getBirthday();
		$gender = $user->getGender();
		$password = $user->getPassword();
		$query = 'INSERT INTO kas58.accounts(email, fname, lname, phone, birthday, gender, password) VALUES(:email, :fname, :lname, :phone, :birthday, :gender, :password)';
		$statement = $db->prepare($query);
		$statement->bindValue(':email', "$email");
		$statement->bindValue(':fname', "$fname");
		$statement->bindValue(':lname', "$lname");
		$statement->bindValue(':phone', "$phone");
		$statement->bindValue(':birthday', "$birthday");
		$statement->bindValue(':gender', "$gender");
		$statement->bindValue(':password', "$password");
		$statement->execute();
		$statement->closeCursor();
	}
	public static function deleteUser($user_id){
		$db = Database::getDB();
		$query = 'DELETE FROM kas58.accounts WHERE id = :user_id';
		$statement = $db->prepare($query);
		$statement->bindValue(':user_id', "$user_id");
		$statement->execute();
		$statement->closeCursor();
	}
	//Update passwords only; must use id!
	public static function updatePass($pass_word, $user_id){
		$db = Database::getDB();
		$query = 'UPDATE kas58.accounts SET password = :pass_word WHERE id = :user_id';
		$statement = $db->prepare($query);
		$statement->bindValue(':pass_word', "$pass_word");
		$statement->bindValue(':user_id', "$user_id");
		$statement->execute();
		$statement->closeCursor();
	}
	public static function getUsers(){
		$arr = array();
		$count = 0;
		$data = Database::getDB(); //<-
		$query = 'SELECT * FROM kas58.accounts';
		$statement = $data->prepare($query); //<-
		$statement->bindValue(':id', $id);
		$statement->execute();
		$products = $statement->fetchAll();
		$statement->closeCursor();
		$num_array = count($products);
		
		foreach($products as $product){
			//echo "<td>".$product[7]."<br></td></tr>";
			$use = new User($product[0], $product[1],$product[2],$product[3],$product[4],$product[5],$product[6],$product[7]);
			//var_dump(get_object_vars($use));
			$arr[$count] = $use->htmlString();
			$count++;
		}
		return $arr;
	}

	public static function getEmails(){
		$db = Database::getDB();
		$query = 'SELECT * FROM kas58.accounts ORDER BY email';
		$statement = $db->prepare($query);
	    $statement->execute();
	    $emails = $statement->fetchAll();
	    $statement->closeCursor();
	    return $emails;
	}

	public static function verifyLogin($email, $password){
		$db = Database::getDB();
		
		$query = 'SELECT id FROM kas58.accounts WHERE email = :email AND password = :password';
		$statement = $db->prepare($query);
		$statement->bindValue(':email', "$email");
		$statement->bindValue(':password', "$password");
		$statement->execute();
	    $id = $statement->fetchAll();
	    $row_count = $statement->rowCount();
	    $statement->closeCursor();

		//return $id;

	    if($row_count == 1){
	    	return true;
		}
		else
			return false;
			
			//return $id;
	}

	public static function getPasswords(){
		$db = Database::getDB();
		$query = 'SELECT * FROM kas58.accounts ORDER BY password';
		$statement = $db->prepare($query);
	    $statement->execute();
	    $passwords = $statement->fetchAll();
	    $statement->closeCursor();
	    return $passwords;
	}

}

?>