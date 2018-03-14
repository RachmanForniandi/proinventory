<?php 

include_once("../database/constants.php");
include_once("user.php");
include_once("DBOperation.php");

//untuk proses register
if (isset($_POST["username"]) AND isset($_POST["email"])){
	$user = new User();
	$result = $user->createUserAccount($_POST["username"],$_POST["email"],$_POST["password1"],$_POST["userlevel"]);
	echo $result;
	exit();
}

//untuk proses login
if (isset($_POST["log_email"]) AND isset($_POST["log_password"])){
	$user = new User();
	$result = $user->userLogin($_POST["log_email"],$_POST["log_password"]);
	echo $result;
	exit();
}

//untuk mendapat category item
if (isset($_POST["getCategory"])){
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("categories");
	foreach ($rows as $row) {
		echo "<option value='".$row["category_id"]."'>".$row["category_name"]."</option>";
	}
	exit();
}

//untuk menambahkan nama category item
if (isset($_POST["category_name"]) AND isset($_POST["parent_cat"])) {
	$obj = new DBOperation();
	$result = $obj->addCategory($_POST["parent_cat"],$_POST["category_name"]);
	echo $result;
	exit();
}


?>