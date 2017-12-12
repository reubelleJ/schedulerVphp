<?php

//**VALIDATE DATA**//
	//Execute when "register" button is clicked
	//isset determines if a variable is set and is not NULL.
	//$_POST is used to collect the data from the HTML form
	if(isset($_POST['register']))
	{
	
		//get all information from HTML form & save in  local variables
		//mysqli_real_escape_string escapes special characters in a string for use in an SQL statement
		$user_name = mysqli_real_escape_string($con,$_POST['user_name']);
		$user_password = mysqli_real_escape_string($con,$_POST['user_password']);
		$user_email = mysqli_real_escape_string($con,$_POST['user_email']);
		$user_country = mysqli_real_escape_string($con,$_POST['user_country']);
		$user_phone = mysqli_real_escape_string($con,$_POST['user_phone']);
		$user_address = mysqli_real_escape_string($con,$_POST['user_address']);
		$user_gender = mysqli_real_escape_string($con,$_POST['user_gender']);
		$user_bday = mysqli_real_escape_string($con,$_POST['user_bday']);
		
		//get the image details from HTML form
		$user_image = $_FILES['user_image']['name'];
		$user_tmp = $_FILES['user_image']['tmp_name'];
		
		//verify address,country and image are selected
		if(empty($user_address) OR empty($user_country) OR empty($user_image))
		{
			
			echo "<script>alert('Please complete all fields')</script>";
			exit();
		}
		
		//verify email
		if(!filter_var($user_email,FILTER_VALIDATE_EMAIL))
		{
			echo "<script>alert('Invalid email input')</script>";
			exit();
		}
		
		//verify password meets requirement
		if(strlen($user_password) < 8)
		{
			echo "<script>alert('Password must be at least 8 characters')</script>";
			exit();
		}
		
		//the SELECT statement is used to select data from one or more tables:
		//mysqli_query() performs a query against the database
		$select_email = "SELECT * FROM register_user WHERE user_email = '$user_email'";
		$run_email = mysqli_query($con,$select_email);
		
		//fetch the row from database table
		$check_email = mysqli_num_rows($run_email);
		
		//Check for clone email
		if($check_email == 1)
		{
			echo "<script>alert('This email is already registered')</script>";
			exit();
		}
		
//**INSERT DATA INTO TABLE**//
		else
		{
			//An associative array containing session variables available to the current script
			$_SESSION['user_email'] = $user_email;
			
			//move the image to new location
			move_uploaded_file($user_tmp,"/images/$user_image");
			
			//The INSERT INTO statement is used to add new records to a MySQL table:
			$insert_user = "INSERT INTO register_user (user_name,user_pass,user_email,user_country,user_number,user_address,user_gender,user_birthday,user_image, register_date)
			VALUES ('$user_name','$user_password','$user_email','$user_country','$user_phone','$user_address','$user_gender','$user_bday','$user_image',NOW())";
			
			//run the query against the database
			$run_insertUser = mysqli_query($con,$insert_user);
			
			//prompt user if user added
			if($run_insertUser)
			{
				echo "<script>alert('Registration Successful!')</script>";
				exit();
			}
		}
	}//end if
	
?>