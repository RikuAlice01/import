<?php
include("panel.php");
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<br><br><br>
		</div>
		<div class="row">
			<div class="col-lg-12" align="center">
				<br>
				<h3 class="page-header">เพิ่มข้อมูลนักเรียน</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" action="stu_add_s.php" method="post">
								<div class="form-group">
									<label>รหัสนักเรียน <font color=red>(จำเป็น)</font></label>
									<input name="id_student" autocomplete="off"  class="form-control" >
								</div>
								<div class="form-group">
									<label>คำนำหน้า <font color=red>(จำเป็น)</font></label>
									<select name="titlename" autocomplete="off"  class="form-control">
										<option>ด.ช.</option>
										<option>ด.ญ.</option>
										<option>นาย</option>
										<option>นางสาว</option>
									</select>
								</div>				
								<div class="form-group">
									<label>ชื่อ <font color=red>(จำเป็น)</font></label>
									<input name="s_firstname" autocomplete="off"  type="text" class="form-control">
								</div>

								<div class="form-group">
									<label>นามสกุล <font color=red>(จำเป็น)</font></label>
									<input name="s_lastname" autocomplete="off"  type="text" class="form-control">
								</div>
						</div>		
						<div class="col-md-6">	
							<div class="form-group">
								<label>ชั้นปี <font color=red>(จำเป็น)</font></label>
								<select name="class" autocomplete="off"  class="form-control">
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
								<input type="text" name="tel" autocomplete="off" placeholder="08X-XXX-XXXX" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="โปรดกรอกตามรูปแบบ" class="form-control">
							</div>

							<button type="submit" class="btn btn-primary">บันทึก</button>
							<button type="reset" class="btn btn-default">ยกเลิก</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
