<!DOCTYPE html>

<html>
<head>
    <title>Upload</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    
    <span>
    
    <div style = 'margin :30px; max-width : 450px'>
    <div class = "panel panel-default">
    <div class = "panel-body">
    <h1>UPLOAD PAGE</h1>
    <form action = "../ad_upload.php" method = "post" enctype = "multipart/form-data">
        <input type = "hidden" name = "MAX_FILE_SIZE" value = "3000000"/>
        <input type = "hidden" name = "p_id[]" value = ""/>
        <input type = "hidden" name = "pass" value = "flag"/>

            <?php

            session_start();

            include("../DB/connect.php");
            if(($db_connect = connect()) == 0) 
            {
                echo "DB ERROR";
                exit;
            }

            $catch_l_id = $_GET["l_id"];

            $catch_lecture_data = mysqli_query($db_connect, "SELECT * FROM Lecture WHERE l_id = '" . $catch_l_id . "'");

            while($data = mysqli_fetch_array($catch_lecture_data)){
                echo "<h2>" . $data["l_name"] . "</h2>";
            }

            echo "<input type = 'hidden'' class = 'form-control' name = 'l_id' value = '" . $catch_l_id . "'/>";
            
            ?>
            <br>
            PATH : 
            <input type = "file" name = "userfile[]" multiple/>
            <br>
            <input type = "submit" class = 'btn btn-primary' value = "UPLOAD"/>
    </form>
    </div>
    </div>
        <p class = 'text-right'>
            <a href = './main_menu.php' class = 'btn btn-success'>BACK</a>
        </p>
    </div>
    </span>
</body>

</html>