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
		if ($result > 0) {
			return 1;
		}else{
			return 0;
		}
	}

	public function createUserAccount($username,$email,$password,$usertype){
		//utk melindungi aplikasi sql injection
		//menggunakan prepare statement
		$pre_stmt = $this->con->prepare("");
	}
}


?>