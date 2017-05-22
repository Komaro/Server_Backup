<!DOCTYPE html>
<html>

<head>
    <title>PPT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <h1>PPT</h1>
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

    $catch_lecture_data = mysqli_query($my_db, "SELECT * FROM PPT");

    echo "<div style = 'overflow-y : scroll; width : 100%; height : 70%'>";
    
    echo "<table class = 'table' border = '1'><tr><th>Project ID</th><th>Lecture ID</th><th>Project Name</th><th>URL</th><th>Slide Page</th></tr>";

    while($data = mysqli_fetch_array($catch_lecture_data)){
        echo "<tr><th>" . $data['p_id'] . 
             "</th><th>" . $data["l_id"] . 
             "</th><th>" . $data["p_name"] . 
             "</th><th>" . $data["url"] .
             "</th><th>" . $data["slide_page"] . 
             "</th></tr>";
    }

    echo "</table> </div>";
    
    echo "<span>";
    echo "<div style = 'margin :30px; max-width : 450px'>";
        echo "<div class = 'panel panel-default'><div class = 'panel-body'><form ' method = 'post' action = './ppt_tool/ppt_remover.php'>";
        echo "PROJECT ID : <input type = 'text' class = 'form-control' name = 'p_id'> <br>";
        echo "LECTURE ID : <input type = 'text' class = 'form-control' name = 'l_id'> <br>";
        echo "<input type = 'submit' class = 'btn btn-primary' value = 'REMOVE'/>";
        echo "</form>" ;
    echo "</div></div>";

        echo "<p class = 'text-right'><a href = './main_menu.php' class = 'btn btn-success'>BACK</a></p>";
    echo "</div>";
    echo "</span>";
?>