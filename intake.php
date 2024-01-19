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

      <!--------------------- TABLE FORM ------------------------------->
      
      <div class="table-container">
        <h1 class="heading-form">Nutritional Intake Tracker</h1>

        <form id="intake-form">
          <table id="intake-table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Kcal</th>
                <th>Protein (g)</th>
                <th>Fat (g)</th>
                <th>Carbohydrates (g)</th>
              </tr>
            </thead>
            <tbody>
              <tr class="intake-row">
                <td><input type="text" name="name" class="name-input" /></td>
                <td><input type="number" name="kcal" class="kcal-input" /></td>
                <td>
                  <input type="number" name="protein" class="protein-input" />
                </td>
                <td><input type="number" name="fat" class="fat-input" /></td>
                <td><input type="number" name="carbs" class="carbs-input" /></td>
              </tr>
            </tbody>
          </table>
          <button type="submit">Send</button>
        </form>
        <button id="add-row-button">Add Intake</button>
        <button id="delete-row-button">Delete Intake</button>  
      </div>

      
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
      $(document).ready(function () {
      // Declare total variables globally
      var totalKcal = 0;
      var totalProtein = 0;
      var totalFat = 0;
      var totalCarbs = 0;

      $(".sub-menu").parent("li").addClass("has-child");

      // Add Intake Row
      $("#add-row-button").click(function () {
        var newRow =
          '<tr class="intake-row">' +
          '<td><input type="text" name="name" class="name-input"></td>' +
          '<td><input type="number" name="kcal" class="kcal-input"></td>' +
          '<td><input type="number" name="protein" class="protein-input"></td>' +
          '<td><input type="number" name="fat" class="fat-input"></td>' +
          '<td><input type="number" name="carbs" class="carbs-input"></td>' +
          "</tr>";
        $("#intake-table tbody").append(newRow);

        // Bind the change event to recalculate totals when input changes
        $(".intake-row:last input").change(function () {
          calculateTotal();
        });
      });

      // Delete Last Row
      $("#delete-row-button").click(function () {
        var rowCount = $("#intake-table tbody tr").length;
        if (rowCount > 1) {
          $("#intake-table tbody tr:last").remove();
          calculateTotal();
        }
      });

      // Calculate Total
      function calculateTotal() {
        totalKcal = 0;
        totalProtein = 0;
        totalFat = 0;
        totalCarbs = 0;

        $(".intake-row").each(function () {
          var kcal = parseFloat($(this).find(".kcal-input").val()) || 0;
          var protein = parseFloat($(this).find(".protein-input").val()) || 0;
          var fat = parseFloat($(this).find(".fat-input").val()) || 0;
          var carbs = parseFloat($(this).find(".carbs-input").val()) || 0;

          totalKcal += kcal;
          totalProtein += protein;
          totalFat += fat;
          totalCarbs += carbs;
        });

        // Create a new row for the overall total
        var totalRow =
          '<tr class="total-row">' +
          "<td>Total</td>" +
          "<td>" +
          totalKcal +
          "</td>" +
          "<td>" +
          totalProtein +
          "</td>" +
          "<td>" +
          totalFat +
          "</td>" +
          "<td>" +
          totalCarbs +
          "</td>" +
          "</tr>";

        // Remove any existing total row before appending the new one
        $("#intake-table tbody .total-row").remove();
        $("#intake-table tbody").append(totalRow);
      }

      // Submit form
      $("#intake-form").submit(function (event) {
        // Prevent the default form submission
        event.preventDefault();

        const postData = {
          totalKcal,
          totalProtein,
          totalFat,
          totalCarbs,
        };
      

        // Fetch data to the server
        fetch("intake-form.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(postData),
        })
          .then(response => response.text())
          .then(data => console.log(data))
          .catch(error => console.error(`Error: ${error.message}`));
      });

      // Calculate Total initially
      calculateTotal();
    });

    </script>
  </body>
</html>
