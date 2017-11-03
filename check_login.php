<?php
session_start();
include("connect.php");
$usernamein = mysqli_real_escape_string($con,$_POST['txtUsername']);
$passwordin = mysqli_real_escape_string($con,md5($_POST['txtPassword']));
$strSQL = "SELECT * FROM userforstudentimport WHERE username = '$usernamein'and password = '$passwordin'";
$objQuery = mysqli_query($con,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
if(!$objResult)
{
	$data="ชื่อผู้ใช้งานหรือรหัสไม่ถูกต้อง\\n";
	echo "<script language=\"JavaScript\">";
	echo "alert(\"$data\");window.location='index.php';";
	echo "</script>";
	exit;
}
else
{
	$_SESSION["user_id"] = $objResult["user_id"];
	$_SESSION["user_type_id_dorm"] = $objResult["user_type_id_dorm"];
	$_SESSION["username"] = $objResult["username"];
	session_write_close();
	if($objResult["user_type_id_dorm"] == "1")
	{
		header("location:indexs.php");
	}

	if($objResult["user_type_id_dorm"] == "2")
	{
		header("location:logout.php");
	}
}
mysqli_close($con);
?>