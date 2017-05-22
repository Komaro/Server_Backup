<?php

    if(!isset($_POST[id]) || !isset($_POST[pass]))
    {
        ?>
        <script> document.location.href = 'manager_login.php' </script>
        <?php
    }

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

    $catch_id = $_POST["id"];
    $catch_pass = $_POST["pass"];

    $catch_manager_data = mysqli_query($my_db, "SELECT * FROM User_table WHERE user_id = '" . $catch_id . "'");
    $catch_data = mysqli_fetch_array($catch_manager_data);

    $check_id = $catch_data["user_id"];
    $check_pass = $catch_data["user_pass"];
    $check_pro = $catch_data["user_type"];

    if($check_id == $catch_id && $check_pass == $catch_pass && $check_pro == "P")
    {
        session_start();
        $_SESSION['user_id'] = $check_id;
    }
    else{
        ?>
        <script> document.location.href = 'pro_login.php' </script>
        <?php
    }

    ?>
    <script> document.location.href = 'main_menu.php' </script>
    <?php
?>