<?php
    // check for empty fields 
    function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) {
        $result; 

        if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)) {
            $result = true;
        }
        else {
            $result = false;
        }

        return $result;
    }

    // check for valid username using the preg_match function
    function invalidUid($username) {
        $result; 

        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) { 
            $result = true;
        }
        else {
            $result = false;
        }

        return $result;
    }

    // check for valid email using the filter_var function
    function invalidEmail($email) {
        $result;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        else {
            $result = false;
        }

        return $result;
    }

    //check for password match 
    function pwdMatch($pwd, $pwdrepeat) {
        $result;

        if ($pwd !== $pwdrepeat) {
            $result = true;
        }
        else {
            $result = false;
        }

        return $result;
    }

    // check if username is taken
    function uidExists($conn, $username, $email) {
        $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
        $stmt = mysqli_stmt_init($conn); // initialize/prepare statement

        // sql statement failed... send user back to sign up page 
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed"); 
            exit();
        }

        // bind parameters and execute statement
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        // check if there is result from the statement
        if ($row = mysqli_fetch_assoc($resultData)) { // fetching data as associative array 
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt); // close the statement
    }

    // sign up user
    function createUser($conn, $name, $email, $username, $pwd) {
        $sql = "INSERT INTO users (usersName, usersEmail, usersUid, userspwd) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn); // submit a request to the database

        // sql statement failed... send user back to sign up page 
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); // hash password
 
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../signup.php?error=none"); // send user back to this page 
        exit(); // stop script
    }


    // LOGIN FUNCTIONS

    function emptyInputLogin($username, $pwd) {
        $result; 

        if (empty($username) || empty($pwd)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function loginUser($conn, $username, $pwd) {
        $uidExists = uidExists($conn, $username, $username);

        if ($uidExists === false) {
            header("location: ../login.php?error=wronglogin"); // return user to the login page
            exit(); // stop script from running
        }

        // check if password exists 
        $pwdHashed = $uidExists["userspwd"];

        // check if password matches what the user submitted
        $checkPwd = password_verify($pwd, $pwdHashed);

        // check if both passwords matches
        if ($checkPwd === false) {
            header("location: ../login.php?error=wronglogin"); // return user to the login page
            exit(); // stop script from running
        }
        else if ($checkPwd === true) {
            session_start(); // start a session
            $_SESSION["userid"] = $uidExists["usersID"]; // create a superglobal variable SESSION to grab data
            $_SESSION["useruid"] = $uidExists["usersUid"];
            header('location: ../index.php');
            exit();
        }
    }
?>