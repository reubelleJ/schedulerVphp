<!doctype html>
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
    
    <div class="container-fluid">
        <!-- Navigation bar -->
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <a class="navbar-brand" href="registration-form.php">Register</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href="../index.html">Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                      </li>
                    </ul>
                  </div>
                </nav>
            </div>
        </div><!-- /* end navigation */ -->
      </div>
        <div class="container">
        
        <!-- Registration form -->
        <form action="validate-data.php" method="post">
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
                    <label for="inputPassword4" class="col-form-label">Password (at least 8 characters)</label>
                        <input type="password" class="form-control" id="company-password" name="company-password" placeholder="********" required>
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
              <input type="text" class="form-control" id="city" name="city" placeholder="Austin" required>
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
              <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="00000" required>
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
   
    include('validate-data.php');
    
?>
</html>