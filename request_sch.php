<?php

// week  s_time  e_time  l_id

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

$user_id = $_POST["user_id"];

$sch_query = mysqli_query($my_db, "SELECT * FROM L_schedule WHERE user_id = '" . $user_id . "'");

while($data = mysqli_fetch_array($sch_query)){
 echo $data['week'] . "∥" . $data["s_time"] . "∥" . $data["e_time"] . "∥" . $data["l_id"] . "∥" . $data["l_name"] . "┃";
}

?>
