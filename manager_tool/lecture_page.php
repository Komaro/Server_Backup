<!DOCTYPE html>
<html>

<head>
    <title>Lecture</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <h1>Lecture</h1>
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

    $catch_lecture_data = mysqli_query($my_db, "SELECT * FROM Lecture");

    echo "<div style = 'overflow-y: scroll; width : 100%; height : 70%'>";
    
    echo "<table class = 'table' border = '1'><tr><th>Lecture ID</th><th>Name</th><th>User</th><th>PPT Seq</th></tr>";

    while($data = mysqli_fetch_array($catch_lecture_data)){
        echo "<tr><th>" . $data['l_id'] . 
             "</th><th>" . $data["l_name"] . 
             "</th><th>" . $data["l_user"] . 
             "</th><th>" . $data["ppt_sequence"] .
             "</th></tr>";
    }

    echo "</table></div>";

    echo "<span>";
    echo "<div style = 'margin :30px; max-width : 450px'>";
        echo "<div class = 'panel panel-default'><div class = 'panel-body'><form method = 'post' action = './lecture_tool/lecture_adder.php'>";
        echo "LECTURE NAME : <input type = 'text' class = 'form-control' name = 'name'> <br>";
        echo "LECTURE USER : <input type = 'text' class = 'form-control' name = 'user'> <br>";
        echo "<input type = 'submit' class = 'btn btn-primary' value = 'CREATE'/>";
        echo "</form>";
        echo "</div>";
    
        echo "<div class = 'panel-body'>";
        echo "<form method = 'post' action = './lecture_tool/lecture_remover.php'>";
        echo "LECTURE ID : <input type = 'text' class = 'form-control' name = 'id'> <br>";
        echo "<input type = 'submit' class = 'btn btn-primary' value = 'REMOVE'/>";
        echo " </form>";
    echo "</div></div>";

        echo "<p class = 'text-right'><a href = './main_menu.php' class = 'btn btn-success'>BACK</a></p>";
    echo "</span>";

    
?>