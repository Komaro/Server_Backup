<?php

//ad_login.php

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
$catch_pass = $_POST["pass"];

$catch_user_data = mysqli_query($my_db, "SELECT * FROM User_table WHERE user_id = '" . $catch_id . "'");

while($data = mysqli_fetch_array($catch_user_data)){
    $receive_pass = $data['user_pass'];
}

if($catch_pass == $receive_pass && $catch_pass != "")
{
    echo "ok";
}
else
{
    echo "fail";
}

$catch_id = "000000000";
$catch_pass = "000000000";
$receive_pass = "0000000000";

?>