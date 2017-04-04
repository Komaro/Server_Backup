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

$rs = mysqli_query($my_db, "SELECT * FROM Location");
while($data = mysqli_fetch_array($rs)){
 echo $data['loc_id'] . " - " . $data["loc_name"] . " - " . $data["loc_rposition"] . "<br>";
}

?>