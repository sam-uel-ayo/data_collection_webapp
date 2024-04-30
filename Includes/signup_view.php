<?php

declare(strict_types=1);

/*
TO BE USED IN signup_html.php FILE
*/


// Function to check if there was any error when signing up 
function check_signup_errors() 
{
    if(isset($_SESSION["error_signup"])) {  //Check if we actually have any errors stored in the session variable from signup.php 
        $errors = $_SESSION["error_signup"];

        echo "<br>";   //Echo out any errors that occur under the form

        foreach ($errors as $error) {
            echo '<p class="error">' . $error . '</p>';
        }

        unset($_SESSION['error_signup']);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") 
    {
        echo '<br>';
        echo '<p>Signup Success!</p>';
    }
}
