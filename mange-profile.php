<?php
// restrict access when user see this page
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
  session_destroy();
  // lead to login page
  header("Location: log-in.php");
  exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "fitrac";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $gender = $_POST['gender'];

    // Insert data into the "profile" table
    $sql = "INSERT INTO profile (first_name, last_name, age, height, weight, gender) 
            VALUES ('$first_name', '$last_name', '$age', '$height', '$weight', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "Data saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Team U2</title>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <nav class="container">
                <a id="logo">FITTRAC</a>
                <ul id="main-menu">
                    <li><a href="index.php"><i class="fa-solid fa-house"></i></a>
                        <ul class="sub-menu">
                            <li><a href="/HTML-PHP/about-us.php">About us</a></li>
                            <li><a href="/HTML-PHP/contact-us.php">Contact us</a></li>   
                        </ul>
                    </li>
                    <li><a href="#">Exercise Recommendation</a>
                        <ul class="sub-menu">
                            <li><a href="/HTML-PHP/arm.php">Arms</a></li>
                            <li><a href="/HTML-PHP/chest.php">Chest</a></li>
                            <li><a href="/HTML-PHP/shoulder.php">Shoulders</a></li>
                            <li><a href="/HTML-PHP/back.php">Back</a></li>
                            <li><a href="/HTML-PHP/legs.php">Legs</a></li>				   
                            <li><a href="/HTML-PHP/abs.php">Abs</a></li>				   
                        </ul>
                    </li>
                    <li><a href="/HTML-PHP/breakdown.php">Breakdown</a></li>
                    <li><a href="">Tracking</a>
                        <ul class="sub-menu">
                            <li><a href="/HTML-PHP/intake.php">Intake</a></li>
                            <li><a href="/HTML-PHP/exercise.php">Daily Exercise</a></li>   				   
                        </ul>
                    </li>         
                    <li><a href=""><i class="fa-solid fa-user"></i></a>
                        <ul class="sub-menu">
                            <li><a href="/HTML-PHP/log-in.php">Login</a></li>
                            <li><a href="/HTML-PHP/sign-up.php">Sign up</a></li>
                            <li><a href="/HTML-PHP/mange-profile.php">Manage Profile</a></li>
                            <li><a href="/HTML-PHP/logout.php">Logout</a></li>			   
                        </ul>	
                    </li>
                </ul>
            </nav>
        </div>

        <!-- ------------------- MANAGE PROFILE ------------------------------------->
        <div id="wrp-content">
            <form action="mange-profile.php" id="form" method="POST">
                <h1 class="heading-form">Profile</h1>
                <div class="input-group">
                    <label for="firstname">First Name</label>
                    <input type="text" id="input-form" name="firstname" required>
                </div>
                <div class="input-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="input-form" name="lastname" required>
                </div>
                <div class="input-group">
                    <label for="age">Age</label>
                    <input type="number" id="input-form" name="age" required>
                </div>
                <div class="input-group">
                    <label for="height">Height</label>
                    <input type="number" id="input-form" name="height" required>
                </div>
                <div class="input-group">
                    <label for="weight">Weight</label>
                    <input type="number" id="input-form" name="weight" required>
                </div>
                <div class="input-group">
                    <label for="gender">Sex</label>
                    <select id="gender" name="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Internsex">Intersex</option>
                    </select>
                </div>
                    <button class="submit-form" type="submit" >Save</button>
                    <p class="note">Please note that your information will be sent to a personal 
                        <br>trainer for the most personalized and customized experience.</p>
                    <p class="note">Your personal trainer will contact you and ask you <br>for your goals 
                        and your new journey will start from there.</p>
            </form>
            
            <!-- <div class="success-message">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($first_name)) {
                    echo "Data saved successfully";
                }
                ?>
            </div>         -->
        </div>
                
        <div id="footer">
            <div class="outer-footer">
                Copyright &copy; 2023 by Team U2. All Rights Reserved
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    
</body>
</html>
