<?php
	session_start();
?>
<html><head>
    <title>VGH_admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="style_1.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="logovgh.png">
  </head><body>
    <!--ส่วน logo -->
    <div class="section">
      <div class="background-image" style="background-image : url('http://pingendo.github.io/pingendo-bootstrap/assets/blurry/800x600/7.jpg')"></div>
      <div class="container">
        <div class="row">
          <div class="col-xs-7 col-sm-5 col-md-5 col-lg-5">
            <img src="logo1.png" class="img-responsive">
          </div>
        </div>
      </div>
    </div>
    <table width="100%" border="0">
        <tr>
			<td width="5%" bgcolor="#ccffcc" ></td>
			<td width="20%" bgcolor="#ebebe0" valign="top" align="center"><br>
			<ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="190" >
            <?php include("./menu.php"); ?>
			</ul>
			</td>
			<td width="70%" valign="top" align="center">
			<br>
            <h4 class=" text-center text-success">*** ยินดีต้อนรับเข้าสู่ระบบประชาสัมพันธ์สารสนเทศ  ***</h4>
			<br><br><image src="imageweb/history.jpg" width="60%" class="img-responsive img-rounded"><br><br>
			</td>
			<td width="5%" bgcolor="#ccffcc" ></td>
        </tr>
    </table>
    <!--ส่วนท้าย-->
    <?php include( "./footer.php");?>
</body></html>