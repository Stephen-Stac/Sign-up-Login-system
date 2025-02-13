<?php
    // informatin about databse
    $serverName = "localhost";
    $dBUsername = "root";
    $dBpassword = "";
    $dBName = "project1";

    $conn = mysqli_connect($serverName, $dBUsername,$dBpassword, $dBName);  // connect to database 

    // check if database has any errors a
    if (!$conn) {
        die("Connection Faileed: " . mysqli_connect_error());  //kill the connection and display message to the user 
        
    }

    // test case
    // try {
    //     $conn = mysqli_connect($serverName, $dBUsername,$dBpassword, $dBName);
    //     echo "connected";
    // } catch (mysqli_sql_exception) {
    //     echo "could not connect <br>";
    // }
    

?>