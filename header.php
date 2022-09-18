<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap 5 CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="./css/style.css">

    <title>Jumblr | Food Blog Review</title>

</head>

<body class="bg-light">
    <!-- START: NAVBAR -->

    <div>
        
        <nav id="navbar" class="navbar navbar-expand-lg bg-dark navbar-dark shadow">
            <div class="container">
                <a class="navbar-brand" href="./index.php">JUMBLR</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                        <a class="nav-link" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="./posts.php">Posts</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="./createpost.php">Create Post</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="./editpost.php">Edit Post</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="./imageupload.php">Image Upload</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="./signup.php">Sign Up</a>
                        </li>
                        
                    </ul>

                    
                    <div class="d-flex">
                    <?php 
                      if(isset($_SESSION['userId'])){
                        echo '
                        
                          <form action="include/logout.inc.php" action="POST">
                            <button type="submit" class="btn secondarybtn rounded-pill" name="logout-submit">Logout</button>
                          </form>
                        
                        ';
                      } else {
                        echo '
                        
                          <button class="btn secondarybtn rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#login-modal">LogIn</button>
                        
                        ';
                      }
                    ?>
                      
                    </div>
                    

                </div>
            </div>
        </nav>

    </div>

    <!-- Login Modal: START -->
  <div class="modal fade" id="login-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>

        <!-- login.inc.php - Will process the data from this form-->
        <div class="modal-body ">
          <form action="./include/login.inc.php" method="POST">
            <div class="mb-3">
              <label for="email" class="col-form-label">Email address:</label>
              <input type="email" class="form-control rounded-pill lightinput" id="email" aria-describedby="emailHelp" name="mailuid" placeholder="Email Address">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="mb-3">
              <label for="password" class="col-form-label">Password:</label>
              <input type="password" class="form-control rounded-pill lightinput" id="password" name="pwd" placeholder="Password"></input>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn w-100 rounded-pill secondarybtn" name="login-submit">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Modal: END -->


    <!-- END: NAVBAR -->
   