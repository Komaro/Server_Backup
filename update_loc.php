<?php
//rposition update

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
$loc_rposition = $_POST["ip_addr"];

$loc_query = mysqli_query($my_db, "SELECT * FROM L_schedule WHERE l_id = '" . $l_id . "'");

$catch_loc = mysqli_fetch_array($loc_query);

if($my_db->query("UPDATE Location SET loc_rposition = '" . $loc_rposition . 
                 "' WHERE loc_id = '" . $catch_loc['loc_id'] . "'") != TRUE)
{
    echo "<br> update fail <br>";
}

?>