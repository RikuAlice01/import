<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
if(empty($_SESSION['user_id']))
{
  echo "<script language=\"JavaScript\">";
  echo "alert('กรุณาลงชื่อเข้าใช้');window.location='index.php';";
  echo "</script>";
  exit();
}else{
  ini_set('display_errors', 1);
  error_reporting(~0);
  isset($_POST["tel"])?$_POST["tel"]=$_POST["tel"]:$_POST["tel"]="";
  if(empty($_POST["id_student"])||empty($_POST["titlename"])||empty($_POST["s_firstname"])||empty($_POST["s_lastname"])||empty($_POST["class"])){
    $data="กรอกข้อมูลสำคัญไม่ครบ\\n";
    echo "Error";
    echo "<script language=\"JavaScript\">";
    echo "alert(\"$data\");window.location='stu_edit.php?id_student=".$_POST["id_student"]."';";
    echo "</script>";
    exit();
  }else{
    include("connect.php");
    $id_student=$_POST["id_student"];
    $sql = "UPDATE students SET titlename='".$_POST["titlename"]."',s_firstname='".$_POST["s_firstname"]."',s_lastname='".$_POST["s_lastname"]."',class='".$_POST["class"]."',tel='".$_POST["tel"]."' WHERE id_student = '".$id_student."'";
    $query = mysqli_query($con,$sql);
    if($query) {
      echo "<script language=\"JavaScript\">";
      echo "alert('บันทึกสำเร็จ');window.location='stu_edit.php?id_student=".$_POST["id_student"]."';";
      echo "</script>";
      exit();
    }else{
      echo "<script language=\"JavaScript\">";
      echo "alert('บันทึกไม่สำเร็จ');window.location='stu_edit.php?id_student=".$_POST["id_student"]."';";
      echo "</script>";
      exit();   
    }
    mysqli_close($con);
  }
}
?>

