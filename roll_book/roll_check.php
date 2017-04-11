<?php

//roll_check.php

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

$l_id = $_POST["l_id"];
$check_date = $_POST["check_date"];
$user_id = $_POST["user_id"];
$nfc_code = $_POST["nfc_code"];

if($my_db->query("INSERT INTO Roll_Book_Check() VALUES('" . $l_id .
                 "','" . $check_date . 
                 "','" . $user_id . 
                 "','" . $nfc_code. 
                 "')") != TRUE)
{
    echo "fail";
}
else
{
    echo "ok";
}
?>