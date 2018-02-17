<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
  </head><body>
	<?php
		session_start();
		if($_SESSION['status']==""){
	?>
	
<div class="section">
    <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form role="form" draggable="true" action="./checkwebapp.php" method="post" name="frm">
              <div class="form-group has-success">&nbsp;&nbsp;&nbsp;
                <label class="control-label" for="exampleInputUser">User :</label>
                <input class="form-control" id="exampleInputUser1" placeholder="user" type="text" name="add_user">
              </div>
              <div class="form-group has-success has-feedback">&nbsp;&nbsp;&nbsp;
                <label class="control-label" for="exampleInputPassword1">Password :</label>
                <input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password" name="add_password">
              </div>
              <div class="form-group">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                  <button type="submit" class="btn btn-success">เข้าสู่ระบบ</button>
                </div>
              </div>
            </form>
			<?php
			} else if($_SESSION['status']=="1"){
			?>
				<div class="form-group">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
						<a href="./shownewstoadd.php" class="btn btn-success">จัดการข่าวสาร</a>
					</div><br><br>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
						<a href="./showeventtoadd.php" class="btn btn-success">จัดการกิจกรรม</a>
					</div><br><br>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
						<a href="./logout.php" class="btn btn-danger">ออกจากระบบ</a>
					</div>
				</div>		
		<?php
			} else if($_SESSION['status']=="2"){
		?>
			<br>
				<font color="red"><center>ชื่อบัญชี หรือรหัสผ่านของคุณไม่ถูกต้อง </center></font><br>
				<div class="form-group">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
						<a href="./logout.php" class="btn btn-success">ย้อนกลับ</a>
					</div>
				</div>
		<?php
			}
		?>
		</div>
    </div>
</div>
</body>
</html>