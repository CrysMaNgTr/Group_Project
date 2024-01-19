<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SERVER["REQUEST_METHOD"] != "POST") {
    // If not logged in or not a POST request, redirect to the login page
    header("Location: log-in.php");
    exit();
}

// ----connect database----
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
    $data = file_get_contents("php://input");
    $postData = json_decode($data, true);

    $totalReps = $postData["totalReps"];
    

    // Insert total values into the database
    $sql = "INSERT INTO workout_data (reps) 
            VALUES ('$totalReps')";

    if ($conn->query($sql) === TRUE) {
        echo "Data saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
