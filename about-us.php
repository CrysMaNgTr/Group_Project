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
        <div id="big_content">
            <h1 class="big_title"><strong> Welcome to Fittrac</strong></h1>
            <p class="text">Your one-stop shop for individualized management of your fitness and health. 
                <br> Through our extensive website, 
                we hope to enable people of all ages <br> to take charge of their own well-being.</p>
            <p class="text"> Our user-friendly platform at Fitrac makes it easier 
                <br> to track macronutrients (carbs, fats, and proteins), 
                <br>manage daily calorie intake, and set and meet fitness goals. 
                <br>We can help you regardless of where you are in your wellness journey 
                <br>or whether you're a fitness enthusiast trying 
                <br> to get the most out of your diet and exercise routine.
            </p>

            <h2 class="small_title">Important characteristics</h2>
            <p class="main_content"><strong>Nutritional Tracking:</strong> 
            Easily and precisely keep an eye on your daily intake of calories and macronutrients.</p>
            <p class="main_content"><strong>Personalized Exercise Advice:</strong>
            Get personalized exercise advice based on your desired level of fitness.</p>
            <p class="main_content"><strong>Fitness Goal Setting:</strong>
            Set and monitor your fitness goals to help you stay motivated 
            <br> as you transition to a healthier way of living.</p>
            <p class="main_content"><strong>Comprehensive Nutrition Information:</strong>
            Make educated dietary decisions <br> by accessing an extensive database 
            of nutritional information for thousands of food products.</p>
            <p class="main_content"><strong>Seamless Data Integration:</strong>
            We incorporate the most recent dietary data from the FatSecret API with ease.</p>
            <p class="main_content"><strong>Safe and Trustworthy:</strong>
            You can be sure that your data is safe with us.
            <br> We use [Your Data Storage Solution],
            which is hosted on a safe <br> and expandable cloud infrastructure (your cloud server),
            <br> to guarantee real-time data forwarding and document preservation.</p>
            <p class="text">Come along with us on this journey to better health. 
            <br> Together, let's enhance wellbeing, reach our fitness objectives,
            <br>and make well-informed decisions. Begin utilizing Fitrac right now!"</p>
        </div>
        <!-- --------------------FOOTER------------------- -->
        <div id="footer">
            <div class="outer-footer">
                Copyright &copy; 2023 by Team U2. All Rights Reserved
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
    $(document).ready(function(){
       $('.sub-menu').parent('li').addClass(has-child);
    });
    </script>
</body>
</html>