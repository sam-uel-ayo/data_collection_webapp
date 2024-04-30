<?php
require_once 'config_session.php';


/*
Check if user entered page legitmately
*/

if ($_SERVER["REQUEST_METHOD"] === "POST") { //Checks if the page was accessed using the request post method
    
//Grab the data from the user(filled biodata form)
$Matric = $_POST["MatricNumber"];
$Firstname = $_POST["FirstName"];
$Surname = $_POST["Surname"];
$DOB = $_POST["DateOfBirth"];
$Nationality = $_POST["Nationality"];
$Religion = $_POST["Religion"];
$PhoneNo = $_POST["PhoneNumber"];
$Email = $_POST["Email"];
$Department = $_POST["Department"];
$Currentlevel = $_POST["CurrentLevel"];
$Yearofentry = $_POST["YearofEntry"];
$Modeofentry = $_POST["ModeofEntry"];
$Psurname = $_POST["ParentSurname"];
$Pfirstname = $_POST["ParentFirstName"];
$Othername = $_POST["OtherName"];
$PphoneNo = $_POST["ParentPhoneNumber"];
$Pemail= $_POST["EmailAddress"];
$Address = $_POST["Address"];
$userId = $_SESSION['userId'];



    try {
        require_once 'databasehandler.php';
        require_once 'config_session.php';

        


        $query = "INSERT INTO student_data (MatricNumber, FirstName, Surname, DateOfBirth, Nationality, Religion, PhoneNumber, Email, Department, CurrentLevel, YearofEntry, ModeofEntry, id)
        VALUE (:Matric, :Firstname, :Surname, :DOB, :Nationality, :Religion, :PhoneNo, :Email, :Department, :Currentlevel, :Yearofentry, :Modeofentry, :id);";

        $query1 = "INSERT INTO parent_data (ParentSurname, ParentFirstName, OtherName, ParentPhoneNumber, EmailAddress, Address, id)
        VALUE (:Psurname, :Pfirstname, :Othername, :PphoneNo, :Pemail, :Address, :id);";

        
        $stmt = $pdo->prepare($query);
        $stmt1 = $pdo->prepare($query1);

        $stmt->bindParam(":Matric", $Matric);
        $stmt->bindParam(":Firstname", $Firstname);
        $stmt->bindParam(":Surname", $Surname);
        $stmt->bindParam(":DOB", $DOB);
        $stmt->bindParam(":Nationality", $Nationality);
        $stmt->bindParam(":Religion", $Religion);
        $stmt->bindParam(":PhoneNo", $PhoneNo);
        $stmt->bindParam(":Email", $Email);
        $stmt->bindParam(":Department", $Department);
        $stmt->bindParam(":Currentlevel", $Currentlevel);
        $stmt->bindParam(":Yearofentry", $Yearofentry);
        $stmt->bindParam(":Modeofentry", $Modeofentry);
        $stmt->bindParam(":id", $userId);
        
        $stmt1->bindParam(":Psurname", $Psurname);
        $stmt1->bindParam(":Pfirstname", $Pfirstname);
        $stmt1->bindParam(":Othername", $Othername);
        $stmt1->bindParam(":PphoneNo", $PphoneNo);
        $stmt1->bindParam(":Pemail", $Pemail);
        $stmt1->bindParam(":Address", $Address);
        $stmt1->bindParam(":id", $userId);
        
        $stmt->execute();
        $stmt1->execute();

        $pdo = null;
        $stmt = null;
        $stmt1 = null;

        header("Location: ../HTML/login_html.php?signup=success");

        die(); 


    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage()); //If....
    }




} else {
    header("Location: ../HTML/signup_html.php"); //If not accessed correctly send back to signup form
    die();
}


