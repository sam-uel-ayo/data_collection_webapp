<?php

declare(strict_types=1);

/*
TO BE USED IN login_html.php FILE
*/

//To output errors during login
function check_login_errors() 
{
    if (isset($_SESSION["error_login"])) {
        $errors = $_SESSION["error_login"];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="error">' . $error . '</p>';
        }

        unset($_SESSION['error_login']);
    }
    else if (isset($_GET['login']) && $_GET['login'] === "success") {
        
    }
}