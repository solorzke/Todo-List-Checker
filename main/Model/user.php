<?php
class User{
	private $email, $fname, $lname, $phone, $birthday, $gender, $password;
	function __construct($email, $fname, $lname, $phone, $birthday, $gender, $password){
		
		$this->email = $email;
		$this->fname= $fname;
		$this->lname = $lname;
		$this->phone = $phone;
		$this->birthday = $birthday;
		$this->gender = $gender;
		$this->password = $password;
	}
	
	public function getEmail(){ return $this->email; }
	
	public function setEmail($email){ $this->email=$email; }
	
	public function getFname(){ return $this->fname; }
	
	public function setFname($fname){ $this->fname=$fname; }
	
	public function getLname(){ return $this->lname; }
	
	public function setLname($lname){ $this->lname=$lname; }
	
	public function getPhone(){ return $this->phone; }
	
	public function setPhone($phone){ $this->phone=$phone; }
	
	public function getBirthday(){ return $this->birthday; }
	
	public function setBirthday($birthday){ $this->birthday=$birthday; }
	
	public function getGender(){ return $this->gender; }
	
	public function setGender($gender){ $this->gender=$gender; }
	
	public function getPassword(){ return $this->password; }
	
	public function setPassword($password){ $this->password=$password; }
	
	//REMINDER: Might need to add 'self' to each attribute for function down below.
	public function htmlString(){
		return "<tr><td>".self::getEmail()."<br></td><td>".self::getFname()."<br></td><td>".self::getLname()."<br></td><td>".self::getPhone()."<br></td><td>".self::getBirthday()."<br></td><td>".self::getGender()."<br></td><td>".self::getPassword()."<br></td></tr>";
	}
}
?>