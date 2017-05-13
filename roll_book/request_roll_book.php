<?php

//request_rool_book.php

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

$catch_user_id = $_POST['user_id'];
$catch_l_id = $_POST["l_id"];
$catch_start_date = $_POST["start_date"];
$catch_end_date = $_POST["end_date"];

if($catch_user_id != "")
{

    $catch_query = mysqli_query($my_db, "SELECT * FROM Lecture WHERE l_user = '" . $catch_user_id . "'");
    $catch_lecture = mysqli_fetch_array($catch_query);

    if($catch_lecture['l_id'])
    {
        echo $catch_lecture['l_id'] . "∥" . $catch_lecture['l_name'];

        while($catch_lecture = mysqli_fetch_array($catch_query))
        {   
            if($catch_lecture['l_id'] != NULL)
            {
                echo "┃" . $catch_lecture['l_id'] . "∥" . $catch_lecture['l_name'];
            }
        }
    }
    else
    {
        echo "fail";
        return;
    }

    return;
}


$catch_roll_book = mysqli_query($my_db, "SELECT user_name, a_id AS user_id, b_id AS roll_check, nfc_code, check_date, late
                                         FROM User_table
                                         RIGHT OUTER JOIN (
                                            SELECT A.user_id AS a_id, B.user_id AS b_id, B.nfc_code, B.check_date, B.late
                                            FROM (SELECT *
                                                  FROM Roll_Book
                                                  WHERE l_id = '" . $catch_l_id . "') AS A
                                                  LEFT OUTER JOIN (SELECT *
                                                                   FROM Roll_Book_Check
                                                                   WHERE l_id = '" . $catch_l_id . "') AS B
				                                  ON A.l_id = '" . $catch_l_id . 
                                                  "' AND B.l_id = A.l_id AND B.check_date >= '" . $catch_start_date . 
                                                  "' AND B.check_date <= '" . $catch_end_date .
                                                  "' AND A.user_id = B.user_id
				                                  ) AS Te
                                         ON User_table.user_id = Te.a_id");

$send_roll_book;


while($data = mysqli_fetch_array($catch_roll_book)){

    $send_roll_book .= $data['check_date'] . "∥" . 
                       $data['user_name'] . "∥" . 
                       $data['user_id']. "∥" . 
                       $data['nfc_code'] . "∥";
                       
    if($data['roll_check'] == "")
    {
        $send_roll_book .= "M";
    }
    else if($data['late'] == "L")
    {
        $send_roll_book .="L";
    }
    else
    {
        $send_roll_book .= "R";
    }

    $send_roll_book .= "┃";
}

echo $send_roll_book;

?>