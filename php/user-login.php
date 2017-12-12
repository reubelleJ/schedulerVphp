<!HTML>

<?php
	
	//Start new or resume existing session
	session_start();
	//Create a connection with mysqli_connect($servername, $username, $password, $dbname) fucntion
	$con = mysqli_connect("localhost","root","","php");

?>
<html>

		<title>Registration Form</title>
	
<!-- some css for the table & body of the page -->
<style>

body{
	padding:0;
	margin:0;
	background:#666699;
}

table{
	color:white;
	padding:10px;
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
	<form action="user-login.php" method="post">
	<!-- Create a table with <table> tag -->
		<table align="center" bgcolor="#8585ad" width="500">
		<!-- <tr> creates a row in the table -->
			<tr align="center">
			<!-- <td> tag defines a standard cell in an HTML table -->	
			<!-- <strong> defines a important text -->
				<td colspan="6"><strong><h2>Login</h2></strong></td>
			</tr>
			<tr>
				<td align="right"><strong>Email:</strong></td>
				<td><input type="text" name="user_email" placeholder="Enter your email" required="required"></td>
			</tr>
			<tr>
				<td align="right"><strong>Password:</strong></td>
				<td><input type="password" name="user_password" placeholder="Enter your password" required="required"></td>
			</tr>
			</tr align="center">
				<td colspan="6"><input type="submit" name="login" value="Login"></td>
			</tr>
		</table>
	</form>
	
	<center><h3>Register <a href="user-registration.php">here</h3></center>
	
<?php

	//Execute when "login" button is clicked
	//isset determines if a variable is set and is not NULL.
	//$_POST is used to collect the data from the HTML form
	if(isset($_POST['login']))
	{
	
		//get input email and password from HTML form
		//mysqli_real_escape_string escapes special characters in a string for use in an SQL statement
		$user_email = mysqli_real_escape_string($con,$_POST['user_email']);
		$user_password = mysqli_real_escape_string($con,$_POST['user_password']);
		
		//create query
		$select_user = "SELECT * FROM register_user WHERE user_email='$user_email' AND user_pass='$user_password'";
		
		//run query against database
		$run = mysqli_query($con,$select_user);
		
		//fetch row from database table
		$check_user = mysqli_num_rows($run);
		
		//verifies both email and password exists in database table
		if($check_user == 0)
		{
			echo "<script>alert('Email or Password is incorrect')</script>";
			exit();
		}
		//valid user; direct to homepage
		else
		{
			$_SESSION['user_email'] = $user_email;
			echo "<script>alert('Login Successful!')</script>";
		}
		
	}//end if

?>
</body>
</html>
