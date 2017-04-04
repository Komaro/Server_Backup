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
    $catch_user = $_POST["user"];

    if($my_db->query("INSERT INTO Lecture(l_name, ppt_sequence, l_user) VALUES('". $catch_name .
                         "', '1', '" . $catch_user . 
                         "')") != TRUE)
    {
        echo "<br> remove fail <br>";
    }

    ?>
        <script> document.location.href = '../lecture_page.php' </script>
    <?

?>