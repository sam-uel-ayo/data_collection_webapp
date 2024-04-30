<?php

declare(strict_types=1);

/*
TO BE USED IN login.php FILE
*/

//If username isn't in database
function is_username_wrong(bool|array $result) // 
{
    if (!$result) {  // If result is false return true
        return true; // Username is wrong, or doesn't exist
    } else {
        return false; // Username is right, and it exist
    }
}

//If password isn't in database
function is_password_wrong(string $Password, string $hashedpassword)
{
    if (!password_verify($Password, $hashedpassword)) {  // Verifies that a password doesn't matches a hash from the database
        return true; // Password is wrong, or doesn't exist
    } else {
        return false; // Password is right, and it exist
    }
}

//If any input is empty
function is_input_empty($username, $Password) //
{
    if (empty($username) || empty($Password)) {  // Verifies that non of the input from the form is empty
        return true; 
    } else {
        return false; 
    }
}
