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
    </div>

    
        
        


    <?php require "./footer.php" ?>
