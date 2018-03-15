$(document).ready(function(){
	var DOMAIN = "http://localhost/proinventory/public_html";
	$("#register_form").on("submit",function(){
		var status = false;
		var  name = $("#username");
		var  email = $("#email");
		var  pass1 = $("#password1");
		var  pass2 = $("#password2");
		var  type = $("#userlevel");
		//for email
		var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
		if (name.val == "" || name.val().length < 6) {
			name.addClass("border-danger");
			$("#u_error").html("<span class='text-danger'>Please Enter Name and Name should be more than 6 characters</span>");
			status = false;
		}else{
			name.removeClass("border-danger");
			$("#u_error").html("");
			status = true;
		}
		if (!e_patt.test(email.val())) {
			email.addClass("border-danger");
			$("#e_error").html("<span class='text-danger'>Please Enter Valid Email Address</span>");
			status = false;
		}else{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status = true;
		}
		if (pass1.val() == "" || pass1.val().length < 9) {
			pass1.addClass("border-danger");
			$("#p1_error").html("<span class='text-danger'>Please Enter more than 9 digits Password</span>");
			status = false;
		}else{
			pass1.removeClass("border-danger");
			$("#p1_error").html("");
			status = true;
		}
		if (pass2.val() == "" || pass2.val().length < 9) {
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Please Enter more than 9 digits Password</span>");
			status = false;
		}else{
			pass2.removeClass("border-danger");
			$("#p2_error").html("");
			status = true;
		}
		if (type.val() == "") {
			pass2.addClass("border-danger");
			$("#t_error").html("<span class='text-danger'>Please Choose Your Usertype</span>");
			status = false;
		}else{
			type.removeClass("border-danger");
			$("#t_error").html("");
			status = true;
		}
		if ((pass1.val() == pass2.val()) && status == true) {
			$(".overlay").show();
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#register_form").serialize(),
				success : function(data){
					if(data == "EMAIL_ALREADY_EXISTS"){
						$(".overlay").hide();
						alert("It seems like your email is already used");
					}else if (data == "SOME_ERROR_OCCURED") {
						$(".overlay").hide();
						alert("Somethings wrong");
					}else{
						$(".overlay").hide();
						window.location.href= encodeURI(DOMAIN+"/index.php?msg=You are registered. Now you may proceed.");
					}
				}
			})
		}else{
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Password is not match.</span>");
			status = true;
		}
	})

	//For Login part
	$("#form_login").on("submit",function(){
		var  email = $("#log_email");
		var  pass = $("#log_password");
		var status = false;
		if (email.val() == "") {
			email.addClass("border-danger");
			$("#e_error").html("<span class='text-danger'>Please Enter Email Address</span>");
			status = false;
		}else{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status = true;
		}
		if (pass.val() == "") {
			pass.addClass("border-danger");
			$("#p_error").html("<span class='text-danger'>Please Enter Password</span>");
			status = false;
		}else{
			pass.removeClass("border-danger");
			$("#p_error").html("");
			status = true;
		}
		if (status) {
			$(".overlay").show();
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#form_login").serialize(),
				success : function(data){
					if(data == "NOT_REGISTERED"){	
						$(".overlay").hide();
						email.addClass("border-danger");
						$("#e_error").html("<span class='text-danger'>It seems like you are not registered</span>");
					}else if (data == "PASSWORD NOT MATCHED DUMBASS") {
						$(".overlay").hide();
						pass.addClass("border-danger");
						$("#p_error").html("<span class='text-danger'>Please Enter the correct Password</span>");
						status = false;
					}else{
						$(".overlay").hide();
						console.log(data);
						window.location.href = DOMAIN+"/dashboard.php";
						//alert(data);
					}
				}
			})
		}
	})

	//fetch category
	fecth_category();
	function fecth_category(){
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			data : {getCategory:1},
			success : function(data){
				var root = "<option value='0'>Root</option>";
				$("#parent_cat").html(root+data);
			}
		})
	}

		//menambahkan category item
		$("#category_form").on("submit",function(){
			if ($("#category_name").val() == "") {
				$("#category_name").addClass("border-danger");
				$("#cat_error").html("<span class='text-danger'>Please enter the category name.</span>");
			}else{
				$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#category_form").serialize(),
				success : function(data){
					if (data == "CATEGORY_ADDED") {
						$("#category_name").removeClass("border-danger");
						$("#cat_error").html("<span class='text-success'>New category added successfully.</span>");
						$("#category_name").val("");
					}else{
						alert(data);
					}
				}
			})
		}
	})

	//menambahkan nama brand item
	$("#brand_form").on("submit",function(){
		if ($("#brand_name").val() == "") {
			$("#brand_name").addClass("border-danger");
			$("#brand_error").html("<span class='text-danger'>Please enter the brand name.</span>");
		}else{
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#brand_form").serialize(),
				success : function(data){
					if (data == "BRAND_ADDED") {
						$("#brand_name").removeClass("border-danger");
						$("#brand_error").html("<span class='text-success'>New brand added successfully.</span>");
						$("#brand_name").val("");
					}else{
						alert(data);
					}
				}
			})	
		}
	})	
})