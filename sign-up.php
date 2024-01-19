<?php
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
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Insert data into the database
    $sql = "INSERT INTO `login-form` (username, email, password) 
    VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: log-in.php");
        exit();
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
        <!-- -------------------SIGN UP FORM ------------------------------------->
        <div id="wrp-content">
            <form action="sign-up.php" id="form" method="POST">
                <h1 class="heading-form">Sign Up</h1>
                <div class="input-group">
                    <label for="username"><i class="far fa-user"></i></label>
                    <input type="text" id="input-form" name="username" required>
                </div>
                <div class="input-group">
                    <label for="email"><i class="fa-solid fa-envelope"></i></label>
                    <input type="email" id="input-form" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password"><i class="fas fa-key"></label>
                    <input type="password" id="input-form" name="password" required>
                </div>
                    <button class="submit-form" type="submit">Sign Up</button>
            </form>
        </div>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
    $(document).ready(function(){
    $('.sub-menu').parent('li').addClass('has-child');
    });
    </script>
</body>
</html>
