<?php
session_start();
include("./connectdb.php");
date_default_timezone_set("asia/bangkok");
?>
<html><head>
    <title>แก้ไขข้อมูลกิจกรรม : VGH_admin</title>
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
				<h4 class="text-success">แก้ไขข้อมูลกิจกรรม</h4>
				</td>
			</tr>
			</table>
			<div class="row">
              <div class="col-md-12">&nbsp;&nbsp;
                <a href="./showeventtoadd.php" class="btn btn-sm btn-success"><i class="fa fa-fw fa-lg fa-angle-left"></i>ย้อนกลับ</a>
              </div>
            </div>
            <br>
			<!--ส่วน script.แจ้งเตือนค่าว่าง -->
			<script language="javascript">
				function CheckNum(){
						if (event.keyCode < 48 || event.keyCode > 57){
							  event.returnValue = false;
							}
					}
				function frmSubmit()
					{
						if(document.frm.event_name.value == "")
					{
						alert('กรุณากรอกหัวข้อกิจกรรม');
						document.frm.event_name.focus();
						return false;
					}
					if(document.frm.event_hour.value == "")
					{
						alert('กรุณากรอกเวลากิจกรรม');
						document.frm.event_hour.focus();
						return false;
					}
					if(document.frm.event_minute.value == "")
					{
						alert('กรุณากรอกเวลากิจกรรม');
						document.frm.event_minute.focus();
						return false;
					}
					document.frm.submit();
					}
					
				      
			</script>
			<!--ส่วน form.แก้ข่าว -->
            <form action="./pro_editevent.php" method="post" name="frm" onSubmit="return frmSubmit();">
				<table width="100%" border="0">
					<?php
					$event_id=$_GET['event_id'];
					$sql = "select * from event where event_id='$event_id'"; 
					//send sql to process
					$result = $mysqli->query($sql) or die($mysqli->error.__LINE__);
					while($row = mysqli_fetch_array($result)) { 
			
					$event_id=$row['event_id'];
					$event_name1=$row['event_name'];
					$event_olddate1=$row['event_date'];	
					$event_hour1=$row['event_hour'];
					$event_minute1=$row['event_minute'];
					}
					
					?>
					<tr>
						<td width="20%"></td>
						<td width="20%"></td>
						<td width="50%"></td>
					</tr>
					<tr>
						<td valign="top">&nbsp;&nbsp;<font color="#336600">ลำดับ</font></td>						
						<td colspan="2">
						<?php echo $event_id;?>
						<input type="hidden" name="event_id" value="<?php echo $event_id;?>">
						</td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td valign="top">&nbsp;&nbsp;<font color="#336600">หัวข้อกิจกรรม :</font>&nbsp;<font color="red">*</font></td>						
						<td colspan="2"><textarea type="text" name="event_name" maxlength="100" rows="3" cols="50" ><?php echo $event_name1;?></textarea></td>						
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td valign="top">&nbsp;&nbsp;<font color="#336600">วันกิจกรรม :</font></td>
						<td>
						<?php
							$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม"," มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
											echo substr($event_olddate1,8,2)." ".$thaimonth[(substr($event_olddate1,5,2)-1)]." ".(substr($event_olddate1,0,4)+543);
						?>
						<input type="hidden" name="event_olddate" value="<?php echo $event_olddate1;?>"></td>
						<td><font color="#336600">เปลี่ยนแปลงวันกิจกรรม :&nbsp;&nbsp;</font><input type="date" name="event_date"></td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td valign="top">&nbsp;&nbsp;<font color="#336600">เวลากิจกรรม :</font>&nbsp;<font color="red">*</font></td>				
						<td colspan="2">
							<input type="text" name="event_hour" size="2" maxlength="2" value="<?php echo $event_hour1;?>" onKeyPress="CheckNum();">
							&nbsp;<font color="#336600">:</font>&nbsp;
							<input type="text" name="event_minute" size="2" maxlength="2" value="<?php echo $event_minute1;?>" onKeyPress="CheckNum();">
							&nbsp;<font color="#336600">น.</font>&nbsp;&nbsp;<h5 class="text-danger">* ตัวอย่าง : 12 : 30 น. หรือ 23 : 00 น.</h5>
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