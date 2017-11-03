<?php
require_once('lib/phpqrcode/qrlib.php');
include("panel.php");
?>
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">     
        <div class="row">
      <div class="col-lg-12" align="center">
      <br> <br><br><br>
        <h3 class="page-header">นำเข้าข้อมูลนักเรียนผ่าน Excel</h3>
      </div>
    </div>
  <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
        	<div class="panel-body">
<h4 class="page-header"><b>อัพโหลดไฟล์ข้อมูล<b></h4>
<b>***ไฟล์ต้องเป็นไฟล์นามสกุล CVS ประเภทไฟล์เป็น UTF-8<b></h5>
<form name="form1" method="post" action="importdata.php" enctype="multipart/form-data">
	<input type="file" name="filUpload"><br><br>
	<input name="btnSubmit" type="submit" value="Submit">
</form>
<?php
$fone=0;
include("connect.php"); 
if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]))
	{
	echo "<br>Upload Complete<br>";
	if(file_exists("myfile/".$_FILES["filUpload"]["name"])){ 
		$objCSV = fopen("myfile/".$_FILES["filUpload"]["name"], "r");
	}else{
		$objCSV=0;
		echo "ไม่พบไฟล์ข้อมูล<br>";
		exit();
	}

	if($objCSV){
		setlocale ( LC_ALL, 'th_TH.UTF-8' );
			while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) { 
			if($fone==0){$fone++;

			continue;}
			$strSQL = "INSERT INTO students (id_student,titlename,s_firstname,s_lastname,class,tel,qrcode,password) VALUES ('".$objArr[0]."','".$objArr[1]."','".$objArr[2]."' ,'".$objArr[3]."','".$objArr[4]."' ,'".$objArr[5]."',".hexdec($objArr[0]).",'81dc9bdb52d04dc20036dbd8313ed055');";
			echo $objArr[0]."','".$objArr[1]."','".$objArr[2]."' ,'".$objArr[3]."','".$objArr[4]."' ,'".$objArr[5]." ";
			 $query =  mysqli_query($con,$strSQL) or die(mysql_error()); 
			 if($query) {
                $qrcode = hexdec($objArr[0]);

                $qrsrc = '../reg/qrs/qr' . $qrcode .'.png';
                QRcode::png($qrcode , $qrsrc, 'L', 10, 2);
                ?>
          <script>
              var DOM_img = document.createElement("img");
              DOM_img.src = "<?php echo($qrsrc); ?>";
          </script>
    <?php
				echo "Import Done.<br>"; 
   						}
			}  
				fclose($objCSV);   
				$flgDelete = unlink("myfile/".$_FILES["filUpload"]["name"]);
				if($flgDelete)
				{
					echo "Success";
				}
				else
				{
					echo "Not Success";
				}
			}else{
				echo "Import Error.";  	
			}
			mysqli_close($con);
			}
?>
        	</div>  
        </div>
      </div>
    </div>
   <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
        	<div class="panel-body">
        	<h4 class="page-header"><b>ขั้นตอนการสร้างไฟล์ข้อมูล<b></h4>
        	<div align="center" id='div1'>
        		        <p>1.Download file : 
        		        <a href="simple.csv" download>
						  <img border="0" src="Simple.jpg" alt="Simple">
						</a>
						</p>
        				<img src="./imp/01.png" style="width:300px;height:200px;">
        				<p></p>
        				<img src="./imp/02.png" style="width:300px;height:200px;"><br><br>
        				<p>2.ทำการ Save File Excel ให้เป็น CSV ก่อนดังนี้ไปที่ File -> Save As -> OtherFormats</p>
        				<img src="./imp/03.png" style="width:300px;height:200px;"><br><br>
        				<p>3.จากนั้นเลือก Formats เป็น CSV (Comma delimited) (*.csv)</p>
        				<img src="./imp/04.png" style="width:300px;height:200px;"><br><br>
        				<p>4.จากนั้นทำการแปลง Encode ของไฟล์เป็น UTF-8 โดยเปิดไฟล์ CVS ด้วย Notepad</p>
        				<img src="./imp/05.png" style="width:300px;height:200px;"><br><br>
        				<p>5.จากนั้นเลือก Formats เป็น CSV (Comma delimited) (*.csv)</p>
        				<img src="./imp/06.png" style="width:300px;height:200px;"><br><br>
        				<p>6.จากนั้นเลือก Formats เป็น CSV (Comma delimited) (*.csv)</p></div>
			          <div align="center" id='div1'><img src="./imp/07.png" style="width:300px;height:200px;"></div>
        	</div>  
        </div>
      </div>
    </div>  
  </div>
  </body>
</html>
