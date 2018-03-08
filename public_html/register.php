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
		<div class="card mx-auto" style="width: 30rem;">
			<div class="card-header">Register</div>
			<div class="card-body">
				<form id="register_form" onsubmit="return false" autocomplete="off">
					<div class="form-group">
						<label for="username">Full Name</label>
						<input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
						<small id="u_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group">
						<label for="username">Email address</label>
						<input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
						<small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group">
						<label for="password1">Password</label>
						<input type="password" name="password1" class="form-control" id="password1" placeholder="Password">
						<small id="p1_error" class="form-text text-muted"></small>
					</div>
					<div class="form-group">
						<label for="password2">Re-enter Password</label>
						<input type="password" name="password2" class="form-control" id="password2" placeholder="Password"><small id="p2_error" class="form-text text-muted"></small>
					</div>
					<div class="form-group">
						<label for="userlevel">User Level</label>
						<select name="userlevel" class="form-control" id="userlevel">
							<option value="">Choose User Type</option>
							<option value="admin">Admin</option>
							<option value="user">User</option>
						</select>
						<small id="t_error" class="form-text text-muted"></small>
					</div>
					<button type="submit" name="user_register" class="btn btn-primary"><span class="fa fa-user"></span>&nbsp;Register</button>
					<span><a href="index.php">Login</a></span>				
				</form>
			</div>
			<div class="card-footer text-muted">
				
			</div>
		</div>
	</div>

</body>
</html>
