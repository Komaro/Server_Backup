<?php

include("./DB/connect.php");

if(($db_connect = connect()) == 0) 
{
    echo "DB ERROR";
    exit;
}

$student_id = $_POST["user_id"];


$sch_query = mysqli_query($db_connect, "SELECT * FROM S_schedule WHERE user_id = '" . $student_id . "'");

$catch_sch;

while($data = mysqli_fetch_array($sch_query)){
    $catch_sch = explode("┃", $data['user_sch']);
}

foreach($catch_sch as $select)
{
    $catch_query = mysqli_query($db_connect, "SELECT * FROM L_schedule WHERE l_id = '" . $select . "'");
    while($data = mysqli_fetch_array($catch_query))
    {
        echo $data['week'] . "∥" . 
             $data["s_time"] . "∥" . 
             $data["e_time"] . "∥" . 
             $data["l_id"] . "∥" . 
             $data["l_name"] . "∥" . 
             $data["loc_id"] ."┃";
    }
}


?>