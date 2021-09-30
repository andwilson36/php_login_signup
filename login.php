<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/reset.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <title>Login</title>
</head>

<body>

    <?php
    include_once 'header.php';
    ?>

    <main>
        <h1 class="form-header">Login</h1>
        <form action="login.inc.php" method="post">
            <div>
                Username
                <input type="text" name="username" placeholder="Username...">
            </div>
            <div>
                Password
                <input type="password" name="password" placeholder="Password...">
            </div>
            <button type="submit" name="submit">Login</button>
        </form>
    </main>
</body>

</html>