<?php
//ppt table update

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

$p_id = $_POST["p_id"];
$l_id = $_POST["l_id"];
$change_page = $_POST["page"];




if($my_db->query("UPDATE PPT SET slide_page = '" . $change_page . 
                     "' WHERE p_id = '" . $p_id . 
                     "' AND l_id = '" . $l_id . 
                     "'") != TRUE)
{
    echo "<br> update fail <br>";
}

$ppt_count;

$ppt_count_query = mysqli_query($my_db, "SELECT * FROM PPT WHERE l_id = '" . $l_id . "'");
mysql_num_fields($ppt_count);

if($ppt_count < $p_id)
{
    exit;
}
else
{
    if($my_db->query("UPDATE Lecture SET ppt_sequence = '" . $p_id . 
                     "' WHERE l_id = '" . $l_id . 
                     "'") != TRUE)
    {
    
        echo "<br> update fail <br>";
    }
}

?>