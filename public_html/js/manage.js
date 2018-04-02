$(document).ready(function(){
	var DOMAIN = "http://localhost/proinventory/public_html";

	//Manage Category
	manageCategory(1);
	function manageCategory(pn){
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			data : {manageCategory:1,pageno:pn},
			success : function(data){
				$("#get_category").html(data);
			}
		})
	}	

	$("body").delegate(".page-link","click",function(){
		var pn = $(this).attr("pn");
		manageCategory(pn);
	})

	$("body").delegate(".del_cat","click",function(){
			var did = $(this).attr("did");
			if (confirm("Are you sure so you want to delete this category?")) {
				$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : {deleteCategory:1,id:did},
				success : function(data){
					if (data == "DEPENDENT_CATEGORY") {
						alert("Sorry dude, This category is dependent on other sub category.")
					}else if (data == "CATEGORY_DELETED") {
						alert("Category deleted successfully !");
						manageCategory(1);
					}else if (data == "DELETED") {
						alert("Deleted successfully");
					}else{
						alert(data);
					}
				}
			})
		}else{

		}
	})
	

})
