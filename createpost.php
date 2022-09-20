<?php require "./header.php"; ?>


<?php

    // Dynamic error
    if(isset($_GET['error'])){
        // Empty Field
        if($_GET['error'] == "emptyfields"){
            $errormsg = "Please fill all fields";
        } else if($_GET['error'] == "sqlerror"){
            $errormsg = "An internal server error has occurred - please try again later";
        }

        echo '
            <h1>
                <div class="alert text-light rounded-pill text-center shadow errorbg mt-5" role="alert">
                    '. $errormsg .'
                </div>
            </h1>
            ';
    }
    

?>


<!-- Heading -->
<section class="secondarybg">
    <div class="container text-start text-light">
        <h1 class="pt-5 pb-5 p-4">Create Post Here</h1>
    </div>
</section>

<!-- Form -->
<div class="container p-5 pt-2">

    <form action="./include/createpost.inc.php" method="POST">
    
        <!-- 1. RESTAURANT NAME -->
        <div class="mb-3">
            <label for="restaurantName" class="form-label">What is Restaurant Name?</label>
            <input type="text" class="form-control" name="restaurantName" placeholder="Restaurant Name" value="">
        </div>  
    
    
        <!-- 2. IMAGE URL -->
        <div class="mb-3">
            <label for="imageurl" class="form-label">Image File Name</label>
            <input type="text" class="form-control" name="imageurl" placeholder="Place your image file name here (eg. cat.jpg)" value="<?php 
                if(isset($_GET['imgName'])){
                    echo $_GET['imgName']; 
                } else {
                    echo null;
                }
            ?>" >
        </div>
    
        <!-- 3. COMMENT SECTION -->
        <div class="mb-3">
            <label for="comment" class="form-label">What is your thought and experiences with the Restaurant?</label>
            <textarea class="form-control" name="comment" rows="5" placeholder="Your Thought goes here..." ></textarea>
        </div>
    
        <!-- 4. RATING -->
        <div class="mb-3">
            <label for="rating" class="form-label">How much would you rate this Restaurant?</label>
            <input type="text" class="form-control" name="rating" placeholder="0 - 5 out of 5 (eg. 4.5/5)" value="" >
        </div>
    
        <!-- 5. FAVOURITE DISH -->
        <div class="mb-3">
            <label for="favouriteDish" class="form-label">What are your Favourite Dish from this Restaurant?</label>
            <input type="text" class="form-control" name="favouriteDish" placeholder="Your Favourite Dish goes here..." value="" >
        </div>
    
        <!-- 6. SUBMIT BUTTON -->
        <button type="submit" name="post-submit" class="btn secondarybtn w-100">Post</button>
    
    </form>

</div>


<?php require "./footer.php" ?>
