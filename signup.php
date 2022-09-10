<?php require "./header.php"; ?>

<!-- Heading -->
<section class="secondarybg">
    <div class="container text-start text-light">
        <h1 class="pt-5 pb-5 p-4">Sign Up Here</h1>
    </div>
</section>

<!-- Form -->
<div class="container p-5 pt-2">

    <form action="">
    
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
