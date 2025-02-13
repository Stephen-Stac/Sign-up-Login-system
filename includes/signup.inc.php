<?php
    // check if user accessed this page the right way. send them to the sign up page if otherwise

    if (isset($_POST['submit'])) {
        
        // store each form value in variable
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['uid'];
        $pwd = $_POST['pwd'];
        $pwdrepeat = $_POST['pwdrepeat'];

        require_once 'dbh.inc.php';  // connect/reference database
        require_once 'functions.inc.php'; // error handling functions

        // check for empty fields and prompt user 
        if (emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) !== false) {
            header("location: ../signup.php?error=emptyinput"); // send user back to sign up page
            exit(); // stop script from running
        }

        // check if user entered a valid user name
        if (invalidUid($username) !== false) {
            header("location: ../signup.php?error=invaliduid"); // send user back to sign up page
            exit(); // stop script from running
        }

        // check for valid email
        if (invalidEmail($email) !== false) {
            header("location: ../signup.php?error=invalidemail"); // send user back to sign up page
            exit(); // stop script from running
        }

        // check for password match
        if (pwdMatch($pwd, $pwdrepeat) !== false) {
            header("location: ../signup.php?error=passwordnotmatching"); // send user back to sign up page
            exit(); // stop script from running
        }
        
        // check if username is taken
        if (uidExists($conn, $username, $email) !== false) {
            header("location: ../signup.php?error=usernametaken"); // send user back to sign up page
            exit(); // stop script from running
        }

        // create user if there are no errors
        createUser($conn, $name, $email, $username, $pwd);
    }
    else {
        header("location: ../signup.php");
        exit(); // stop script from running
    }
?>