<?php 

    // 1. Check - user clicked login-submit button
    if(isset($_POST['login-submit'])){

        // 2. Connect to DB
        require './connect.inc.php';

        // 3. Collect Post data and store in Variable
        $mailuid = $_POST['mailuid'];
        $password = $_POST['pwd'];


        // 4. Check - any empty field in Login Form
        if(empty($mailuid) || empty($password)){
            header("Location: ../index.php?loginerror=emptyfields");
            exit();
        
        //? 5. Save Post to DB using Prepare Statement
        } else {

            // Declare SQL template with Placeholder ?
            $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?";

            // Init SQL Statement
            $statement = mysqli_stmt_init($conn);

            // Prepate + send statement to database to check for errors
            if(!mysqli_stmt_prepare($statement, $sql)){
                header("Location: ../index.php?loginerror=sqlerror");
                exit();
            } else {

                // Bind User data with statement and Escape string
                mysqli_stmt_bind_param($statement, "ss", $mailuid, $mailuid);

                // Execute SQL statement with User data
                mysqli_stmt_execute($statement);

                // Save result to a variable
                $result = mysqli_stmt_get_result($statement);

                // Covert result to an array for password check
                if($row = mysqli_fetch_assoc($result)){
                    //? 6. Check if the password user input matches in the DB
                    $pwdCheck = password_verify($password, $row['pwdUsers']);

                    // if not match - redirect with wrongpwd error
                    if($pwdCheck == false){
                        header("Location: ../index.php?loginerror=wrongpwd");
                        exit();

                    //? 7. if matched - start session
                    } else if ($pwdCheck == true){

                        session_start();

                        // save data to session super global
                        $_SESSION['userId'] = $row{'idUsers'};
                        $_SESSION['userUid'] = $row{'uidUsers'};
                        // redirect with login success
                        header("Location: ../index.php?login=success");
                        exit();
                    }
                    
                } else {
                    header("Location: ../index.php?loginerror=nouser");
                    exit(); 
                }
            }
        }
    } else {
        header("Location: ../index.php");
        exit();
    }
    



?>