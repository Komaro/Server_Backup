<!DOCTYPE html>
<html>

<head>
    <title>User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <h1>User</h1>
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

    $catch_lecture_data = mysqli_query($my_db, "SELECT * FROM User_table");

    echo "<div style = 'overflow-y: scroll; width : 100%; height : 70%'>";
    
    echo "<table class = 'table' border = '1'><tr><th>User ID</th><th>Name</th><th>User Pass</th></tr>";

    while($data = mysqli_fetch_array($catch_lecture_data)){
        echo "<tr><th>" . $data['user_id'] . "</th><th>" . $data["user_name"] . "</th><th>" . $data["user_pass"] . "</th><tr>";
    }

    echo "</table> </div>";

    echo "<span>";
    echo "<div style = 'margin :30px; max-width : 450px'>";
        echo "<div class = 'panel panel-default'><div class = 'panel-body'><form  method = 'post' action = './user_tool/user_adder.php'>";
        echo "USER ID : <input type = 'text' class = 'form-control' name = 'id'> <br>";
        echo "USER NAME : <input type = 'text' class = 'form-control' name = 'name'> <br>";
        echo "USER PASS : <input type = 'text' class = 'form-control' name = 'pass'> <br>";
        echo "<input type = 'submit' class = 'btn btn-primary' value = 'CREATE'/>";
        echo "</form>";
        echo "</div>";
    
        echo "<div class = 'panel-body'>";
        echo "<form  method = 'post' action = './user_tool/user_remover.php'>";
        echo "USER ID : <input type = 'text' class = 'form-control' name = 'id'> <br>";
        echo "<input type = 'submit' class = 'btn btn-primary' value = 'REMOVE'/>";
        echo "</form>";
    echo" </div>  </div>";

        echo "<p class = 'text-right'><a href = './main_menu.php' class = 'btn btn-success'>BACK</a></p>";
    echo "</span>";
?>