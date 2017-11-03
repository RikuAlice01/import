<?php
include("panel.php");
?>
  <?php
  isset( $_GET['del'])?$del= $_GET['del']:$del='';
  isset( $_GET['id_student'])?$cstu=$_GET['id_student']:$cstu='';
  isset( $_POST['search'])?$search=$_POST['search']:$search='';
  if($del==y){
    include("connect.php");
    $sql = "DELETE FROM students WHERE id_student = '".$cstu."' ";
    $query = mysqli_query($con,$sql);
    if(mysqli_affected_rows($con)) {
      mysqli_close($con);
      echo "<script language=\"JavaScript\">";
      echo "alert('ลบข้อมูลสำเร็จ');window.location='stu_all.php';";
      echo "</script>";
      exit();
    }
  }
  ?>
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
     <div class="col-lg-12" align="center">
       <br><br><br><br>
       <h3 class="page-header">ข้อมูลนักเรียนทั้งหมด</h3>
     </div>
     <form role="form" action="stu_all.php" method="post">
       <div class="col-lg-12" align="center">
        ค้นหาด้วยรหัสนักศึกษา : <input type="text" name="search" autocomplete="off" value="<?php echo $search;?>">
        <br><br>
       </div>

     </form>
     
   </div>
   <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
       <div class="panel-body">
        <table width="1020" border="1" align="center">
         <tr>
          <th width="80"> <div align="center">รหัส</div></th>
          <th height="40" width="220"> <div align="center">ชื่อ - สกุล</div></th>
          <th width="120"> <div align="center">ชั้น</div></th>
          <th width="120"> <div align="center">เบอร์โทร</div></th>
          <th width="100"> <div align="center">แก้ไข</div></th>
          <th width="100"> <div align="center">ลบข้อมูล</div></th>
        </tr>
        <?php

        include("connect.php");
        $sql = "SELECT * FROM students WHERE id_student LIKE '%".$search."%' ORDER BY id_student ASC";
        $query = mysqli_query($con,$sql);
        while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
        {
          ?>
          <tr>
            <td><div align="center"><?php echo $result["id_student"]; ?></div></td>
            <td height="30"><div align="">
              <center>
                <?php echo $result["titlename"].$result["s_firstname"]." ".$result["s_lastname"]; ?>
              </center>
            </div></td>
            <td><div align="center"><?php echo $result["class"]; ?></div></td>
            <td><div align="center"><?php echo $result["tel"]; ?></div></td>
            <td  align="center"> <a href="stu_edit.php?id_student=<?php echo $result["id_student"];?>">แก้ไข</a></td>
            <td  align="center"> <a href="stu_all.php?del=y&id_student=<?php echo $result["id_student"];?>">ลบ</a></td>
          </tr>
          <?php
        }
        mysqli_close($con);
        ?>
      </table>
    </div>
  </div>
</div>
</div>
</body>
</html>