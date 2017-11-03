<?php
   include("panel.php");
   ini_set('display_errors', 1);
   error_reporting(~0);
  include("connect.php");
   $id_student = null;
   if(isset($_GET["id_student"]))
   {
     $id_student = $_GET["id_student"];
   }
  include("connect.php");
   $sql = "SELECT * FROM students WHERE id_student = '".$id_student."' ";
   $query = mysqli_query($con,$sql);
   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
   mysqli_close($con);
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<br><br><br>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12" align="center">
<br>
				<h3 class="page-header">แก้ไขข้อมูลนักเรียน</h3>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" action="stu_edit_s.php" method="post">
								<div class="form-group">
									<label>รหัสนักเรียน</label>
									<?php echo $result["id_student"];?>
									<input type="hidden" class="form-control" name="id_student" value="<?php echo $result["id_student"];?>">
								</div>

								<div class="form-group">
									<label>คำนำหน้า</label>
									<select class="form-control" name="titlename">
										<option><?php echo $result["titlename"];?></option>
										<option>ด.ช.</option>
										<option>ด.ญ.</option>
										<option>นาย</option>
										<option>น.ส.</option>
									</select>
								</div>				
								<div class="form-group">
									<label>ชื่อ</label>
									<input type="text" class="form-control" name="s_firstname" autocomplete="off" value="<?php echo $result["s_firstname"];?>">
								</div>
								<div class="form-group">
									<label>นามสกุล</label>
									<input type="text" class="form-control" name="s_lastname" autocomplete="off" value="<?php echo $result["s_lastname"];?>">
								</div>
							</div>
							<div class="col-md-6">
									<div class="form-group">
									<label>ชั้นเรียน</label>
								<select name="class" autocomplete="off" class="form-control">
										<option><?php echo $result["class"];?></option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>7</option>
										<option>8</option>
									</select>
								</div>
								<div class="form-group">
									<label>เบอร์ติดต่อ</label>
									<input type="text" class="form-control" name="tel" autocomplete="off" value="<?php echo $result["tel"];?>">
								</div>
								<button type="submit" class="btn btn-primary">บันทึก</button>
								<button type="reset" class="btn btn-default">ยกเลิก</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
