<?php 

    if(isset($_POST['login-submit'])){

        require './connect.inc.php';

        $mailuid = $_POST['mailuid'];
        $password = $_POST['pwd'];

        if(empty($mailuid) || empty($password)){
            header("Location: ../index.php?loginerror=emptyfields");
            exit();
        } else {
            
            $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?";

            $statement = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($statement, $sql)){
                header("Location: ../index.php?loginerror=sqlerror");
                exit();

            } else {
                mysqli_stmt_bind_param($statement, "ss", $mailuid, $mailuid);

                mysqli_stmt_execute($statement);

                $result = mysqli_stmt_get_result($statement);
                if($row = mysqli_fetch_assoc($result)){
                    $pwdCheck = password_verify($password, $row['pwdUsers']);

                    if($pwdCheck == false){
                        header("Location: ../index.php?loginerror=wrongpwd");
                        exit();
                    } else if ($pwdCheck == true){
                        session_start();

                        $_SESSION['userId'] = $row{'idUsers'};
                        $_SESSION['userUid'] = $row{'uidUsers'};
                        header("Location: ../index.php?login=success");
                        exit();
                    } else {
                        header("Location: ../index.php?loginerror=wrongpwd");
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