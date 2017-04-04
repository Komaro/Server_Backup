<!DOCTYPE html>
<html>

<head>
    <title>Schedule</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <h1>Schedule</h1>
</body>

</html>

<?php

    $host = "localhost";
    $user = "creater";
    $pw = "creater";
    $db = "NLSS";

    $my_db = new mysqli($host,$user,$pw,$db);

    mysqli_query($my_db,"set names utf8");

    if ( mysqli_connect_errno() ) {
    echo mysqli_connect_error();
    exit;
    }

    $catch_lecture_data = mysqli_query($my_db, "SELECT * FROM L_schedule");

    echo "<div style = 'overflow-y: scroll; width : 100%; height : 70%'>";
    
    echo "<table class = 'table' border = '1'><tr><th>Location ID</th><th>Lecture ID</th><th>Week</th><th>Start Time</th><th>End Time</th><th>User ID</th><th>Lecture_Name</th></tr>";

    while($data = mysqli_fetch_array($catch_lecture_data)){
        echo "<tr><th>" . $data['loc_id'] . 
             "</th><th>" . $data["l_id"] .
              "</th><th>" . $data["week"] . 
              "</th><th>" . $data["s_time"] .
              "</th><th>" . $data["e_time"] .
              "</th><th>" . $data["user_id"] .
              "</th><th>" . $data["l_name"] .
              "</th><tr>";
    }

    echo "</table></div>";

    echo "<span>";
    echo "<div style = 'margin :30px; max-width : 450px'>";
        echo "<div class = 'panel panel-default row'><div class = 'panel-body col-sm-6'><form  method = 'post' action = './schedule_tool/schedule_adder.php'>";
        echo "LOCATION ID : <input type = 'text' class = 'form-control' name = 'loc_id'> <br>";
        echo "LECTURE ID : <input type = 'text' class = 'form-control' name = 'l_id'> <br>";
        echo "WEEK : <input type = 'text' class = 'form-control' name = 'week'> <br>";
        echo "START TIME : <input type = 'text' class = 'form-control' name = 's_time'> <br>";
        echo "END TIME : <input type = 'text' class = 'form-control' name = 'e_time'> <br>";
        echo "USER ID : <input type = 'text' class = 'form-control' name = 'user_id'> <br>";
        echo "LECTURE NAME : <input type = 'text' class = 'form-control' name = 'l_name'> <br>";
        echo "<input type = 'submit' class = 'btn btn-primary' value = 'CREATE'/>";
        echo "</form>";
        echo "</div>";
        
        echo "<div class = 'panel-body col-sm-6'>";
        echo "<form  method = 'post' action = './schedule_tool/schedule_remover.php'>";
        echo "LECTURE ID :<input type = 'text' class = 'form-control' name = 'l_id'> <br>";
        echo "WEEK : <input type = 'text' class = 'form-control' name = 'week'> <br>";
        echo "<input type = 'submit' class = 'btn btn-primary' value = 'REMOVE'/>";
        echo "</form>";
    echo "</div></div>";

        echo "<p class = 'text-right'><a href = './main_menu.php' class = 'btn btn-success'>BACK</a></p>";
    echo "</span>";
?>