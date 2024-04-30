<?php
require_once '../Includes/config_session.php'; //To start the session variable
require_once '../Includes/login_view.php'; //To take the error
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../stylesheet/login.css">
    <script src="https://kit.fontawesome.com/db10ff0428.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="wrapper">
        <div class="text-column">
            <h1 class="header-text">Welcome!</h1>
            <h2>Natural science Students BioData</h2>
            <p>This platform is used to collect the bio data of students in the faculty of Natural Sciences to streamline information gathering to enrich the collective experience within the faculty. It's mandatory!</p>
        </div>

        <form action="../Includes/login.php" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username">
            </div>

            <div class="input-box">
                <input type="password" name="Password" placeholder="Password"> 
            </div>

            <div class="remember-forgot">
                <label for=""><input type="checkbox" name="" id="">Remember my username</label>
            </div>

            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have existing data? <a href="signup_html.php">Register</a></p>
            </div>

            <div class="error">
                <?php
                check_login_errors();
                ?>
            </div>
        </form>
    </div>
</body>
</html>