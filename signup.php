<?php
    include_once 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/signup.css">
    <title>Sign Up Page</title>
</head>
<body>
    <section class="signup-section">
        <div class="signup-container">
            <h2>Sign Up</h2>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="name" placeholder="Full Name"> <br>
                <input type="email" name="email" placeholder="Email"> <br>
                <input type="text" name="uid" placeholder="Username"> <br>
                <input type="password" name="pwd" placeholder="Password"> <br>
                <input type="password" name="pwdrepeat" placeholder="Repeat Password"> <br>
                <button type="submit" name="submit">Sign Up</button>
            </form>

            <?php
                // check for a GET method error
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p class='error'>Fill in all fields</p>";
                    }
                    elseif ($_GET["error"] == "invaliduid") {
                        echo "<p class='error'>Choose a proper username</p>";
                    }
                    elseif ($_GET["error"] == "invalidemail") {
                        echo "<p class='error'>Choose a proper email</p>";
                    }
                    elseif ($_GET["error"] == "passwordnotmatching") {
                        echo "<p class='error'>Passwords do not match</p>";
                    }
                    elseif ($_GET["error"] == "stmtfailed") {
                        echo "<p class='error'>Something went wrong. Try again.</p>";
                    }
                    elseif ($_GET["error"] == "usrenametaken") {
                        echo "<p class='error'>Username already taken.</p>";
                    }
                    elseif ($_GET["error"] == "none") {
                        echo "<p class='success'>You are signed up</p>";
                    }
                }
            ?>
        </div>
    </section>
</body>
</html>