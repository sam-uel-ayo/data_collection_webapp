<?php
require_once '../Includes/config_session.php';
require_once '../Includes/databasehandler.php';


$username = $_GET['username'];

    function get_id(object $pdo, string $username)
    {
        $query = "SELECT id FROM login_details WHERE username = :username;"; // SQL query statement that would check the database and get all the details in that row-
        $stmt = $pdo-> prepare($query); // separating the data(user inputted username) from the query for security(SQL Injection)
        $stmt->bindParam(":username", $username); //Grab the username from the database and bind it to the username variable
        $stmt->execute(); //Execute query

        //To check if we actually grabed a data that's corresponds with the data(user inputted data)
        $result = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch only takes the first result from the data we grabbed and the FETCH_ASSOC makes the data an associative array; column
        return $result ? $result['id'] : null;  //Either we grab the already existing username or FALSE
    }
    //Grab the data from the database
    $userId = get_id($pdo, $username);



        try {
            require_once '../Includes/databasehandler.php';
            require_once '../Includes/config_session.php';
        
            $query = "SELECT * FROM student_data WHERE id = :userId;";
            $query1 = "SELECT * FROM parent_data WHERE id = :userId;";

            $stmt = $pdo->prepare($query);
            $stmt1 = $pdo->prepare($query1);

            $stmt->bindParam(":userId", $userId);
            $stmt1->bindParam(":userId", $userId);
            
            $stmt->execute();
            $stmt1->execute();
            
            $results1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $results2 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

            $pdo = null;
            $stmt = null;
            $stmt1 = null;
        } catch (PDOException $e) {
            die("Query Failed: " . $e->getMessage()); //If....
        }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheet/display.css">
    <title>Display Details</title>
</head>
<body>
    <div class="toptext">
        <h1>Your Details</h1>
    </div>
    <div class="wrapper">
        <div class="container">
        <?php

        if (empty($results1)) {
            echo "No results";
        } else {
            foreach ($results1 as $row) {
                ?>
                <div class="personalInfo">
                    <h2>Personal Information</h2>
                    <div class="variables">
                        <div class="input">
                            <p>First Name: <span><?php echo htmlspecialchars($row["FirstName"])?></span></p>
                        </div>
                        <div class="input">
                            <p>Surname: <span><?php echo htmlspecialchars($row["Surname"])?></span></p>
                        </div>
                        <div class="input">
                            <p>DOB: <span><?php echo htmlspecialchars($row["DateOfBirth"])?></span></p>
                        </div>
                        <div class="input">
                            <p>Nationality: <span><?php echo htmlspecialchars($row["Nationality"])?></span></p>
                        </div>
                        <div class="input">
                            <p>Religion: <span><?php echo htmlspecialchars($row["Religion"])?></span></p>
                        </div>
                        <div class="input">
                            <p>Phone Number: <span><?php echo htmlspecialchars($row["PhoneNumber"])?></span></p>
                        </div>
                        <div class="input">
                            <p>Email: <span><?php echo htmlspecialchars($row["Email"])?></span></p>
                        </div>              
                    </div>
                </div>
        
                <div class="academic">
                    <h2>Academic Information</h2>
                    <div class="variables">
                        <div class="input">
                            <p>Matric Number: <span><?php echo htmlspecialchars($row["MatricNumber"])?></span></p>
                        </div>
                        <div class="input">
                            <p>Department: <span><?php echo htmlspecialchars($row["Department"])?></span></p>
                        </div>
                        <div class="input">
                            <p>Current Level: <span><?php echo htmlspecialchars($row["CurrentLevel"])?></span></p>
                        </div>
                        <div class="input">
                            <p>Year of Entry: <span><?php echo htmlspecialchars($row["YearofEntry"])?></span></p>
                        </div>
                        <div class="input">
                            <p>Mode of Entry: <span><?php echo htmlspecialchars($row["ModeofEntry"])?></span></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
        <?php

        if (empty($results2)) {
            echo "No results";
        } else {
            foreach ($results2 as $row2) {
                ?>
                <div class="parent">
                    <h2>Parent/Guardian Information</h2>
                    <div class="variables">
                        <div class="input">
                            <p>Surname: <span><?php echo htmlspecialchars($row2["ParentSurname"])?></span></p>
                        </div>
                        <div class="input">
                            <p>First Name: <span><?php echo htmlspecialchars($row2["ParentFirstName"])?></span></p>
                        </div>
                        <div class="input">
                            <p>Other names: <span><?php echo htmlspecialchars($row2["OtherName"])?></span></p>
                        </div>
                        <div class="input">
                            <p>Phone Number: <span><?php echo htmlspecialchars($row2["ParentPhoneNumber"])?></span></p>
                        </div>
                        <div class="input">
                            <p>Email: <span><?php echo htmlspecialchars($row2["EmailAddress"])?></span></p>
                        </div>
                        <div class="input">
                            <p>Address: <span><?php echo htmlspecialchars($row2["Address"])?></span></p>
                        </div>
                    </div>        
                </div>
                <?php
            }
        }
        ?>
        </div>
        <div class="contact">
            <h2>Contact Us</h2>
            <div class="paragraph">
                <p>Should you have any issues with your details displayed and want to rectify it or you wish to update any of the information. <br>
                    Please visit the ICT building or your Faculty Officer's Office. <br>
                    For more information: see details below.</p>
                <div class="message">
                    <p><h4>Mail the ICT department</h4><a class="linkss" href="mailto:tunmise01babs@gmail.com">acuictdept@gmail.com</a></p>
                    <p><h4>Call the ICT department</h4><a href="tel:2349074536914">+2349074536914</a></p>
        
                    <p> <h4>Mail the FO Office</h4><a class="linkss" href="mailto:tunmise01babs@gmail.com">NSfacultyoffice@gmail.com</a></p>
                    <p> <h4>Call the FO Office</h4><a href="tel:2349074536914">+2349062534272</a></p>
                </div>
            </div>

            <div class="log-out">
                <a href="./login_html.php"><button> Log Out</button></a>
            </div>
        </div>
    </div>
    
</body>
</html>