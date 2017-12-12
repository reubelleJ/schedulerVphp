<!HTML>

<?php
	
	//Start new or resume existing session
	session_start();
	//Create a connection with mysqli_connect($servername, $username, $password, $dbname) function
	$con = mysqli_connect("localhost","root","","php");

?>
<html>

		<title>Admin Panel - Login</title>
	
<!-- some css for the table & body of the page -->
<style>

body{
	padding:0;
	margin:0;
	background:#205060;
}

table{
	color:white;
	width:400px;
	border:1px solid black;
}
th{
	height:50px;
}
input{
	padding:5px;
}
</style>

<body>

<!-- <form> element defines a form that is used to collect user input -->
	<form action="admin_login.php" method="post">
	<!-- Create a table with <table> tag -->
		<table align="center" bgcolor="#2d7086" width="500">
		<!-- <tr> creates a row in the table -->
			<tr align="center">
			<!-- <td> tag defines a standard cell in an HTML table -->	
			<!-- <strong> defines a important text -->
				<td colspan="6"><strong><h2>Admin Login</h2></strong></td>
			</tr>
			<tr>
				<td align="right"><strong>Email:</strong></td>
				<td><input type="text" name="admin_email" placeholder="Enter your email" required="required"></td>
			</tr>
			<tr>
				<td align="right"><strong>Password:</strong></td>
				<td><input type="password" name="admin_password" placeholder="Enter your password" required="required"></td>
			</tr>
			</tr align="center">
				<td colspan="6"><input type="submit" name="admin_login" value="Login"></td>
			</tr>
		</table>
	</form>
		
<?php

	//Execute when "login" button is clicked
	//isset determines if a variable is set and is not NULL.
	//$_POST is used to colllect the data from the HTML form
	if(isset($_POST['admin_login']))
	{
	
		//get input email and password from HTML form
		//mysqli_real_escape_string escapes special characters in a string for use in an SQL statement
		$admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
		$admin_password = mysqli_real_escape_string($con,$_POST['admin_password']);
		
		//crete query using the SELECT statement
		$select_user = "SELECT * FROM admin WHERE admin_email ='$admin_email' AND admin_pass ='$admin_password'";
		
		//perform the query against the database
		$run = mysqli_query($con,$select_user);
		
		//fetch the row from database table
		$check_user = mysqli_num_rows($run);
		
		//verify the admin user exist
		if($check_user == 0)
		{
			echo "<script>alert('Email or Password is incorrect')</script>";
			exit();
		}
		//direct user to view_users page
		else
		{
			
			$_SESSION['admin_email'] = $admin_email;
			echo "<script>window.open('admin_view_users.php','_self')</script>";
		}
		

	}
	
?>
</body>
</html>