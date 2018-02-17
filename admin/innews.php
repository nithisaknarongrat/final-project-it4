<?php
session_start();
include("./connectdb.php");
date_default_timezone_set("asia/bangkok");
?>
<html><head>
			<title>ข่าวสารทั่วไป</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
            <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
            <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
            <link href="news.css" rel="stylesheet" type="text/css">
            <link rel="shortcut icon" href="logovgh.png">
			<!--ปุ่ม scroll-->
			<script src="jquery-1.4.2.min.js" type="text/javascript"></script>
			<script type="text/javascript" src="scrolltopcontrol.js"></script>
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
            <!--ส่วนเมนู-->
			<div class="navbar navbar-default navbar-static-top" data-spy="affix" data-offset-top="190">
				<?php include( "./menuweb.php");?>
			</div>
			<br>
                <!--ส่วนหัวข่าวสาร-->
                <div class="container">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h4 class="text-center text-success">ข่าวสารทั่วไป</h4>
                        <hr>
                    </div>
                </div>
                <!--เนื้อหาข่าวสาร-->
				
					<?php 
						$news_id=$_GET['news_id'];
						$sql = "select * from news where news_id='$news_id';";
						//echo " เช็คคำสั่ง ".$sql;
						
						$result = $mysqli->query($sql) or die($mysqli->error.__LINE__);
						while($row = mysqli_fetch_array($result)) { 
							$news_id=$row['news_id']; 
							$news_name=$row['news_name']; 
							$news_data=$row['news_data'];
							$news_image=$row['news_image']; 
							$news_image2=$row['news_image2']; 
							$news_image3=$row['news_image3'];
							$news_showdate=$row['news_showdate'];
											
					?>        
					
					<table class="table">
						<div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p class="text-success" >
                                        <?php
											$thaiweek=array("วันอาทิตย์","วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัสบดี","วันศุกร์","วันเสาร์");
											$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม"," มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
											echo $thaiweek[date('w', strtotime($news_showdate))]."ที่"." ".substr($news_showdate,8,2)." ".$thaimonth[(substr($news_showdate,5,2)-1)]." ".(substr($news_showdate,0,4)+543);
										?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <h4 class="text-primary"><i class="fa fa-fw fa-newspaper-o text-primary"></i>
                                        <?php echo $news_name;?>
                                    </h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p class="text-justify text-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php echo $news_data;?>
                                    </p>
                                </div>
                            </div>
                            <br>
                            <div class="row">
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <img src="imageweb/<?php echo $news_image;?>" class="center-block img-responsive img-rounded" >
                                </div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                            </div>
                            <br>
                            <div class="row">
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <img src="imageweb/<?php echo $news_image2;?>" class="center-block img-responsive img-rounded" >
                                </div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                            </div>
                            <br>
                            <div class="row">
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <img src="imageweb/<?php echo $news_image3;?>" class="center-block img-responsive img-rounded" >
                                </div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                            </div><hr>
                        </div>
						<?php
						}
						$mysqli->close();
						?>
                    </table>
					
		<!--ส่วนท้าย-->
		<?php include( "./footer.php");?>
</body>
</html>