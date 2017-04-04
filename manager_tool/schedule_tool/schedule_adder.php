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

    $catch_loc_id = $_POST["loc_id"];
    $catch_l_id = $_POST["l_id"];
    $catch_week = $_POST["week"];
    $catch_s_time = $_POST["s_time"];
    $catch_e_time = $_POST["e_time"];
    $catch_user_id = $_POST["user_id"];
    $catch_l_name = $_POST["l_name"];

    if($my_db->query("INSERT INTO L_schedule VALUES('". $catch_loc_id .
                         "', '" . $catch_l_id . 
                         "', '" . $catch_week .
                         "', '" . $catch_s_time .
                         "', '" . $catch_e_time .
                         "', '" . $catch_user_id .
                         "', '" . $catch_l_name .
                         "')") != TRUE)
    {
        echo "<br> add fail <br>";
    }

    ?>
        <script> document.location.href = '../schedule_page.php' </script>
    <?

?>