<?php require "./header.php"; ?>

<!-- Heading -->
<section class="secondarybg">
    <div class="container text-start text-light">
        <h1 class="pt-5 pb-5 p-4">Edit Post Here</h1>
    </div>
</section>



<!-- Collect Post data to display in edit form in editpost.php -->
<?php

//? 1. Check User is Logged In + Id passed in via GET
if(isset($_SESSION['userId']) && isset($_GET['id'])){

    //? 2. Connect to DB
    require './include/connect.inc.php';

    //? 3. Declare variable called $row to store array with our DB data to display (later)
    $row;

    //? 4. Collect, escape string & store POST data
    $id = mysqli_real_escape_string($conn, $_GET['id']); 
    $id = intval($id);

    //? 5. Declare SQL command to extract data from DB relating to post id (Prepared Statements)

    $sql = "SELECT restaurantName, imageurl, comment, rating, favouriteDish FROM posts WHERE id=?";

    $statement = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($statement, $sql)){

        header("Location: editpost.php?id=$id&error=sqlerror");
        exit();

    } else {

        mysqli_stmt_bind_param($statement, "i", $id);

        mysqli_stmt_execute($statement);

        // SUCCESS: Store result & convert to array ($row declared above at 2.)
        $result = mysqli_stmt_get_result($statement);
        $row = mysqli_fetch_assoc($result);
    }
} else {
    header("Location: ./index.php");
    exit();
}

//? Continue Step 6 in editpost.inc.php
?>

<?php 
//* DYNAMIC ERROR ALERTS FOR EDIT POST

if(isset($_GET['error'])){
    // (i) Empty fields validation 
    if($_GET['error'] == "emptyfields"){
    $errorMsg = "Please fill in all fields";

    // (ii) Internal server error 
    } else if ($_GET['error'] == "sqlerror") {
    $errorMsg = "An internal server error has occurred - please try again later";
    }

    // (iii) Dynamic Error Alert based on Variable Value 
    echo '<div class="alert text-light rounded-pill text-center shadow errorbg" role="alert">' . $errorMsg . '</div>';

    // (iv). SUCCESS MESSAGE: Post updated successfully to DB -> NOT on this page.  We redirect them to posts.php, so we will need to add it there LATER!
}
?>

<!-- Form -->
<div class="container p-5 pt-2">

    


        <form action="./include/editpost.inc.php?id=<?php echo $id ?>" method="POST">
    
        <!-- 1. RESTAURANT NAME -->
        <div class="mb-3">
            <label for="restaurantName" class="form-label">What is Restaurant Name?</label>
            <input type="text" class="form-control" name="restaurantName" placeholder="Restaurant Name" value="<?php echo $row['restaurantName'] ?>">
        </div>  
    
    
        <!-- 2. IMAGE URL -->
        <div class="mb-3">
            <label for="imageurl" class="form-label">Image File Name</label>
            <input type="text" class="form-control" name="imageurl" placeholder="Place your image file name here (eg. cat.jpg) " value="<?php echo $row['imageurl'] ?>" >
        </div>
    
        <!-- 3. COMMENT SECTION -->
        <div class="mb-3">
            <label for="comment" class="form-label">What is your thought and experiences with the Restaurant?</label>
            <textarea class="form-control" name="comment" rows="5" placeholder="Your Thought goes here..." ><?php echo $row['comment'] ?></textarea>
        </div>
    
        <!-- 4. RATING -->
        <div class="mb-3">
            <label for="rating" class="form-label">How much would you rate this Restaurant?</label>
            <input type="text" class="form-control" name="rating" placeholder="0 - 5 out of 5 (eg. 4.5/5)" value="<?php echo $row['rating'] ?>" >
        </div>
    
        <!-- 5. FAVOURITE DISH -->
        <div class="mb-3">
            <label for="favouriteDish" class="form-label">What are your Favourite Dish from this Restaurant?</label>
            <input type="text" class="form-control" name="favouriteDish" placeholder="Your Favourite Dish goes here..." value="<?php echo $row['favouriteDish'] ?>" >
        </div>
    
        <!-- 6. SUBMIT BUTTON -->
        <button type="submit" name="edit-submit" class="btn secondarybtn w-100">Edit</button>
    
    </form>

</div>


<?php require "./footer.php" ?>
