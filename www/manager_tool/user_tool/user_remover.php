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

    $catch_id = $_POST["id"];

    if($my_db->query("DELETE FROM User_table WHERE user_id = '" . $catch_id . "'") != TRUE)
    {
        echo "<br> add fail <br>";
    }

    ?>
        <script> document.location.href = '../user_page.php' </script>
    <?

?>