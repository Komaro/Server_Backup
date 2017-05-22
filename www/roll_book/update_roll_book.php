<?php

include("../DB/connect.php");

if(($db_connect = connect()) == 0) 
{
    echo "DB ERROR";
    exit;
}

$catch_l_id = $_POST['l_id'];
$catch_user_name = $_POST['user_name'];

if($db_connect->query("INSERT INTO Roll_Book() VALUES('" . $catch_l_id . 
                      "', '" . $catch_user_name . 
                      "')") != TRUE)
{
    echo "fail";
}

?>