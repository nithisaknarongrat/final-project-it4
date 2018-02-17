<?php
session_start();
include("./connectdb.php");
date_default_timezone_set("asia/bangkok");
?>
<html><head>
    <title>แก้ไขข้อมูลข่าวสาร : VGH_admin</title>
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
            <?php include( "./menu.php"); ?>
		  </ul>
          </td>
          <td width="70%">
			<table width="100%" border="0">
			<tr>
				<td align="center">
				<h4 class="text-success">แก้ไขข้อมูลข่าวสาร</h4>
				</td>
			</tr>
			</table>
            <div class="row">
              <div class="col-md-12">&nbsp;&nbsp;
                <a href="./shownewstoadd.php" class="btn btn-sm btn-success"><i class="fa fa-fw fa-lg fa-angle-left"></i>ย้อนกลับ</a>
              </div>
            </div>
            <br>
			<!--ส่วน script.แจ้งเตือนค่าว่าง -->
			<script language="javascript">
				var nW,oW;
				function zoomToggle(iWideSmall,iWideLarge,whichImage)
					{oW=whichImage.style.width;
						if(oW==iWideLarge)
						{
							nW=iWideSmall;
						}
						else
						{
							nW=iWideLarge;
						}
					whichImage.style.width=nW;
					}
				
				function frmSubmit()
					{
						if(document.frm.news_name.value == "")
						{
							alert('กรุณากรอกหัวข้อข่าว');
							document.frm.news_name.focus();
							return false;
						}
					document.frm.submit();
					}
			</script>
			<!--ส่วน form.แก้ข่าว -->
            <form action="./pro_editnews.php" method="post" name="frm" onSubmit="return frmSubmit();">
				<table width="100%" border="0">
					<?php
					$news_id=$_GET['news_id'];
					$sql = "select * from news where news_id='$news_id';"; 
					//send sql to process
					$result = $mysqli->query($sql) or die($mysqli->error.__LINE__);
					while($row = mysqli_fetch_array($result)) { 
			
					$news_id=$row['news_id'];
					$news_name1=$row['news_name'];
					$news_data1=$row['news_data'];				
					$news_oldimage=$row['news_image'];
					$news_oldimage2=$row['news_image2'];
					$news_oldimage3=$row['news_image3'];
					$news_oldshowdate=$row['news_showdate'];
					}

					?>
					<tr>
						<td width="20%"></td>
						<td width="40%"></td>
						<td width="40%"></td>
					</tr>
					<tr>
						<td valign="top">&nbsp;&nbsp;<font color="#336600">ลำดับ</font></td>						
						<td colspan="2">
						<?php echo $news_id;?>
						<input type="hidden" name="news_id" value="<?php echo $news_id;?>">
						</td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td valign="top">&nbsp;&nbsp;<font color="#336600">วันที่โชว์ข่าว :</font></td>
						<td colspan="2">
						<?php
							$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม"," มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
											echo substr($news_oldshowdate,8,2)." ".$thaimonth[(substr($news_oldshowdate,5,2)-1)]." ".(substr($news_oldshowdate,0,4)+543);
						?>
						<input type="hidden" name="news_oldshowdate1" value="<?php echo $news_oldshowdate;?>"></td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td valign="top">&nbsp;&nbsp;<font color="#336600">หัวข้อข่าว :</font>&nbsp;<font color="red">*</font></td>						
						<td colspan="2"><textarea type="text" name="news_name" rows="5" cols="50" ><?php echo $news_name1;?></textarea></td>						
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td valign="top">&nbsp;&nbsp;<font color="#336600">เนื้อหาข่าวสาร :</font></td>
						<td colspan="2"><textarea type="text" name="news_data" rows="15" cols="60" ><?php echo $news_data1;?></textarea></td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td valign="top">&nbsp;&nbsp;<font color="#336600">รูปภาพที่ 1 :</font></td>
						<td>
							<?php if($news_oldimage==""){?>
								<image src="imageweb/ไม่มีรูปภาพ.png" width="50%" onClick="zoomToggle('50%','90%',this);">
							<?php }?>
							<?php if($news_oldimage!=""){?>
								<image src="imageweb/<?php echo $news_oldimage;?>" width="50%" onClick="zoomToggle('50%','90%',this);">		
							<?php }?>
						</td>
						<td>
							<font color="#336600">เปลี่ยนแปลงรูปภาพ :</font><br><input type="file" name="news_image" accept="image/*">
							<input type="hidden" name="news_oldimage" value="<?php echo $news_oldimage;?>"><br>
							<font color="#336600">ลบรูปภาพ :</font><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="news_deleteimage">&nbsp;&nbsp;ลบรูปภาพที่ 1<br>
							<h5 class="text-danger">* ขยายภาพคลิกที่รูปภาพ</h5>
						</td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td valign="top">&nbsp;&nbsp;<font color="#336600">รูปภาพที่ 2 :</font></td>
						<td>
							<?php if($news_oldimage2==""){?>
								<image src="imageweb/ไม่มีรูปภาพ.png" width="50%" onClick="zoomToggle('50%','90%',this);">
							<?php }?>
							<?php if($news_oldimage2!=""){?>
								<image src="imageweb/<?php echo $news_oldimage2;?>" width="50%" onClick="zoomToggle('50%','90%',this);">							
							<?php }?>
						</td>
						<td>
							<font color="#336600">เปลี่ยนแปลงรูปภาพ :</font><br><input type="file" name="news_image2" accept="image/*">
							<input type="hidden" name="news_oldimage2" value="<?php echo $news_oldimage2;?>"><br>
							<font color="#336600">ลบรูปภาพ :</font><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="news_deleteimage2">&nbsp;&nbsp;ลบรูปภาพที่ 2<br>
							<h5 class="text-danger">* ขยายภาพคลิกที่รูปภาพ</h5>
						</td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td valign="top">&nbsp;&nbsp;<font color="#336600">รูปภาพที่ 3 :</font></td>
						<td>
							<?php if($news_oldimage3==""){?>
								<image src="imageweb/ไม่มีรูปภาพ.png" width="50%" onClick="zoomToggle('50%','90%',this);">
							<?php }?>
							<?php if($news_oldimage3!=""){?>
							<image src="imageweb/<?php echo $news_oldimage3;?>" width="50%" onClick="zoomToggle('50%','90%',this);">							
							<?php }?>
						</td>
						<td>
							<font color="#336600">เปลี่ยนแปลงรูปภาพ :</font><br><input type="file" name="news_image3" accept="image/*">
							<input type="hidden" name="news_oldimage3" value="<?php echo $news_oldimage3;?>"><br>
							<font color="#336600">ลบรูปภาพ :</font><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="news_deleteimage3">&nbsp;&nbsp;ลบรูปภาพที่ 3<br>
							<h5 class="text-danger">* ขยายภาพคลิกที่รูปภาพ</h5>
						</td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td></td>
						<td colspan="2" valign="top" >
						&nbsp;&nbsp;&nbsp;
						<input class="btn btn-sm btn-success" type="submit" value="บันทีกข้อมูล">
						&nbsp;&nbsp;
						<input class="btn btn-sm btn-danger" type="reset" value="ล้างข้อมูลแก้ไข">
						</td>
					</tr>
				</table>
			</form>			
          </td>
          <td width="5%" bgcolor="#ccffcc" ></td>
        </tr>
    </table>
	<!--ส่วนท้าย-->
		<?php include( "./footer.php");?>
</body>
</html>