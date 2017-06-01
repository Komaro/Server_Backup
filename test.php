<?
	if($_GET["id"] && $_GET["pwd"])
	{
		$connect = mysql_connect("localhost", "root", "apmsetup"); // id pass
		mysql_query("set names utf8");
		mysql_select_db("5113489", $connect); // db
		
		$spl = "SELECT * FROM student WHERE id = '" . $_GET["id"] .
							 "' AND pwd = '" . $_GET["pwd"] . "'";
		
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);

		if($num)
		{
			$row = mysql_fetch_array($result);

			echo "\n홍현표님 반갑습니다.\n";
			echo "날짜 :".date("Y-m-d")."\n";
			echo "아이디 :".$_GET["id"]."\n";
			echo "패스워드 :".$_GET["pwd"]."\n";
			echo "파일경로 :".$_SERVER["PHP_SELF"]."\n";
			echo "접속IP : ".$_SERVER["REMOTE_ADDR"]."\n";
		}
		else
		{
			echo "아이디 또는 패스워드가 \n 맞지 않습니다. [홍현표]\n";

		}
	}else{
		echo "요청페이지 오류\n"
	}
?>