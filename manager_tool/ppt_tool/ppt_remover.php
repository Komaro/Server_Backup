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

    $catch_p_id = $_POST["p_id"];
    $catch_l_id = $_POST["l_id"];

    if($my_db->query("DELETE FROM PPT WHERE p_id = '" . $catch_p_id .
                     "' AND l_id = '" . $catch_l_id . 
                     "'") != TRUE)
    {
        echo "<br> add fail <br>";
    }

    ?>
        <script> document.location.href = '../ppt_page.php' </script>
    <?

?>