<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - By Sitithichai S.">
    <title>ระบบจัดการประวัตินักเรียน</title>  
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-img3-body">
<?php
    session_start();
    date_default_timezone_set("Asia/Bangkok");
    if($_SESSION['user_type_id_dorm'] != ""){
    echo "<script language=\"JavaScript\">";    
    echo "window.location='indexs.php';";  
    echo "</script>";  
    }
?>
<form name="formtextindex" >
<div class="form" align="center">
<br><br><br>
<h1>ระบบจัดการประวัตินักเรียน</h1>
</form>
<br><br>
</div>
</form>
    <div class="container">
      <form class="login-form" method="post" action="check_login.php" >        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input name="txtUsername" autocomplete="off" type="text" class="form-control" id="txtUsername" placeholder="ชื่อผู้ใช้" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input name="txtPassword" type="password" class="form-control" id="txtPassword" placeholder="รหัสผ่าน">
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">เข้าสู่ระบบ</button>
        </div>
      </form>
    <div class="text-right">
            <div  align="center" class="credits">
                    <div align="center" class="credits"><br><br>
                <FONT  COLOR=#000000 SIZE=2> พัฒนาโดย </FONT><br>
                <br><a href="https://fb.com/OneVRM/" ><FONT COLOR=#000000 SIZE=2>นายสิทธิชัย สิริฤทธิกุลชัย</FONT></a>
            </div>
        </div>
    </div>


  </body>
</html>
