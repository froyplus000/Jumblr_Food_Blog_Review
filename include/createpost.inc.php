<?php

//? 1. Start Session
session_start();

//? 2. Check user clicked post-submit button
if(isset($_POST['post-submit']) && isset($_SESSION['userId'])){

    //? 3. Connect to DB
    require './connect.inc.php';

    //? 4. Save POST data to variables
    $currentUserId = $_SESSION['userId'];
    $restaurantName = $_POST['restaurantName'];
    $imageurl = $_POST['imageurl'];
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];
    $favouriteDish = $_POST['favouriteDish'];

    //? 5. Validation: user fill all field in form
    if(empty($restaurantName) || empty($imageurl) || empty($comment) || empty($rating) || empty($favouriteDish)){
        header("Location: ../createpost.php?error=emptyfields");
        exit();

    //? 6. Save Post to DB using Prepare Statement
    } else {

        // Declare SQL template with Placeholder ?
        $sql = "INSERT INTO posts VALUES (NULL, ?, ?, ?, ?, ?, ?)";

        // Init SQL Statement
        $statement = mysqli_stmt_init($conn);

        // Prepate + send statement to database to check for errors
        if(!mysqli_stmt_prepare($statement, $sql)){
            header("Location: ../createpost.php?error=sqlerror");
            exit();
        } else {

            // Bind User data with statement and Escape string
            mysqli_stmt_bind_param($statement, "isssds", $currentUserId, $restaurantName, $imageurl, $comment, $rating, $favouriteDish);

            // Execute SQL statement with User data
            mysqli_stmt_execute($statement);

            // SUCCESS: Post is saved to DB table - redirect with sucess message
            header("Location: ../posts.php?post=success");
            exit();
        }

    }


} else {
    header("Location: ../index.php");
    exit();
}



?>