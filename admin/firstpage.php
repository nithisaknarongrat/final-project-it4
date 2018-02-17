<?php
session_start();
include("./connectdb.php");
date_default_timezone_set("asia/bangkok");
?>
<html><head>
        <title>โรงพยาบาล</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="firstpage.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="logovgh.png">
        <!--ปุ่ม scroll-->
        <script src="jquery-1.4.2.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="scrolltopcontrol.js"></script>
    </head><body>
	
        <div class="section">
            <div class="background-image" style="background-image : url('http://pingendo.github.io/pingendo-bootstrap/assets/blurry/800x600/7.jpg')"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-8 col-sm-5 col-md-5 col-lg-5">
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
            <!--ส่วนรูปสไลด์-->
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div id="fullcarousel-example" data-interval="6000" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="imageweb/รูปภาพตัวอย่าง2.png" style="width: 1000px; height: 400px;">
                                    </div>
                                    <div class="item">
                                        <img src="imageweb/รูปภาพตัวอย่าง2.png" style="width: 1000px; height: 400px;">
                                    </div>
                                    <div class="item">
                                        <img src="imageweb/รูปภาพตัวอย่าง2.png" style="width: 1000px; height: 400px;">
                                    </div>
                                </div>
                                <a class="left carousel-control" href="#fullcarousel-example" data-slide="prev"><i class="icon-prev fa fa-angle-left"></i></a>
                                <a class="right carousel-control" href="#fullcarousel-example" data-slide="next"><i class="icon-next fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--ส่วนหัวตารางกิจกรรม-->
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4 class="text-primary">ตารางกิจกรรม</h4>
                </div><hr>
            </div>
			
			<!--ส่วนตารางเวลาข่าวสาร1-->
			<div class="container">
			
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">	
			<table width="100%" border="0" >
				<tr>
					<th class="thead" width="15%">วันที่</th>
					<th class="thead" width="15%">เวลา</th>
					<th class="thead" width="50%">กิจกรรม</th>
				</tr>
				<tr>
					<td colspan="4" >
						<div style="height:160px;
									display:block;
									overflow:auto;  
									">
							<table  class="table table-striped">
								<?php
									$sql = "select * from event Order By event_date DESC";
									//echo " เช็คคำสั่ง ".$sql;
									$result = $mysqli->query($sql) or die($mysqli->error.__LINE__);
									while($row = mysqli_fetch_array($result)) { 
									$event_id= $row["event_id"];
									$event_name= $row["event_name"];
									$event_date1= $row["event_date"];
									$event_hour= $row["event_hour"];
									$event_minute= $row["event_minute"];
									//yyyy-mm-dd
								?>
									<tr>
										<td width="15%">
										<?php 
											$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม"," มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
											echo substr($event_date1,8,2)." ".$thaimonth[(substr($event_date1,5,2)-1)]." ".(substr($event_date1,0,4)+543);?></td>
										<td width="15%"><?php echo $event_hour;?>:<?php echo $event_minute;?>&nbsp;น.</td>
										<td width="50%"><?php echo $event_name;?></td>
									</tr>
								<?php 
									} 
								?>      
							</table>
						</div>    
					</td>
				</tr>
			</table>
			</div>
			</div>
			<br>
            <!--ส่วนหัวข่าวสารเบื้องต้น-->
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4 class="text-primary">ข่าวประชาสัมพันธ์</h4> 
                </div>
            </div>
			<div class="container"><hr></div>
            <!--ส่วนข่าวสารเบื้องต้น-->
			<?php 
				$sql = "select * from news order by news_id desc limit 0,5;";
				//echo " เช็คคำสั่ง ".$sql;
				
				$result = $mysqli->query($sql) or die($mysqli->error.__LINE__);
				while($row = mysqli_fetch_array($result)) { 
					$news_id=$row['news_id']; 
					$news_name=$row['news_name']; 
					$news_image=$row['news_image']; 
					$news_showdate=$row['news_showdate'];
									
			?>        
					
			<table class="table">
				<div class="container">
                <div class="row">
					<div class="col-xs-12 col-sm-12 hidden-md hidden-lg">
                        <p class="text-primary" >
                            <?php
								$thaiweek=array("วันอาทิตย์","วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัสบดี","วันศุกร์","วันเสาร์");
								$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม"," มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
								echo $thaiweek[date('w', strtotime($news_showdate))]."ที่"." ".substr($news_showdate,8,2)." ".$thaimonth[(substr($news_showdate,5,2)-1)]." ".(substr($news_showdate,0,4)+543);
							?>
                        </p>
                    </div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<?php if($news_image==""){?>
						<img src="imageweb/ตัวอย่างข่าว.png" class="img-responsive img-rounded" width="400" >
					<?php }?>
					<?php if($news_image!=""){?>
						<img src="imageweb/<?php echo $news_image;?>" class="img-responsive img-rounded" width="400" >
					<?php }?>
					</div>
					<div class="hidden-xs hidden-sm col-md-8 col-lg-8">
						<p class="text-success" >
                            <?php
								$thaiweek=array("วันอาทิตย์","วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัสบดี","วันศุกร์","วันเสาร์");
								$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม"," มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
								echo $thaiweek[date('w', strtotime($news_showdate))]."ที่"." ".substr($news_showdate,8,2)." ".$thaimonth[(substr($news_showdate,5,2)-1)]." ".(substr($news_showdate,0,4)+543);
							?>
                        </p>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
						<h4 class="text-primary"><i class="fa fa-fw fa-newspaper-o text-primary"></i>&nbsp;<?php echo $news_name;?></h4>
						<input type="hidden" name="news_id" value="<?php echo $news_id;?>">
						<br><a <?php echo "href=\"./innews.php?news_id=$news_id\"";?> class="btn btn-success btn-xs">เพิ่มเติม</a>
					</div>
				</div><hr>
				</div>
				<?php
					}
					$mysqli->close();
				?>
			</table>
            
            <!--ส่วนท้าย-->
            <?php include( "./footer.php");?>
    

</body></html>