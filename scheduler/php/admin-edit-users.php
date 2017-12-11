<!HTML>

<?php
	
	//Start new or resume existing session
	session_start();
	//Create a connection with mysqli_connect($servername, $username, $password, $dbname) fucntion
	$con = mysqli_connect("localhost","root","","php");
	
	//isset determines if a variable is set and is not NULL.
	//$_GET can collect data sent in the URL
	if(isset($_GET['id']))
	{
		//store user_id from URL
		$get_id = $_GET['id'];
		
		//create query to select all data from table with id get_id
		$select = "SELECT * FROM register_user WHERE user_id='$get_id'";
		
		//run query against database
		$run = mysqli_query($con,$select);
			
		//fetch table data to an associative array
		$row=mysqli_fetch_array($run);

		//store all data from table & user with id "get_id"
		$id = $row['user_id'];
		$name= $row['user_name'];
		$password = $row['user_pass'];		
		$email= $row['user_email'];
		$country = $row['user_country'];
		$phone = $row['user_number'];
		$address = $row['user_address'];
		$birthday = $row['user_birthday'];
		$image = $row['user_image'];
	}
?>

<html>

		<title>Update User</title>
	
<!-- some css for the table & body of the page -->
<style>

body{
	padding:0;
	margin:0;
	background:#205060;
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
	<form action="admin_edit_users.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
	<!-- Create a table with <table> tag -->
		<table align="center" bgcolor="#2d7086" width="500">
		<!-- <tr> creates a row in the table -->
			<tr align="center">
			<!-- <td> tag defines a standard cell in an HTML table -->	
			<!-- <strong> defines a important text -->
				<td colspan="6"><strong><h2>Update User</h2></strong></td>
			</tr>
			<tr>
				<td align="right"><strong>Name:</strong></td>
				<td><input type="text" name="user_name" value= <?php echo $name; ?> ></td>
			</tr>
			<tr>
				<td align="right"><strong>Password:</strong></td>
				<td><input type="password" name="user_password" value= <?php echo $password; ?> ></td>
			</tr>
			<tr>
				<td align="right"><strong>Email:</strong></td>
				<td><input type="text" name="user_email" value= <?php echo $email; ?> ></td>
			</tr>
			<tr>
				<td align="right"><strong>Country:</strong></td>
			<!-- the <select> element creates a drop-down list -->
				<td><select name="user_country" disabled="disabled">
				<!-- the <option> tag defines the available options from the list -->
					<option><?php echo $country; ?></option>
					<option>Argentine</option>
					<option>Mexico</option>
					<option>Germany</option>
					<option>Japan</option>
					<option>United States</option>
				</select></td>
			</tr>
			<tr>
				<td align="right"><strong>Phone No:</strong></td>
				<td><input type="text" name="user_phone" value= <?php echo $phone; ?> ></td>
			</tr>
			<tr>
				<td align="right"><strong>Address:</strong></td>
				<!-- <textarea>  tag defines a multi-line text input control -->
				<td><textarea name="user_address" value= <?php echo $address; ?>cols="30" rows="3"></textarea></td>
			</tr>
			<tr>
				<td align="right"><strong>Birthday:</strong></td>
				<td><input type="date" name="user_bday" disabled="disabled"></td>
			</tr>
				<td align="right"><strong>Image:</strong></td>
				<td><img src="images/<?php echo $image; ?>" width="50" height="50"/> <input type="file" name="user_image" > </td>
			</tr>
			</tr align="center">
				<td colspan="6"><input type="submit" name="update_user" value="Update"></td>
			</tr>
		</table>
	</form>
	
	<center><h3><a href="admin_view_users.php">Admin Panel</a></h3></center>

	
<?php

//**VALIDATE DATA**//
	if(isset($_POST['update_user']))
	{
	
		//get all information from HTML form & save in  local variables
		//mysqli_real_escape_string escapes special characters in a string for use in an SQL statement
		$user_name = mysqli_real_escape_string($con,$_POST['user_name']);
		$user_password = mysqli_real_escape_string($con,$_POST['user_password']);
		$user_email = mysqli_real_escape_string($con,$_POST['user_email']);
		$user_phone = mysqli_real_escape_string($con,$_POST['user_phone']);
		$user_address = mysqli_real_escape_string($con,$_POST['user_address']);
		
		//get the image details from HTML form
		$user_image = $_FILES['user_image']['name'];
		$user_tmp = $_FILES['user_image']['tmp_name'];
		
		//verify email
		if(!filter_var($user_email,FILTER_VALIDATE_EMAIL))
		{
			echo "<script>alert('Invalid Email')</script>";
			exit();
		}
		
		//verify password meets requirement
		if(strlen($user_password) < 8)
		{
			echo "<script>alert('Password must be at least 8 characters')</script>";
			exit();
		}
		
		//checks if user updated email
		if($user_email != $email)
		{
			
		//create query to check for duplicate users
		$select_email = "SELECT * FROM register_user WHERE user_email = '$user_email'";
		
		//run the query against the database
		$run = mysqli_query($con,$select_email);
		
		//check for clone email
		$check_email = mysqli_num_rows($run);
		
			if($check_email == 1)
			{
				echo "<script>alert('This email is already registered')</script>";
				exit();
			}
		}
		
//**UPDATE THE DATA OF TABLE**//
		else
		{
			//An associative array containing session variables available to the current script
			$_SESSION['user_email'] = $user_email;
			
			//move the uploaded image
			move_uploaded_file($user_tmp,"images/$user_image");
			
			//the UPDATE statement is used to update existing records in a table:
			//create query to update a user's values to database
			$update_user = "UPDATE register_user SET user_name='$user_name',user_pass='$user_password',user_email='$user_email',user_number='$user_phone',user_address='$user_address',user_image='$user_image'
			WHERE user_id='$get_id'";

			//run the query against the database
			$run_updateUser = mysqli_query($con,$update_user);
			
			//prompt admin if user is updated
			if($run_updateUser)
			{
				echo "<script>alert('User Updated Sucessfully!')</script>";
				exit();
			}
		}
	}//end if
?>

</body>
</html>