<?php
require_once '../Includes/config_session.php'; //To access the session variable
require_once '../Includes/signup_view.php'; //To print out any error that occured
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="../stylesheet/signup.css">
    <script src="https://kit.fontawesome.com/db10ff0428.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="wrapper">
        <form id="myForm" action="../Includes/signup.php" method="POST">
            <h1>Create your BioData!</h1>
            <p>Already have existing data? <a href="./login_html.php">Login</a></p>
            
            <div class="input-box">
                <input type="text" name="username" placeholder="Create Username">
            </div>

            <div class="input-box">
                <input type="password" name="Password" placeholder="Create Password" > 
            </div>

            <button type="submit" class="btn">Create</button>
            <div class="error">
                <?php
                check_signup_errors(); //From '/Includes/signup_view.php' To print the error(taken username or any field is empty)
                ?>
            </div>
        </form>
        
    </div>


</body>
</html>