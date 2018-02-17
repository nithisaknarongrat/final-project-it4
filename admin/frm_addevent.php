<?php
session_start();
include("./connectdb.php");
date_default_timezone_set("asia/bangkok");
?>
<html><head>
    <title>เพิ่มข้อมูลกิจกรรม : VGH_admin</title>
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
          <td width="5%" bgcolor="#ccffcc"></td>
          <td width="20%" bgcolor="#ebebe0" valign="top" align="center"><br>
		  <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="190" >
            <?php include( "./menu.php"); ?>
		  </ul>
          </td>
          <td width="70%">
			<table width="100%" border="0">
			<tr>
				<td align="center">
				<h4 class="text-success">เพิ่มข้อมูลกิจกรรม</h4>
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
						if(document.frm.event_date1.value == "")
					{
						alert('กรุณากรอกวันที่กิจกรรม');
						document.frm.event_date1.focus();
						return false;
					}
						if(document.frm.event_hour1.value == "")
					{
						alert('กรุณากรอกเวลากิจกรรม');
						document.frm.event_hour1.focus();
						return false;
					}
					if(document.frm.event_minute1.value == "")
					{
						alert('กรุณากรอกเวลากิจกรรม');
						document.frm.event_minute1.focus();
						return false;
					}
					document.frm.submit();
					}
					
				      
			</script>
			<!--ส่วน form.เพิ่มกิจกรรม -->
            <form action="./pro_addevent.php" method="post" name="frm" onSubmit="return frmSubmit();">
			<table width="100%" border="0">
			<tr>
				<td width="20%" valign="top">&nbsp;&nbsp;<font color="#336600">ลำดับ</font></td>				
				<td width="80%">
					<?php	
					//หา ID ใหม่ โดยหาค่า Max มาบวก 1
					$sqlmax = "select max(event_id) as maxid from event"; 
					//send sql to process
					$result = $mysqli->query($sqlmax) or die($mysqli->error.__LINE__);
					while($row = mysqli_fetch_array($result)) { 
					$maxid=$row["maxid"];
					}
					$event_id=$maxid+1;	
					echo $event_id;
					?>
					<input type="hidden" name="event_id" value="<?php echo $event_id;?>">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td valign="top">&nbsp;&nbsp;<font color="#336600">หัวข้อกิจกรรม :</font>&nbsp;<font color="red">*</font></td>				
				<td><textarea type="text" name="event_name" maxlength="100" rows="3" cols="50" ></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td valign="top">&nbsp;&nbsp;<font color="#336600">วันกิจกรรม :</font>&nbsp;<font color="red">*</font></td>				
				<td>
				<input type="date" name="event_date1" ></input></td>
			</tr>
			<tr>
				<td></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td valign="top">&nbsp;&nbsp;<font color="#336600">เวลากิจกรรม :</font>&nbsp;<font color="red">*</font></td>				
				<td>
				<input type="text" name="event_hour1" size="2" maxlength="2" onKeyPress="CheckNum();">
				&nbsp;<font color="#336600">:</font>&nbsp;
				<input type="text" name="event_minute1" size="2" maxlength="2" onKeyPress="CheckNum();">
				&nbsp;<font color="#336600">น.</font>&nbsp;&nbsp;<h5 class="text-danger">* ตัวอย่าง : 12 : 30 น. หรือ 23 : 00 น.</h5>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td></td>
				<td valign="top" >
				&nbsp;&nbsp;&nbsp;
				<input class="btn btn-sm btn-success" type="submit" value="บันทีกข้อมูล">
				&nbsp;&nbsp;
				<input class="btn btn-sm btn-danger" type="reset" value="ล้างข้อมูล">
				</td>
			</tr>
			</table>
			</form>
          </td>
          <td width="5%" bgcolor="#ccffcc"></td>
        </tr>
    </table>
	<!--ส่วนท้าย-->
		<?php include( "./footer.php");?>
</body>
</html>