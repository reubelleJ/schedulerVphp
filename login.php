<!DOCTYPE html>
<?php
	
	/* Start new or resume existing session */
	//session_start();
	/* Create a connection with mysqli_connect($servername, $username, $password, $dbname) function */
	$con = mysqli_connect("localhost","root","","scheduler");
    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } 
    echo "Connected successfully";
?>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/login-styles.css">
    
  </head>
  <body>

    <div class="container">
        <!-- Navigation bar -->
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <a class="navbar-brand" href="#">Scheduler</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                      </li>
                    </ul>
                  </div>
                </nav>
            </div>
        </div>
        <div class="row login-div">
            <div class="col-xs-12 col-md-12">
                <!-- Login Form -->
                <form action="login.php" method="post">
                    <!-- ID field -->
                    <div class="form-group row">
                      <label for="inputText3" class="col-sm-2 col-form-label">ID</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="emp-id" id="emp-id" required>
                      </div>
                    </div>
                    <!-- Password field -->
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="emp-password" id="emp-password" placeholder="Password" required>
                        </div>
                    </div>
                    <!-- Company name field -->
                    <div class="form-group row">
                      <label for="inputText3" class="col-sm-2 col-form-label">Company</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" id="emp-company" name="emp-company" required>
                      </div>
                    </div>
                  <fieldset class="form-group">
                  </fieldset>
                  <div class="form-group row">
                    <!-- Remember me button -->
                    <div class="col-sm-12">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox"> Remember me
                        </label>
                      </div>
                    </div>
                  </div>
                 <!-- Sign in button -->
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary" name="signin">Sign in</button>
                    </div>
                  </div>
                </form> <!-- /* End form */ -->          
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
      
    <?php

        /*  Execute when "login" button is clicked.
        'isset' determines if a variable is set.
        $_POST is used to collect the data from the HTML form */
        if(isset($_POST["signin"]))
        {

            /* get input id, password, company from HTML form. */
            /* mysqli_real_escape_string escapes special  characters in a string for use in an SQL statement */
            $emp_id = mysqli_real_escape_string($con,$_POST["emp-id"]);
            $emp_pass = mysqli_real_escape_string($con,$_POST["emp-password"]);
            $emp_company = mysqli_real_escape_string($con,$_POST["emp-company"]);
            
            echo $emp_id;
            echo $emp_pass;
            echo $emp_company;
        
            /* create query */    
            $select_emp = "SELECT * FROM x_employees WHERE employee_id ='$emp_id' AND employee_password ='$emp_pass'";

            /* run query against database */
            $run = mysqli_query($con,$select_emp);

            /* fetch row from database table */
            $check_emp = mysqli_num_rows($run);

            /* verifies both id and password exists in database table */
            if($check_emp == 0)
            {
                echo "<script>alert('Email or Password is incorrect')</script>";
                exit();
            }
            /* valid user; direct to homepage */
            else
            {
                $_SESSION["emp-id"] = $emp_id;
                echo "<script>alert('Login Successful!')</script>";
            }
            
        }/* end post */

      ?>
  </body>
</html>