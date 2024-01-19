<?php
// restrict access when user see this page
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
  session_destroy();
  // lead to login page
  header("Location: log-in.php");
  exit();
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Team U2</title>
</head>
<body>
<div id="wrapper">
      <div id="header">
        <nav class="container">
          <a href="#" id="logo">FITTRAC</a>
          <ul id="main-menu">
            <li>
              <a href="index.php"
                ><i class="fa-solid fa-house"></i
              ></a>
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
            <li>
              <a href="">Tracking</a>
              <ul class="sub-menu">
                <li><a href="/HTML-PHP/intake.php">Intake</a></li>
                <li><a href="/HTML-PHP/exercise.php">Daily Exercise</a></li>
              </ul>
            </li>
            <li>
              <a href=""><i class="fa-solid fa-user"></i></a>
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
      <!-- ------------------------------------------------------ -->

      <div id="big_content">
            <h1 class="big_title"><strong> Calorie Recommendation</strong></h1>
            <p class="small_text">The following is a general calculation for the calories 
              required to maintain your current bodyweight. <br>
              Depending on your goal, you should raise or lower this number 
              by increasing or reducing your daily carb intake. <br>
              Dropping or adding 100 kcal in carbs in your daily intake 
              will lead to a gain or loss of 1lb every 10-14 days. <br>
              Once this weight plateaus, add or drop another 100, 
              and continue this pattern onward alongside your exercise routines.
            </p>
        </div>
        <!-- --------------------------------------------------------- -->
        <div id="wrp-content">
            <div class="container">
                <div class="left-data">
                    <div class="row">
                    
                        <div class="col-md-6">
                            <h5 class="measurement">Weight (Lb)</h5>
                            <input type="text" id="we">
                            
                            <h5 class="measurement">Height (In)</h5>
                            <input type="text" id="hi">
                            
                            <h5 class="measurement">Age</h5>
                            <input type="text" id="age">

                            <p id="resultcal"></p>
                            
                            <button class="btn-primary" onclick="Calo()">Calculate</button>
                            <button class="btn-danger" onclick="Clear()">Clear</button>
                        </div>

                        <div class="col-md-6">
                            <div class="pie-chart">
                                <h1>Personalized Chart</h1>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>               
            </div> 
      </div>  
        <!-- ---------------------------------------------------- -->
        <div id="footer">
            <div class="outer-footer">
                Copyright &copy; 2023 by Team U2. All Rights Reserved
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
   
    <script>
    function Calo() {
    var h = parseFloat(document.getElementById('hi').value);
    var w = parseFloat(document.getElementById('we').value);
    var age = parseFloat(document.getElementById('age').value);

    var calo = (10 * w + 6.25 * h - 5 * age + 5);
    var calom = calo * 1.4;

    document.getElementById('resultcal').innerHTML = "Your Daily Recommended Calories Intake: " + calom;

    const proteins = calom * 0.12;
    const carbs = calom * 0.60;
    const fats = calom * 0.27;

    let data2 = [proteins, fats, carbs];
    const ctx = document.getElementById('myChart').getContext('2d');
    let myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Proteins', 'Fats', 'Carbs'],
            datasets: [{
                label: 'kcal',
                data: data2,
                backgroundColor: ['#2ae3ce', '#dd3b79', '#ff766b'], 
                borderWidth: 1 
            }]
        }
    });
}
    function Clear()
    {
        document.getElementById('resultcal').innerHTML="";
    }
    </script>
</body>
</html>