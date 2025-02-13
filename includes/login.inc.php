<?php
    // check if user logged in the right way
    if (isset($_POST["submit"])) {

        // grab and store data
        $username = $_POST["uid"];
        $pwd = $_POST["pwd"];

        require_once 'dbh.inc.php';  // connect/reference  database
        require_once 'functions.inc.php'; // erro handling functions

                // check for empty fields and prompt user 
        if (emptyInputLogin($username, $pwd) !== false) {
            header("location: ../login.php?error=emptyinput"); // send user back to sign up page
            exit(); // stop script from running
        }

        // connect to database and login user
        loginUser($conn, $username, $pwd);
    }
    else {
        header("location: ../login.php"); // return user to the login page
        exit(); // stop script from running
    }

?>