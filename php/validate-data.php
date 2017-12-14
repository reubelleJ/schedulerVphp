<?php
	$con = mysqli_connect("localhost","root","Cietweb#96","scheduler");

    /* Check connection */
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } 

    $company_name = "";
    $company_email = "";
    $company_password = "";
    $address = "";
    $city = "";
    $state = "";
    $zipcode = "";
    
    //if($_SERVER['REQUEST_METHOD'] == 'POST')
    
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

    /* verify all fields are not empty */
    if(empty($company_name) OR empty($company_email) OR empty($company_password) OR empty($address) OR empty($city) OR empty($state) OR empty($zipcode))
    {

        echo "<script>alert('Please complete all fields')</script>";
        exit();
    }
    /* verify valid email format */
    if(!filter_var($company_email,FILTER_VALIDATE_EMAIL))
    {
        echo "<script>alert('Invalid email input')</script>";
        exit();
    }
    /* verify password meets requirement */
    if(strlen($company_password) < 8)
    {
        echo "<script>alert('Password must be at least 8 characters')</script>";
        exit();
    }

    /* create query */
    $select_email = "SELECT company_email FROM registered_companies WHERE company_email = '$company_email'";

    /* run query */
    $run_email = mysqli_query($con,$select_email);

    /* fetch the row from database table */
    $check_email = mysqli_num_rows($run_email);

    /* check for clone email */
    if($check_email > 0)
    {
        echo "<script>alert('This email is already registered')</script>";
        exit();
    }
    /* insert data to table 'registered_companies' */
    else
    {
        //$_SESSION['company_email'] = $company_email;

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
        //mysqli_close($con);
    }

    header("Location: ../templates.php");
    exit();
?>