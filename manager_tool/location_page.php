<!DOCTYPE html>
<html>

<head>
    <title>Location</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <h1>Location</h1>
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

    $catch_lecture_data = mysqli_query($my_db, "SELECT * FROM Location");

    echo "<div style = 'overflow-y: scroll; width : 100%; height : 70%'>";
    
    echo "<table class = 'table' border = '1'><tr><th>Location ID</th><th>Name</th><th>Real Position</th></tr>";

    while($data = mysqli_fetch_array($catch_lecture_data)){
        echo "<tr><th>" . $data['loc_id'] . "</th><th>" . $data["loc_name"] . "</th><th>" . $data["loc_rposition"] . "</th></tr>";
    }

    echo "</table> </div>";

    echo "<span>";
    echo "<div style = 'margin :30px; max-width : 450px'>";
        echo "<div class = 'panel panel-default'><div class = 'panel-body'><form method = 'post' action = './location_tool/location_adder.php'>";
        echo "LOCATION NAME : <input type = 'text' class = 'form-control' name = 'name'> <br>";
        echo "LOCATION POSITION : &nbsp<input type = 'text' class = 'form-control' name = 'position'> <br>";
        echo "<input type = 'submit' class = 'btn btn-primary' value = 'CREATE'/>";
        echo "</form>";
        echo "</div>";
    
        echo "<div class = 'panel-body'>";
        echo "<form  method = 'post' action = './location_tool/location_remover.php'>";
        echo "LOCAITION ID : <input type = 'text' class = 'form-control' name = 'id'> <br>";
        echo "<input type = 'submit' class = 'btn btn-primary' value = 'REMOVE'/>";
        echo "</form>";
    echo"</div></div>";

        echo "<p class = 'text-right'><a href = './main_menu.php' class = 'btn btn-success'>BACK</a></p>";
    echo "</span>"
?>