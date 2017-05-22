<!DOCTYPE html>
<html>

<head>
    <title>Main Menu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <ul class="list-group">
            <li class = "list-group-item"><a href = "./lecture_page.php">Lecture</a></li>
            <li class = "list-group-item"><a href = "./location_page.php">Location</a></li>
            <li class = "list-group-item"><a href = "./user_page.php">User</a></li>
            <li class = "list-group-item"><a href = "./schedule_page.php">Schedule</a></li>
            <li class = "list-group-item"><a href = "./ppt_page.php">PPT</a></li>
            <li class = "list-group-item"><a href = "./upload_page.php">Upload</a></li>
        </ul>
        <br>
        <a class = "btn btn-danger" href = "logout_pass.php">Log Out</button>
    </divv>
</body>

</html>

<?php
    session_start();
    if(!isset($_SESSION["manager_id"]))
    {
        ?>
        <script> document.location.href = 'manager_login.php' </script>
        <?php
    }
?>