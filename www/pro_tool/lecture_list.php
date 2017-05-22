<!DOCTYPE html>
<html>

<head>
    <title>Lecture List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <ul class="list-group">

        <?php

            session_start();

            include("../DB/connect.php");
            if(($db_connect = connect()) == 0) 
            {
                echo "DB ERROR";
                exit;
            }

            $mode = $_GET["mode"];

            if($mode == "roll")
            {
                $select_mode = "roll_page.php";
            }
            else if($mode == "ppt")
            {
                $select_mode = "ppt_page.php";
            }
            else
            {
                $select_mode = "upload_page.php";
            }

            $catch_user_id = $_SESSION["user_id"];

            $catch_list = mysqli_query($db_connect, "SELECT * FROM Lecture WHERE l_user = '" . $catch_user_id . "'");

            while($data = mysqli_fetch_array($catch_list))
            {
                echo "<li class = 'list-group-item'><a href = './" . $select_mode . "?l_id=" . $data["l_id"]."'>" . 
                     $data["l_name"] . "</a></li>";
            }

        ?>
        </ul>
        <br>

        <span>
        <p class = 'text-right'><a href = './main_menu.php' class = 'btn btn-success'>BACK</a></p>
    </span>
    </div>
    
</body>

</html>
