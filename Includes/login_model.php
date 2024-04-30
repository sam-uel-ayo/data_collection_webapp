<?php

declare(strict_types=1);

/*
TO BE USED IN login_control.php FILE
*/

//If username exist in database
function get_user(object $pdo, string $username)
{
    $query = "SELECT * FROM login_details WHERE username = :username;"; // SQL query statement that would check the database and get all the details in that row-
    $stmt = $pdo-> prepare($query); // separating the data(user inputted username) from the query for security(SQL Injection)
    $stmt->bindParam(":username", $username); //Grab the username from the database and bind it to the username variable
    $stmt->execute(); //Execute query

    //To check if we actually grabed a data that's corresponds with the data(user inputted data)
    $result = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch only takes the first result from the data we grabbed and the FETCH_ASSOC makes the data an associative array; column
    return $result;  //Either we grab the already existing username or FALSE
}
