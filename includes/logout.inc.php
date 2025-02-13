<?php
    // destroy session variables and log out
    session_start(); // start session
    session_unset(); // unset session
    session_destroy(); // destroy every session
    
    header('location: ../index.php'); // send user back to the home page
    exit(); // stop script from running
?>