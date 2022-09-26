<?php require "./header.php"; ?>

<!-- Heading -->
<section class="secondarybg">
    <div class="container text-start text-light">
        <h1 class="pt-5 pb-5 p-4">Sign Up Here</h1>
    </div>
</section>

<!-- Form -->
<div class="container p-5 pt-2">

    <form action="./include/signup.inc.php" method="POST">

      <!-- SIGNUP MESSAGES -->
      <?php
        // 1. VALIDATION: If error/success in $_GET - dsiplay appropriate message
        if(isset($_GET['error'])){

          // (i) Empty fields validation 
          if($_GET['error'] == "emptyfields"){
            $errorMsg = "Please fill in all fields";

          // (ii) Invalid Email AND Uid
          } else if ($_GET['error'] == "invalidmailuid") {
            $errorMsg = "Invalid Email and Username";

          // (iii) Invalid Email
          } else if ($_GET['error'] == "invalidmail") {
            $errorMsg = "Invalid Email";

          // (iv) Invalid Username
          } else if ($_GET['error'] == "invaliduid") {
            $errorMsg = "Invalid Username";

          // (v) Password Confirmation Error
          } else if ($_GET['error'] == "passwordcheck") {
            $errorMsg = "Passwords do not match";

          // (vi) Username MATCH in database on save
          } else if ($_GET['error'] == "usertaken") {
            $errorMsg = "Username already taken";

          // (vii) Internal server error 
          } else if ($_GET['error'] == "sqlerror") {
            $errorMsg = "An internal server error has occurred - please try again later";
          
          // Echo Back Danger Alert with the Dynamic Error Message as we definitely have an error!
          }
          echo '<div class="alert text-light rounded-pill text-center shadow errorbg mt-5" role="alert">' . $errorMsg . '</div>';
        
        // 2. SUCCESS MESSAGE: Successful sign up to DB
        } else if (isset($_GET['signup']) == "success") {
          echo '<div class="alert text-light rounded-pill text-center shadow successbg mt-5" role="alert">You have successfully signed up!</div>';    
        }
      ?>
    
           <!-- 1. USERNAME -->
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="uid" placeholder="Username" value=
          <?php 
          // 3. PRE-FILL FORM for ERROR:
          // (i) Pre-populate username if passed back via GET
            if(isset($_GET['uid'])){ 
              echo($_GET['uid']);
            } else {
              echo null;
            }
          ?> 
        >
      </div>  

      <!-- 2. EMAIL -->
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" name="mail" placeholder="Email Address" value=
          <?php 
            // 3. PRE-FILL FORM for ERROR:
            // (ii) Pre-populate email if passed back via GET
            if(isset($_GET['mail'])){ 
              echo($_GET['mail']);
            } else {
              echo null;
            }
          ?> 
        >
      </div>

      <!-- 3. PASSWORD -->
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="pwd" placeholder="Password">
      </div>

      <!-- 4. PASSWORD CONFIRMATION -->
      <div class="mb-3">
        <label for="password" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="pwd-repeat" placeholder="Confirm Password">
      </div>

      <!-- 5. SUBMIT BUTTON -->
      <button type="submit" name="signup-submit" class="btn secondarybtn w-100">Signup</button>
    
    </form>

</div>


<?php require "./footer.php" ?>
