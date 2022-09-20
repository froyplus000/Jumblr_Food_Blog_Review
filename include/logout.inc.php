<?php 
// Start session
session_start();
// Take all session values in $_SESSION variable and removes them
session_unset();
// End session
session_destroy();
// Redirect user to index page
header("Location: ../index.php");

?>