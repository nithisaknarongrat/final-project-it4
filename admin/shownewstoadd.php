<?php
session_start();
include("./connectdb.php");
date_default_timezone_set("asia/bangkok");
?>
<html><head>
            <title>จัดการข่าวสาร : VGH_admin</title>
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
                                <img src="logo1.png" class="img-responsive" >
                            </div>
                        </div>
                    </div>
                </div>
                <table width="100%" border="0">
                        <tr>
                            <td width="5%" bgcolor="#ccffcc" ></td>
                            <td width="20%" bgcolor="#ebebe0" valign="top" align="center"><br>
                                <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="190" >
								<?php include( "./menu.php"); ?>
								</ul>
                            </td>
                            <td width="70%">
                                <div class="row">
                                    <div class="col-md-12"><br>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="./frm_addnews.php" class="btn btn-sm btn-success"><i class="fa fa-fw fa-lg fa-plus"></i>เพิ่มข้อมูลข่าวสาร</a>
                                    </div>
                                </div>
                                <br>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<table class="table table-bordered table-striped">
									<tr>
										<th width="5%">ลำดับ</th>
                                        <th width="55%">หัวข้อข่าว</th>
                                        <th width="20%">วันที่ลงข่าว</th>
                                        <th width="20%">จัดการ</th>
									</tr>
									<?php
										$connect = mysql_connect("localhost","root","");
										mysql_select_db("");
										
										$rows = 5;
									
										if($page<=0)$page=1;
										$total_data = mysql_num_rows(mysql_query("select * from news;"));
										$total_page = ceil($total_data/$rows);
										if($page>=$total_page)$page=$total_page;
										$start = ($page-1)*$rows;
										
										/* echo "ข้อมูลทั้งหมด ".$total_data."<br>";
										echo " จำนวนหน้า ".$total_page."<br>";
										echo "จุดสตาร์ท ".$start."<br>"; */
										
										$sql = "select * from news Order By news_id DESC Limit $start,$rows";
										//echo " เช็คคำสั่ง ".$sql;
										$result = $mysqli->query($sql)  or die($mysqli->error.__LINE__);
										while($row = mysqli_fetch_array($result)) { 
										$news_id= $row["news_id"];
										$news_name= $row["news_name"]; 
										$news_showdate1= $row["news_showdate"];
										
									?>
									<tr>
										<td align="center"><?php echo $news_id;?></td>
										<td align="left"><?php echo $news_name;?></td>
										<td align="center">
										<?php
											$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม"," มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
											echo substr($news_showdate1,8,2)." ".$thaimonth[(substr($news_showdate1,5,2)-1)]." ".(substr($news_showdate1,0,4)+543);
										?>
										</td>
										<td align="center"><a <?php echo "href=\"./frm_editnews.php?news_id=$news_id\"";?> class="btn btn-success btn-xs"><span class="fa fa-cog fa-fw fa-lg" ></span>แก้ไข</a> | <a <?php echo "href=\"./pro_deletenews.php?news_id=$news_id\"";?>class="btn btn-danger btn-xs" onClick="return confirm('คุณต้องการที่จะลบข้อมูลข่าวสารนี้หรือไม่ ?');"><span class="fa fa-fw fa-lg fa-trash-o" ></span>ลบ</a> </td>
									</tr>  			
									<?php
										}
										$mysqli->close();
									?>   
								</table>
								
							<!--แบ่งหน้าจาก pagination-->
								<div class="col-md-12 text-center">
									<ul class="pagination">
										<li <?php if($page==1) echo'class="disabled"';?>><a href="shownewstoadd.php?page=<?=$page-1?>">ย้อนกลับ</a></li>
										
										<?php for($i = 1; $i <= $total_page; $i++) {?>
										<li <?php if($page==$i) echo 'class="active"'?>><a href="shownewstoadd.php?page=<?=$i?>"><?=$i?></a></li>	
										<?php } ?>
										
										<li <?php if($page==$total_page) echo'class="disabled"';?>><a href="shownewstoadd.php?page=<?=$page+1?>">ถัดไป</a></li>
									</ul>
								</div>
							<!--แบ่งหน้าจาก pagination-->
								<br><br>
							</td>
							<td width="5%" bgcolor="#ccffcc" ></td>
						</tr>
                </table>
				<!--ส่วนท้าย-->
				<?php include( "./footer.php");?>				
    </body>
</html>