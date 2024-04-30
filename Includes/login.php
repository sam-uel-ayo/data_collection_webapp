<?php


/*
Check if user entered page legitmately
*/

if ($_SERVER["REQUEST_METHOD"] === "POST") { //Checks if the page was accessed using the request post method

    //Grab the data from the user(filled loginup form)
    $username = $_POST["username"];
    $Password = $_POST["Password"];

    try {
        require_once 'databasehandler.php';
        require_once 'login_model.php';
        require_once 'login_control.php';

        /*
        ERROR HANDLERS
        */
        $errors = [];

        if (is_input_empty($username, $Password)) { //If any of the field is empty
            $errors["Empty_input"] = "Fill in all fields";
        }
        
        $result = get_user($pdo, $username);

        if(is_username_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect login info";
        }
        if (!is_username_wrong($result) && is_password_wrong($Password, $result["Password"])) { // If the username is not wrong(it is right) and if the password is incorrect
            $errors["login_incorrect"] = "Incorrect login info";
        }
        
        /*
        Start a session for the signup sequence to work and if errors send user back to signup page
        */
        require_once 'config_session.php';

        if($errors) {
            $_SESSION["error_login"] = $errors;
            header("Location: ../HTML/login_html.php");
            die(); 
        }

        $_SESSION['userId']  = $userId;
        $_POST['username'] = htmlspecialchars($username);

        header("Location: ../HTML/display_html.php?username=$username"); //To lead to the display page
        

        $pdo = null;
        $stmt = null;

        die();
        
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage()); //If....
    }


} else {
    header("Location: ../HTML/login_html.php"); //If not accessed correctly send back to signup form
    die();
    
}
