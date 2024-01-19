<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "fitrac";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['userMessage'])) {
        $userMessage = $_POST['userMessage']; 

        $sql = "INSERT INTO messages (userMessage) VALUES ('$userMessage')";
        if ($conn->query($sql) === TRUE) {
            echo "Message submitted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
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
<!-- --------------------------------------------CONTENT---------------- -->
        <div id="big_content">
            <h1 class="big_title"><strong> Welcome to Fitrac</strong></h1>
            <p class="text">
                Please log in or sign up to contact us
            </p>

            <h2 class="small_title">Contact Us</h2>
            <p class="main_content">
            Name: Fitrac <br>
            Email: NewYou@Fitrac.com <br>
            Phone: 123-456-7890 <br>
            Fax: 098-765-43 <br>
            Address: Fitrac Lane, Fitractown, GA, 303331
            </p>
            <form action="contact-us.php" class="contact" method="POST">
                <label for="userMessage">Message</label>
                <textarea id="userMessage" name="userMessage" placeholder="Please type your message here"></textarea>
                <br>
                <button class="contact-btn" type="submit">Send</button>
            </form>      

        </div>
<!-- --------------------------FOOTER---------------------------------------------- -->
        <br><br><br><br><br>
            <div id="footer">
            <div class="outer-footer">
                Copyright &copy; 2023 by Team U2. All Rights Reserved
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</body>
</html>