<?php
    // start session
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="index.php">ABOUT</a></li>
            <li><a href="index.php">BLOG</a></li>
            <?php
                // check if user is logged in
                if (isset($_SESSION["useruid"])) {
                    echo "<li><a href='profile.php'>PROFILE PAGE</a></li>";
                    echo "<li><a href='includes/logout.inc.php'>LOG OUT</a></li>";
                }
                else {
                    echo "<li><a href='signup.php'>SIGN UP</a></li>";
                    echo "<li><a href='login.php'>LOG IN</a></li>";
                }
            ?>
        </ul>
    </nav>
</body>
</html>