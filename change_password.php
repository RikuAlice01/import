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
			<h3 class="page-header">เปลี่ยนรหัสผ่าน</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-6">
						<form role="form" action="change_password_s.php" autocomplete="off" method="post">
							<div class="form-group">
								<label>รหัสเดิม</label>
								<input type="password" class="form-control" autocomplete="off" name="oldpassword" autofocus>
								<label>รหัสใหม่</label>
								<input type="password" class="form-control"  autocomplete="off" name="newpassword" autofocus>
								<label>รหัสใหม่อีกครั้ง</label>
								<input type="password" class="form-control"  autocomplete="off" name="renewpassword" autofocus>
							</div>
							<button type="submit" class="btn btn-primary">ยืนยัน</button>
							<button type="reset" class="btn btn-default">ยกเลิก</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
