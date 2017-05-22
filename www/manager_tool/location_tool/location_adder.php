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

    $catch_name = $_POST["name"];
    $catch_position = $_POST["position"];

    if($my_db->query("INSERT INTO Location(loc_name, loc_rposition) VALUES('". $catch_name .
                         "', '" . $catch_position . 
                         "')") != TRUE)
    {
        echo "<br> add fail <br>";
    }

    ?>
        <script> document.location.href = '../location_page.php' </script>
    <?

?>