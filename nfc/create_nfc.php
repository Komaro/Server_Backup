<?php

include("../DB/connect.php");

if(($db_connect = connect()) == 0) 
{
    echo "DB ERROR";
    exit;
}

$catch_nfc = $_POST["nfc_code"];

echo $catch_nfc;

if($db_connect->query("INSERT INTO Nfc_Code() VALUES('" . $catch_nfc
                    . "')") != TRUE)
{
    echo "fail";
}

?>