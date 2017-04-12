<?php

include("../DB/connect.php");

$db_connect = connect();

$catch_nfc = $_POST["nfc_code"];

if($db_connect->query("INSERT INTO Nfc_code VALUES('" . $catch_nfc
                    . "')") != TRUE)
{
    echo "fail";
}
?>