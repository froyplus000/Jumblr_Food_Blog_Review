<?php

    //? 6. Start session for this file
    session_start();

    //? 7. Check User Clicked Edit-Submit Button + Logged In
    if(isset($_POST['edit-submit']) && isset($_SESSION['userId'])){

        //? 8. Connect to DB
        require './connect.inc.php';

        //? 9. Collect & Store POST data
        $id = mysqli_real_escape_string($conn, $_GET['id']); 
        $id = intval($id);
        $restaurantName = $_POST['restaurantName'];
        $imageurl = $_POST['imageurl'];
        $comment = $_POST['comment'];
        $rating = $_POST['rating'];
        $favouriteDish = $_POST['favouriteDish'];

        //? 10. Validation: user fill all field in form
        if(empty($restaurantName) || empty($imageurl) || empty($comment) || empty($rating) || empty($favouriteDish)){
            header("Location: ../editpost.php?id=$id&error=emptyfields");
            exit();

        //? 11. Save (BY UPDATE) Edited Post to DB using Prepared Statements
        } else {

            $sql = "UPDATE posts SET restaurantName=?, imageurl=?, comment=?, rating=?, favouriteDish=? WHERE id=?";

            $statement = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($statement, $sql)){
                header("Location: ../editpost.php?id=$id&error=sqlerror"); 
                exit();
            } else {

                mysqli_stmt_bind_param($statement, "sssdsi", $restaurantName, $imageurl, $comment, $rating, $favouriteDish, $id);

                mysqli_stmt_execute($statement);

                header("Location: ../posts.php?id=$id&edit=success");
                exit();
            }
            
        }

    } else {
        header("Location: ../index.php");
        exit();
    }



?>