    <?php require "./header.php"; ?>

    <!-- Welcome Display -->
    <div id="welcome" class="container rounded-pill shadow mb-5 secondarybg text-light">
        <h1 class="p-5 pb-1 mt-5 text-center ">Welcome to <span class="">JUMBLR</span></h1>
        <p class="lead text-center pb-5 ">Food Blog Review</p>
    </div>

    <!-- Dynmic Status Display -->

    <div class="container">
        <?php 
            if(isset($_SESSION["userId"])){
                echo '
                <h1>
                    <div class="alert text-light rounded-pill text-center shadow successbg mt-5" role="alert">
                        You are Logged In!
                    </div>
                </h1>
                ';
            } else {
                echo '
                <h1>
                    <div class="alert text-light rounded-pill text-center shadow errorbg mt-5" role="alert">
                        You are Not Log In!
                    </div>
                </h1>
                ';
            }
        ?>

        <!-- LOGGED IN ERROR MESSAGES -->
        <?php
            // VALIDATION: If error/success in $_GET - dsiplay appropriate message
            if(isset($_GET['loginerror'])){

                // Empty fields validation 
                if($_GET['loginerror'] == "emptyfields"){
                $errorMsg = "Please fill in all fields";

                // Wrong Password
                } else if ($_GET['loginerror'] == "wrongpwd"){
                    $errorMsg = "Wrong password, please enter the correct password";

                } else if ($_GET['loginerror'] == "nouser"){
                    $errorMsg = "No user exists, please enter the correct email";
                // Internal server error 
                } else if ($_GET['loginerror'] == "sqlerror") {
                    $errorMsg = "An internal server error has occurred - please try again later";
                            
                // Echo Back Danger Alert with the Dynamic Error Message as we definitely have an error!
                } 
                    echo '
                    <h1>
                        <div class="alert text-light rounded-pill text-center shadow errorbg mt-5" role="alert">
                                ' . $errorMsg . '
                        </div>
                    </h1>
                    ';
            }          
                       
        ?>              

    </div>

    <?php require "./footer.php" ?>
