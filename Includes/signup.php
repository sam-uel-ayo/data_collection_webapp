<?php

/*
Check if user entered page legitmately
*/

if ($_SERVER["REQUEST_METHOD"] === "POST") { //Checks if the page was accessed using the request post method
   
    //Grab the data from the user(filled signup form)
    $username = $_POST["username"];
    $Password = $_POST["Password"];

    try {
        

        require_once 'databasehandler.php'; // Connect to the database
        require_once 'signup_model.php'; // Query the database
        require_once 'signup_control.php'; //Controls how data from the user and database should be handled

        /*
        ERROR HANDLERS from 'signup_control.php'
        */
        $errors = [];

        if (is_input_empty($username, $Password)) { //If any of the field is empty
            $errors["Empty_input"] = "Fill in all fields";
        }
        if (is_username_taken($pdo, $username)) { //If the username inputted is already used by another user
            $errors["username_exist"] = "Username already taken";
        }


        /*
        Start a session for the signup sequence to work and if errors send user back to signup page with the error that occured
        */
        require_once 'config_session.php';

        if($errors) {
            $_SESSION["error_signup"] = $errors;
            header("Location: ../HTML/signup_html.php");
            die(); 
        }

        
        create_user($pdo, $username, $Password); //This function is from 'signup_control.php' to create the user if no errors occured
        // Access the user ID from the session saved in 'signup_control.php' when the user was created
        $userId = $_SESSION['userId'];
        header("Location: ../HTML/form_html.php?id=$userId"); // Sent the user ID the form page so it would be used to save the user biodata in the database
        // Storing user ID in a cookie for later use (if needed)
        setcookie('userId', $userId, time() + 3600);
        
        $pdo = null;
        $stmt = null;
    
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage()); //If....
    }

} else {
    header("Location: ../HTML/signup_html.php"); //If not accessed correctly send back to signup form
    die();
}

