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

$l_id = $_POST["l_id"];

$rs = mysqli_query($my_db, "SELECT * FROM PPT WHERE l_id = '" . $l_id . "'");
while($data = mysqli_fetch_array($rs)){
    
    $catch_name_query = mysqli_query($my_db, "SELECT l_name, ppt_sequence FROM Lecture WHERE l_id = '" . $l_id . "'");    
    $l_name = mysqli_fetch_array($catch_name_query);

    echo $data['l_id'] . "∥" .
         $l_name["l_name"] . "∥" .
         $data["p_id"] . "∥" . 
         $data["p_name"] . "∥" . 
         $data["url"] . "∥" . 
         $data["slide_page"] . "∥" . 
         $l_name["ppt_sequence"] .
         "┃";
}

?>
