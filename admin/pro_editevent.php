<?php
			include("./connectdb.php");
?>
<!-- content ------------------------->
<?php
	date_default_timezone_set("asia/bangkok");
	$event_id=$_POST['event_id'];
	$event_name1=$_POST['event_name'];
	$event_olddate1=$_POST['event_olddate'];
	$event_date1=$_POST['event_date'];
	$event_hour1=$_POST['event_hour'];
	$event_minute1=$_POST['event_minute'];

	//$day = strtotime($date);
	//$news_date = date("d/m/Y", $day);
	
	$sql="update event set event_name='$event_name1',event_hour='$event_hour1',event_minute='$event_minute1' where event_id='$event_id'";
	//echo $sql."<br>";
	$mysqli->query($sql);
		
	if($event_date1=="")
		{
			$sql="update event set event_date='$event_olddate1' where event_id='$event_id'";
			//echo $sql."<br>";
			//echo "1"."<br>";
			$mysqli->query($sql);
		}
	if($event_date1!="")
		{
			$sql="update event set event_date='$event_date1' where event_id='$event_id'";
			//echo $sql."<br>";
			//echo "2"."<br>";
			$mysqli->query($sql);
		}
	
	else
		{		
		}
	
	//echo $sql;exit();
		
?>	
<meta http-equiv="refresh" content="0; url=./showeventtoadd.php">
