<?php
require_once '../Includes/signup_view.php'; //To print out any error that occured
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Bio Data</title>
    <link rel="stylesheet" href="../stylesheet/form.css">
</head>
<body>
    <?php
    check_signup_errors()
    ?>
    <div class="container">
        <header><h2>Students Biodata</h2></header>

        <form action="../Includes/formhandler.php" method="post">
            <div class="form-first">
                <div class="Student-details">
                    <h3 class="title">Students details</h3>
                    <div class="inputs">
                        <div class="input-fields">
                            <label for="">Matric Number</label>
                            <input type="text" name="MatricNumber" required placeholder="Matric Number">
                        </div>

                        <div class="input-fields">
                            <label for="">First Name</label>
                            <input type="text" name="FirstName" required placeholder="First name">
                        </div>

                        <div class="input-fields">
                            <label for="">Surname</label>
                            <input type="text" name="Surname" required placeholder="Surname">
                        </div>

                        <div class="input-fields">
                            <label for="">Date of birth</label>
                            <input type="date" name="DateOfBirth" required>
                        </div>

                        <div class="input-fields">
                            <label for="">Nationality</label>
                            <input type="text" name="Nationality" required>
                        </div>

                        <div class="input-fields">
                            <label for="">Religion</label>
                            <input type="text" name="Religion" required>
                        </div>

                        <div class="input-fields">
                            <label for="">Phone Number</label>
                            <input type="number" name="PhoneNumber" required placeholder="+234">
                        </div>

                        <div class="input-fields">
                            <label for="">Email</label>
                            <input type="email" name="Email" required>
                        </div>

                        <div class="input-fields">
                            <label for="">Department</label>
                            <input type="text" name="Department" required>
                        </div>

                        <div class="input-fields">
                            <label for="">Current level</label>
                            <input type="text" name="CurrentLevel" required>
                        </div>

                        <div class="input-fields">
                            <label for="">Year of entry</label>
                            <input type="date" name="YearofEntry" required>
                        </div>

                        <div class="input-fields">
                            <label for="">Mode of entry</label>
                            <input type="text" name="ModeofEntry" required>
                        </div>
                    </div>
                </div>


                <div class="Student-details">
                    <h3 class="title">Parent/Guardian Information</h3>
                    <div class="inputs">
                        <div class="input-fields">
                            <label for="">Surname</label>
                            <input type="text" name="ParentSurname" required placeholder="Surname">
                        </div>

                        <div class="input-fields">
                            <label for="">First Name</label>
                            <input type="text" name="ParentFirstName" required placeholder="First Name">
                        </div>

                        <div class="input-fields">
                            <label for="">Other names</label>
                            <input type="text" name="OtherName" required placeholder="Other Names">
                        </div>

                        <div class="input-fields">
                            <label for="">Phone number</label>
                            <input type="number" name="ParentPhoneNumber" required placeholder="+234">
                        </div>

                        <div class="input-fields">
                            <label for="">Email Address</label>
                            <input type="email" name="EmailAddress" required >
                        </div>

                        <div class="input-fields">
                            <label for="">Address</label>
                            <input type="text" name="Address" required>
                        </div>
                    </div>
                </div>
                <div class="btn-div">
                    <button class="btn" type="submit">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
