<?php
    // start session
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/nav.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href="index.php">Crown</a></div>
            <ul class="links">
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

            <div class="toggle-btn">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
        </div>

        <div class="drop-down">
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
        </div>
    </header>

    <script>
        const toggleBtn = document.querySelector('.toggle-btn');
        const toggleBtnIcon = document.querySelector('.toggle-btn i');
        const dropDownMenu = document.querySelector('.drop-down');

        toggleBtn.onclick = function () {
            dropDownMenu.classList.toggle('open');
            const isOpen = dropDownMenu.classList.contains('open');
            toggleBtnIcon.className = isOpen ? 'fa fa-times' : 'fa fa-bars';
        }
    </script>
</body>
</html>