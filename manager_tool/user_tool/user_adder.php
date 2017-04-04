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
    $catch_name = $_POST["name"];
    $catch_pass = $_POST["pass"];

    if($my_db->query("INSERT INTO User_table(user_id, user_name, user_pass) VALUES('". $catch_id .
                         "', '" . $catch_name . 
                         "', '" . $catch_pass .
                         "')") != TRUE)
    {
        echo "<br> add fail <br>";
    }

    ?>
        <script> document.location.href = '../user_page.php' </script>
    <?

?>