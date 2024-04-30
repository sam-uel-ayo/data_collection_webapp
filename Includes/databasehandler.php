<?php
/*
Database details
*/
$host = "localhost";
$dbname = "student_bio";
$dbusername = "root";
$dbpassword = '';

/*
Connect the database
*/
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);  // A connection object to the database
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection Failed: " . $e->getMessage());
}
