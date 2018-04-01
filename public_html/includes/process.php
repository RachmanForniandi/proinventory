<?php 

include_once("../database/constants.php");
include_once("user.php");
include_once("DBOperation.php");
include_once("manage.php");

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

//untuk mendapat brand item
if (isset($_POST["getBrand"])){
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("brands");
	foreach ($rows as $row) {
		echo "<option value='".$row["brand_id"]."'>".$row["brand_name"]."</option>";
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

//untuk menambahkan nama brand item
if (isset($_POST["brand_name"])) {
	$obj = new DBOperation();
	$result = $obj->addBrand($_POST["brand_name"]);
	echo $result;
	exit();
}

//untuk menambahkan product item
if (isset($_POST["added_date"]) AND isset($_POST["product_name"])) {
	$obj = new DBOperation();
	$result = $obj->addProduct($_POST["select_cat"],
							   $_POST["select_brand"],
							   $_POST["product_name"],
							   $_POST["product_price"],
							   $_POST["product_qty"],
							   $_POST["added_date"]);
	echo $result;
	exit();
}

//Manage Category
if (isset($_POST["manageCategory"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("categories",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = 0;
		foreach ($rows as $row) {
			?>
				<tr>
			      <td><?php echo ++$n; ?></td>
			      <td><?php echo $row["category"]; ?></td>
			      <td><?php echo $row["parent"]; ?></td>
			      <td>
			      	<a href="#" class="btn btn-success btn-sm">Active</a>
			      </td>
			      <td>
			      	<a href="#" class="btn btn-danger btn-sm">Delete</a>
			      	<a href="#" class="btn btn-info btn-sm">Edit</a>
			      </td>
			    </tr>
			<?php
		}
	?>
		<tr><td colspan="5"><?php echo $pagination; ?></td></tr>
	<?php
	exit();
	}
}

?>