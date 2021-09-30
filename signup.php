<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/reset.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <title>Sign Up</title>
</head>

<body>

    <?php
    include_once 'header.php';
    ?>

    <main>
        <h1 class="form-header">Sign-Up</h1>
        <form action="includes/signup.inc.php" method="post">
            <div>
                Username
                <input type="text" name="username" placeholder="Username...">
            </div>
            <div>
                Password
                <input type="password" name="password" placeholder="Password...">
            </div>
            <div>
                Repeat Password
                <input type="password" name="password-repeat" placeholder="Repeat Password...">
            </div>
            <button type="submit" name="submit">Sign-Up</button>
        </form>
    </main>

    <?php 
        if(isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields!<p>";
            }
            else if ($_GET["error"] == "emptyuid") {
                echo "<p>Fill in username!<p>";
            }
            else if ($_GET["error"] == "matchfail") {
                echo "<p>Passwords do not match!<p>";
            }
            else if ($_GET["error"] == "stmtfail") {
                echo "<p>Something went wrong!<p>";
            }
            else if ($_GET["error"] == "usernametaken") {
                echo "<p>Username is taken!<p>";
            }
            else {
                echo "<p>Success!<p>";
            }
        }
    ?>
</body>

</html>