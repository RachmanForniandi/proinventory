<?php 

/**
* 
*/
class User {
	private $con;
	
	function __construct(){
		include_once("../database/db.php");
		$db = new Database ();
		$this ->con = $db->connect();
	}

	//User telah telah terdaftar atw belum
	private function emailExists($email){
		$pre_stmt = $this->con->prepare("SELECT id FROM user WHERE email = ?");
		$pre_stmt->bind_param("s",$email);
		$pre_stmt->execute() OR DIE($this->con->error);
		$result = $pre_stmt->get_result();
		if ($result-> num_rows > 0) {
			return 1;
		}else{
			return 0;
		}
	}

	public function createUserAccount($username,$email,$password,$userlevel){
		//utk melindungi aplikasi sql injection
		//menggunakan prepare statement
		if ($this->emailExists($email)) {
			return "EMAIL_ALREADY_EXISTS";
		}else{
			$pass_hash = password_hash($password,PASSWORD_BCRYPT,["cost"=>8]);
			$date = date("Y-m-d");
			$notes = "";
			$pre_stmt = $this->con->prepare("INSERT INTO `user`(`username`, `email`, `password`, `user_level`, `register_date`, `last_login`, `notes`) VALUES (?,?,?,?,?,?,?)");
			$pre_stmt->bind_param("sssssss",$username,$email,$pass_hash,$userlevel,$date,$date,$notes);
			$result = $pre_stmt->execute() OR DIE($this->con->error);
			if ($result) {
				return $this->con->insert_id;
			}else{
				return "SOME_ERROR";
			}
		}
		
	}

	public function userLogin($email,$password){
		$pre_stmt = $this->con->prepare("SELECT id,username,password,last_login FROM user WHERE email = ?");
		$pre_stmt->bind_param("s",$email);
		$pre_stmt->execute() OR DIE($this->con->error);
		$result = $pre_stmt->get_result();

		if ($result->num_rows < 1) {
			return"NOT_REGISTERED";
		}else{
			$row = $result->fetch_assoc();
				if (password_verify($password,$row["password"])) {
					$_SESSION["userid"] = $row["id"];
					$_SESSION["username"] = $row["username"];
					$_SESSION["last_login"] = $row["last_login"];


					//disini kita memperbarui data waktu terakhir user masuk/login
					$last_login = date("Y-m-d h:m:s");
					$pre_stmt = $this->con->prepare("UPDATE user SET last_login = ? WHERE email = ? ");
					$pre_stmt->bind_param("ss",$last_login,$email);
					$result = $pre_stmt->execute() OR DIE($this->con->error);
					if ($result) {
						return 1;
					}else{
						return 0;
					}
				}else{
					return "Access denied. Please try again.";
				}
			}
		}
}

//$user = new User();
//echo $user->createUserAccount("Test","rachmanforniandi1st@gmail.com","1234567890","Admin");
//echo $user->userLogin("rachmanforniandi1st@gmail.com","1234567890");
//echo $_SESSION["username"];
?>