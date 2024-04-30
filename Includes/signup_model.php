<?php

declare(strict_types=1);
require_once 'config_session.php';

/*
TO BE USED IN signcontrol.php FILE
*/

//If username already exist in database
function get_username(object $pdo, string $username) // Parameter is making a connection to the database with the PDO connection and username to be checked
{
    $query = "SELECT username FROM login_details WHERE username = :username;"; // SQL query statement that would check the database
    $stmt = $pdo-> prepare($query); // separating the data(user inputted username) from the query for security(SQL Injection)
    $stmt->bindParam(":username", $username); //Grab the username from the database and bind it to the username variable
    $stmt->execute(); //Execute query

    //To check if we actually grabed a data that's corresponds with the data(user inputted data)
    $result = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch only takes the first result from the data we grabbed and the FETCH_ASSOC makes the data an associative array; column
    return $result;  //Either we grab the already existing username or FALSE
}

//If username doesn't exist and no input error(all fields were filled correctly) create user login details.
function set_user(object $pdo, string $username, string $Password) // Parameter is making a connection to the database with the PDO connection and the username and password to be created
{
    $query = "INSERT INTO login_details (username, Password) VALUE(:username, :Password);"; // SQL query statement that would create the user login details in the database.
    $stmt = $pdo-> prepare($query); // separating the data(user inputted username and password) from the query for security(SQL Injection)

    // Creating hashed password(encryption) so the password can't be viewed in the database.
    $options = [
        'cost' => 12 // The higher the cost number the harder it is to just decrpyt.....
    ];
    $hashedpassword = password_hash($Password, PASSWORD_BCRYPT, $options); //

    $stmt->bindParam(":username", $username); //Grab the username from the user(inputted data in form) and bing to $username variable to be added to database
    $stmt->bindParam(":Password", $hashedpassword); //Grab the password(allready hashed) from the user and bind to $hashedpassword to be added to database
    $stmt->execute(); //Execute query

    $userId = $pdo->lastInsertId(); // To get the id of the user just created and assign it to $userId if user was created and FALSE if user wasn't created 
    if ($userId !== false) { //Check if the user was created(TRUE)
        $_SESSION['userId'] = $userId; //Assigns the value of user into a session variable
    } else {
        echo "UserId not recieved";
    }
    return $userId; //Returns userid when function is called
}
