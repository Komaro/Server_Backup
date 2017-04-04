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

    $catch_l_id = $_POST["l_id"];
    $catch_week = $_POST["week"];

    if($my_db->query("DELETE FROM L_schedule WHERE l_id = '" . $catch_l_id . 
                     "' AND week = '" . $catch_week . 
                     "'") != TRUE)
    {
        echo "<br> remove fail <br>";
    }

    ?>
        <script> document.location.href = '../schedule_page.php' </script>
    <?

?>