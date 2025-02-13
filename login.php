<?php
    include_once 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <section class="login-section">
        <div class="login-container">
            <h2>Login</h2>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="uid" placeholder="Username/Email"> <br>
                <input type="password" name="pwd" placeholder="Password"> <br>
                <button type="submit" name="submit">Login</button>
            </form>

            <?php
                // check for a GET method error
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p class='error'>Fill in all fields</p>";
                    }
                    elseif ($_GET["error"] == "wronglogin") {
                        echo "<p class='error'>Incorrect login credentials</p>";
                    }
                }
            ?>
        </div>
    </section>
</body>
</html>