<?php

    $company_name = "";
    $company_email = "";
    $company_password = "";
    $address = "";
    $city = "";
    $state = "";
    $zipcode = "";
        
    if(isset($_POST["register"]))
    {
        $company_name = mysqli_real_escape_string($con,$_POST['company-name']);
		$company_email = mysqli_real_escape_string($con,$_POST['company-email']);
        $company_password = mysqli_real_escape_string($con,$_POST['company-password']);
		$address = mysqli_real_escape_string($con,$_POST['company-address']);
		$city = mysqli_real_escape_string($con,$_POST['city']);
		$state = $_POST['state'];
		$zipcode = mysqli_real_escape_string($con,$_POST['zipcode']);
    }
    
    echo $company_name . "<br>"; 
    echo $company_email . "<br>";
    echo $company_password . "<br>";
    echo $address . "<br>"; 
    echo $city . "<br>"; 
    echo $state . "<br>"; 
    echo $zipcode . "<br>";

    /*if(!filter_var($comany_email,FILTER_VALIDATE_EMAIL))
    {
        echo "<script>alert('Invalid email input')</script>";
        exit();
    }*/

    /* create query */
    $select_email = "SELECT * FROM registered_companies";
		
    /* run query */
    $run_email = mysqli_query($con,$select_email);

    /* fetch the row from database table */
    $check_email = mysqli_num_rows($run_email);

    /* check for clone email */
    if($check_email == 1)
    {
        echo "<script>alert('This email is already registered')</script>";
        exit();
    }
    /* insert data to table 'registered_companies' */
    else
    {
        $_SESSION['company_email'] = $company_email;

        $insert_client = "INSERT INTO registered_companies (company_name,company_email,company_password,address,city,state,zipcode,date_registered)
        VALUES ('$company_name','$company_email','$company_password','$address','$city','$state','$zipcode',NOW())";
        
        $run_insertClient = mysqli_query($con,$insert_client);
        
        if($run_insertClient)
        {
            echo "<script>alert('Registration Successful!')</script>";
            exit();
        }
        else
        {
            echo "<script>alert('Cannot add record, something went wrong')</script>";
            exit();
        }

    }
?>