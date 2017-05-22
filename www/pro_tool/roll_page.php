<!DOCTYPE html>
<html>

<head>
    <title>Roll Book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <h1>Roll Book</h1>

    <div style = 'overflow-y: scroll; width : 100%; height : 70%'>
    
    <table class = 'table' border = '1'><tr><th>User ID</th><th>Name</th></tr>

    <?php

    session_start();

    include("../DB/connect.php");
    if(($db_connect = connect()) == 0) 
    {
         echo "DB ERROR";
         exit;
    }

    $catch_l_id = $_GET["l_id"];

    $catch_lecture_data = mysqli_query($db_connect, "SELECT * FROM Roll_Book WHERE l_id = '" . $catch_l_id . "'");

    while($data = mysqli_fetch_array($catch_lecture_data)){
        
        $catch_student = mysqli_query($db_connect, "SELECT * FROM User_table WHERE user_id = '" . $data["user_id"] . "'");
        
        while($student_data =   mysqli_fetch_array($catch_student))
        {
            echo "<tr><th>" . $student_data['user_id'] . "</th><th>" . $student_data["user_name"] . "</th><th>";
        }
    }

    ?>

    </table> </div>

    <span>
        <p class = 'text-right'><a href = './main_menu.php' class = 'btn btn-success'>BACK</a></p>
    </span>

</body>

</html>

