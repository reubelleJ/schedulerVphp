<!HTML>

<?php
	
	//Start new or resume existing session -- store data about user
	session_start();
	//Create a connection with mysqli_connect($servername, $username, $password, $dbname) function
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
	<form action="user-registration.php" method="post" enctype="multipart/form-data">
	<!-- Create a table with <table> tag -->
		<table align="center" bgcolor="#8585ad" width="500">
		<!-- <tr> creates a row in the table -->
			<tr align="center">
			<!-- <td> tag defines a standard cell in an HTML table -->	
			<!-- <strong> defines a important text -->
				<td colspan="6"><strong><h2>New User</h2></strong></td>
			</tr>
			<tr>
				<td align="right"><strong>Name:</strong></td>
				<td><input type="text" name="user_name" placeholder="Enter your name" required="required"></td>
			</tr>
			<tr>
				<td align="right"><strong>Password:</strong></td>
				<td><input type="password" name="user_password" placeholder="Enter your password" required="required"></td>
			</tr>
			<tr>
				<td align="right"><strong>Email:</strong></td>
				<td><input type="text" name="user_email" placeholder="Enter your email" required="required"></td>
			</tr>
			<tr>
				<td align="right"><strong>Country:</strong></td>
			<!-- the <select> element creates a drop-down list -->
				<td><select name="user_country">
				<!-- the <option> tag defines the available options from the list -->
					<option>Select a Country</option>
					<option>Argentine</option>
					<option>Mexico</option>
					<option>Germany</option>
					<option>Japan</option>
					<option>United States</option>
				</select></td>
			</tr>
			<tr>
				<td align="right"><strong>Phone No:</strong></td>
				<td><input type="text" name="user_phone" placeholder="Enter your phone number" required="required"></td>
			</tr>
			<tr>
				<td align="right"><strong>Address:</strong></td>
			<!-- <textarea>  tag defines a multi-line text input control  -->
				<td><textarea name="user_address" cols="30" rows="3"></textarea></td>
			</tr>
			<tr>
				<td align="right"><strong>Gender:</strong></td>
				<td>Male:<input type="radio" name="user_gender" value="Male">
				Female:<input type="radio" name="user_gender" value="Female"></td>
			</tr>
			<tr>
				<td align="right"><strong>Birthday:</strong></td>
				<td><input type="date" name="user_bday" required="required"></td>
			</tr>
				<td align="right"><strong>Image:</strong></td>
				<td><input type="file" name="user_image" required="required"></td>
			</tr>
			</tr align="center">
				<td colspan="6"><input type="submit" name="register" value="Register"></td>
			</tr>
		</table>
	</form>
	
	<center><h3>Already Registered? <a href="user_login.php">Login</h3></center>

<?php

	include ('validate-data.php');
	
?>

</body>
</html>
