<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory Pro Management System</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="./js/main.js"></script>
</head>
<body>
	
	<!--for navbar header-->
	<?php include_once("./templates/header.php"); ?>
	</br></br>

	
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card mx-auto">
				  <img class="card-img-top mx-auto" style="width: 60%;" src="./images/user_xxl.png" alt="Card image cap">
					  <div class="card-body">
						    <h4 class="card-title">Profile Info</h4>
						    <p class="card-text">Rachman Forniandi</p>
						    <p class="card-text">Admin</p>
						    <p class="card-text">Last Login: xxxx-xx-xx</p>
						    <a href="#" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Edit Profile</a>
					  </div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="jumbotron" style="width: 100%; height: 100%;">
					<h1>Welcome Admin,</h1>
					<div class="row">
						<div class="col-sm-6">
							<iframe src="http://free.timeanddate.com/clock/i63fm5z1/n108/szw160/szh160/hoc000/hbw2/hfceee/cf100/hncccc/fdi76/mqc000/mql10/mqw4/mqd98/mhc000/mhl10/mhw4/mhd98/mmc000/mml10/mmw1/mmd98" frameborder="0" width="160" height="160"></iframe>
						</div>
						<div class="col-sm-6">
							<div class="card">
						      <div class="card-body">
							        <h5 class="card-title">New Orders</h5>
							        <p class="card-text">Here you can make invoices and create new orders</p>
							        <a href="#" class="btn btn-primary">New Orders</a>
						      </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<p></p>
	<p></p>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Categories</h5>
							<p class="card-text">Here you can manages your categories and you add new parent and sub categories </p>
							<a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary">Add</a>
							<a href="#" class="btn btn-primary">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Brands</h5>
							<p class="card-text">Here you can manages your brand and you add new brand</p>
							<a href="#" data-toggle="modal" data-target="#form_brand"class="btn btn-primary">Add</a>
							<a href="#" class="btn btn-primary">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Products</h5>
							<p class="card-text">Here you can manages your products and you add new products</p>
							<a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-primary">Add</a>
							<a href="#" class="btn btn-primary">Manage</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<?php 
	//category form
	include_once("/templates/category.php");
	?>

	
	<?php 
	//Brand form
	include_once("/templates/brand.php");
	?>

	
	<?php 
	//products form
	include_once("/templates/products.php");
	?>

</body>
</html>
