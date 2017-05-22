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

    $catch_l_id = $_GET["l_id"];

    $catch_lecture_data = mysqli_query($my_db, "SELECT * FROM PPT WHERE l_id = '" . $catch_l_id . "'");

    echo "<div style = 'overflow-y : scroll; width : 100%; height : 70%'>";
    
    echo "<table class = 'table' border = '1'><tr><th>Project ID</th><th>Lecture ID</th><th>Project Name</th><th>Slide Page</th></tr>";

    while($data = mysqli_fetch_array($catch_lecture_data)){
        echo "<tr><th>" . $data['p_id'] . 
             "</th><th>" . $data["l_id"] . 
             "</th><th>" . $data["p_name"] .
             "</th><th>" . $data["slide_page"] . 
             "</th></tr>";
    }

    echo "</table> </div>";
    
    echo "<span>";
        echo "<p class = 'text-right'><a href = './main_menu.php' class = 'btn btn-success'>BACK</a></p>";
    echo "</div>";
    echo "</span>";
?>