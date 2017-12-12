<!doctype html>
<?php
	
	/* Start new or resume existing session */
	//session_start();
	
    /* Create a connection with mysqli_connect($servername, $username, $password, $dbname) function */
	$con = mysqli_connect("localhost","root","","scheduler");
    
    /* Check connection */
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } 
    echo "Connected successfully";
?>
<html lang="en">
  <head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
        <!-- Navigation bar -->
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="#">Scheduler</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Prices</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Standard Template</a>
              <a class="dropdown-item" href="#">Custom Template</a>
              <a class="dropdown-item" href="#">Web Development</a>
            </div>
          </li>
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
            <a href="login.php"><button type="button" class="btn btn-outline-success my-2 my-sm-0">Sign In</button></a>
          </li>
          <li class="nav-item">
           <a href="registration.php"><button type="button" class="btn btn-success">Sign Up</button></a>
          </li>
      </div>
    </nav><!-- /* end navigation */ -->
        <!-- Registration form -->
        <form action="registration.php" method="post">
          <!-- Company name -->
            <div class="form-row">            
                <div class="form-group col-sm-12">
                    <label for="inputAddress" class="col-form-label">Company Name</label>
                        <input type="text" class="form-control" id="company-name" name="company-name" placeholder="Scheduler Inc." required>
                </div>
            </div>
            <!-- Email -->
            <div class="form-row">
                <div class="form-group col-sm-12">
                  <label for="example-email-input" class="col-form-label">Email</label>
                    <input class="form-control" type="email" value="jonhdoe@doe.com" id="company-email" name="company-email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label for="inputPassword4" class="col-form-label">Password</label>
                        <input type="password" class="form-control" id="company-password" name="company-password" placeholder="Password" required>
                </div>
            </div>
          <!-- Address -->
          <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="company-address" name="company-address" placeholder="1234 Main St" required>
          </div>
          <!-- City -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">City</label>
              <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <!-- State -->
            <div class="form-group col-md-4">
              <label for="inputState">State</label>
              <select id="state" name="state" class="form-control">
                <option selected>Choose...</option>
                <option>TX</option>
                <option>CA</option>
                <option>NY</option>
                <option>WA</option>
                <option>FL</option>
                <option>OK</option>
              </select>
            </div>
            <!--- Zip code -->
            <div class="form-group col-md-2">
              <label for="inputZip">Zip</label>
              <input type="text" class="form-control" name="zipcode" id="zipcode" required>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name="register">Register</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
    
<?php
   // include('validate-data.php');

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
    
    //verify address,country and image are selected
    if(empty($company_name) OR empty($company_email) OR empty($company_password) OR empty($address) OR empty($city) OR empty($state) OR empty($zipcode))
    {

        echo "<script>alert('Please complete all fields')</script>";
        exit();
    }
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
</html>