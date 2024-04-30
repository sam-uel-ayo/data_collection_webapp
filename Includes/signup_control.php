<?php 

declare(strict_types=1);
require_once 'config_session.php';

/*
TO BE USED IN signup.php FILE
*/

//If user didn't fill in one of the areas in the form FROM 
function is_input_empty(string $username, string $Password) {
    if(empty($username) || empty($Password)) {
        return true;
    }
    else {
        return false;
    }
}

//If username already exist in database FROM signup_model.php FILE
function is_username_taken(object $pdo, string $username) 
{
    if(get_username($pdo, $username)) { 
        return true;
    } else {
        return false;
    }
} 

//If there's no error at all from the above function create the user login details
// In sign_up_control.php

function create_user(object $pdo, string $username, string $Password)
{
    $userId = set_user($pdo, $username, $Password); // Set user function is coming from 'signup_model.php'

    // If user creation and ID retrieval were successful:
    if ($userId !== false) {
        // Access the user ID stored in the session 
        $userSession = $_SESSION['userId'];

        // Example usage:
        echo "User created successfully with ID: $userSession";

        // Proceed with other actions based on user creation, such as:
        // - Redirecting to a welcome page
        // - Sending a confirmation email
        // - Initiating additional operations
    } else {
        // Handle the case where user creation or ID retrieval failed
        // (e.g., display an error message, try again)
    }
}


