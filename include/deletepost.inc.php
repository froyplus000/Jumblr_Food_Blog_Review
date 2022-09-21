<?php

    //? 1. Start Session
    session_start();

    //? 2. Check User is Logged In + Id passed in via GET
    if(isset($_SESSION['userId']) && isset($_GET['id'])){

        //? 3. Connect to DB
        require './connect.inc.php';

        //? 4. Collect, escape string and store Data
        $id = mysqli_real_escape_string($conn, $_GET['id']); 

        //? 5. Check that data is an integer (ensure random letters/symbols aren't passed in!)
        $id = intval($id);

        //? 6. Delete Post from DB (Prepared Statements)

        $sql = "DELETE FROM posts WHERE id=?";

        $statment = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($statment, $sql)){
            header("Location: ../posts.php?id=$id&error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($statment, "i", $id);

            mysqli_stmt_execute($statment);

            header("Location: ../posts.php?id=$id&delete=success");
            exit();
        }

    } else {
        header("Location: ../index.php");
        exit();
    }





?>