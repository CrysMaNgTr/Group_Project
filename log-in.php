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
    $enteredUsername = $_POST["username"];
    $enteredPassword = $_POST["password"];

    // Query the database to check if the credentials are correct
    $sql = "SELECT * FROM `login-form` WHERE username='$enteredUsername' 
    AND password='$enteredPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Successful login - redirect to the user's profile page or dashboard
        // lead to intake page
        session_start();
        $_SESSION['logged_in'] = true;
        header("Location: mange-profile.php");
        exit();
    } else {
        // Invalid credentials - display an error message
        echo "Invalid username or password. Please try again.";
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

        <!--------------------- LOGIN FORM ------------------------------->
        <div id="wrp-content">
            <form action="log-in.php" id="form" method="POST">
                <h1 class="heading-form">Login</h1>
                    <div class="input-group">
                        <label for="username"><i class="far fa-user"></i></label>
                        <input type="text" id="input-form" name="username" required>
                    </div>
                    <div class="input-group">
                        <label for="password"><i class="fas fa-key"></i></label>
                        <input type="password" id="input-form" name="password" required>
                    </div>
                    <button class="submit-form" type="submit">Login</button>
                    <a href="sign-up.php" class="sign-up-link">Don't have an account? </a>   
            </form>        
        </div>
        
        <div id="footer">
            <div class="outer-footer">
                Copyright &copy; 2023 by Team U2. All Rights Reserved
            </div>
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