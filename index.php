<?php
    include_once 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Home page</title>
   
</head>
<body>
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to Our Simple Login System</h1>
            <p>This is a simple sign-up and login system with some error handling functions. Easily manage user authentication and ensure secure access to your application.</p>
            <a href="signup.php" class="btn">Get Started</a>
        </div>
    </section>

    <section class="intro">
        <?php
            // show this message when user is logged in
            if (isset($_SESSION["useruid"])) {
                echo "<p>Hello there, " . $_SESSION["useruid"] . "</p>";
            }
        ?>
        <h2>Introduction</h2>
        <p>Our system provides a straightforward way to handle user sign-ups and logins, complete with error handling to ensure a smooth user experience. Whether you're building a small project or a large application, our system is designed to be easy to integrate and use.</p>
    </section>

    <section class="features">
        <h2>Features</h2>
        <div class="feature-list">
            <div class="feature-item">
                <h3>Easy Sign-Up</h3>
                <p>Quick and simple sign-up process for new users.</p>
            </div>
            <div class="feature-item">
                <h3>Secure Login</h3>
                <p>Ensure secure access with our robust login system.</p>
            </div>
            <div class="feature-item">
                <h3>Error Handling</h3>
                <p>Comprehensive error handling for a smooth user experience.</p>
            </div>
            <div class="feature-item">
                <h3>User Management</h3>
                <p>Efficiently manage user authentication and sessions.</p>
            </div>
        </div>
    </section>
</body>
</html>
