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

$late = "";

$l_id = $_POST["l_id"];
$check_date = $_POST["check_date"];
$user_id = $_POST["user_id"];
$nfc_code = $_POST["nfc_code"];
$phone_number = $_POST["phone_number"];
$late = $_POST["late"];

if($my_db->query("INSERT INTO Roll_Book_Check() VALUES('" . $l_id .
                 "','" . $check_date . 
                 "','" . $user_id . 
                 "','" . $nfc_code.
                 "','" . $phone_number.
                 "','" . $late.  
                 "')") != TRUE)
{
    echo "fail";
}
else
{
    echo "ok";
}
?>