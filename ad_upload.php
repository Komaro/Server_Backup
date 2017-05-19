<?php

//debug_command
//print_r($_FILES);
//ini_set("display_errors", "1");

//MAX_FILE_SIZE - 30000000
//userfile[] multiple
//pc_request_sch.php

//db_connect

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

//echo "<pre>";
//echo "temp:".$_FILES["userfile"]["tmp_name"];

$l_id = $_POST["l_id"];
$p_id = $_POST["p_id"];
$catch_manager = $_POST["pass"];

//echo "<br> first : " . $l_id . " " . $p_id . " " . "<br>";

$catch_user_id = mysqli_query($my_db, "SELECT * FROM Lecture WHERE l_id = '" . $l_id . "'");
$data = mysqli_fetch_array($catch_user_id);

$user = $data["l_user"];
$l_name = $data["l_name"];

//echo "<br>" . $user . " - " . $l_name . "<br>";

$dir_path = "./ppt_upload/" . $user . "/" . $l_id . "_" . $l_name;
//echo $dir_path . "<br>";

$total = count($_FILES["userfile"]["name"]);

if(@mkdir("./ppt_upload/" . $user, 0777))
{
  if(is_dir("./ppt_upload/" . $user))
  {
    @chmod("./ppt_upload/" . $user, 0777);
    //echo "user dir create<br>";
  }
}

if(@mkdir($dir_path, 0777))
{
  if(is_dir($dir_path))
  {
    @chmod($dir_path, 0777);
    //echo "user dir create<br>";
  }
}

//clear

/*
$catch_lid = mysqli_query($my_db, "SELECT * FROM Lecture WHERE l_user = '" . $user . "'");
$data = mysqli_fetch_array($catch_lid);

$l_id =  $data["l_id"];
*/

//temp query
//mysqli_query($my_db, "DELETE FROM PPT WHERE l_id = " . $l_id);

if($my_db->query("DELETE FROM PPT WHERE l_id = " . $l_id) != TRUE)
{
  //echo "<br> delete fail <br>";
}
else{
  //echo "<br>delete complete<br>";
}

for($i=0;$i<$total;$i++)
{
  $tmpfilepath = $_FILES["userfile"]["tmp_name"][$i];

  if($tmpfilepath != "")
  {
    //$newfilepath = "./ppt_upload/" . $user . "/" . $_FILES["userfile"]["name"][$i];
    $newfilepath = $dir_path . "/" . $_FILES["userfile"]["name"][$i];
    $save_name = "" . $_FILES["userfile"]["name"][$i];
    
    if(move_uploaded_file($tmpfilepath, $newfilepath))
    {
      //echo "<br>file_pathe : " .  $newfilepath;

      $insert_pid = $i + 1;

      if($catch_manager != "flag" && $p_id[$i] != "")
      {
        $insert_pid = $p_id[$i];
      }

      //echo "   p_id : " . $insert_pid;

    	mysqli_query($my_db, "INSERT INTO PPT VALUES(". $insert_pid . 
                                                   "," . $l_id . 
                                                   ", '" . $save_name . 
                                                   "', '" . $newfilepath . 
                                                   "', '1')");
	  }
  }
}

if($tmpfilepath == "")
{
  echo "fail";
}
else
{
  echo "ok";
}

/*
echo "<br><br>자세한 디버깅 정보입니다:";
print_r($_FILES);
print "</pre>"; 
*/
/*
if($catch_manager != NULL)
{
  ?>
    <script> document.location.href = './manager_tool/upload_page.php' </script>
  <?php
}*/

?>