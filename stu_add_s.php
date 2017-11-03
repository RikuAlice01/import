<?php
require_once('lib/phpqrcode/qrlib.php');
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
    echo "alert(\"$data\");window.location='stu_add.php';";
    echo "</script>";
    exit();
  }else{
    include("connect.php");
    $sql = "insert into students(id_student,titlename,s_firstname,s_lastname,class,tel,qrcode,password) values ('".$_POST["id_student"]."', '".$_POST["titlename"]."', '".$_POST["s_firstname"]."', '".$_POST["s_lastname"]."', '".$_POST["class"]."', '".$_POST["tel"]."',".hexdec($_POST["id_student"]).",'81dc9bdb52d04dc20036dbd8313ed055');";
    var_dump($sql);
    $query = mysqli_query($con,$sql) or die(mysql_error());
    if($query) {
                $qrcode = hexdec($_POST["id_student"]);
                $qrsrc = '../reg/qrs/qr' . $qrcode .'.png';
                QRcode::png($qrcode , $qrsrc, 'L', 10, 2);
                ?>
          <script>
              var DOM_img = document.createElement("img");
              DOM_img.src = "<?php echo($qrsrc); ?>";
          </script>
    <?php
      echo "<script language=\"JavaScript\">";
      echo "alert('บันทึกสำเร็จ');window.location='stu_add.php';";
      echo "</script>";
      exit();
    }else{
      echo "<script language=\"JavaScript\">";
      echo "alert('บันทึกไม่สำเร็จ');window.location='stu_add.php';";
      echo "</script>";
      exit();
    }
    mysqli_close($con);
  }
}
?>

