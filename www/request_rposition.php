<?php
//request rposition

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

$loc_query = mysqli_query($my_db, "SELECT * FROM L_schedule WHERE l_id = '" . $l_id . "'");
$catch_loc = mysqli_fetch_array($loc_query);

$addr_query = mysqli_query($my_db, "SELECT * FROM Location WHERE loc_id = '" . $catch_loc['loc_id'] . "'");

while($catch_rposition = mysqli_fetch_array($addr_query))
{
    if($catch_rposition['loc_rposition'] != NULL)
    {
        echo $catch_rposition['loc_rposition'];
    }
    else
    {
        echo "NULL";
    }    
}

?>