<?php
			include("./connectdb.php");
?>
<!-- content ------------------------->
<?php
	date_default_timezone_set("asia/bangkok");
	$event_id=$_POST['event_id'];
	$event_name=$_POST['event_name'];
	$event_date=$_POST['event_date1'];
	$event_hour=$_POST['event_hour1'];
	$event_minute=$_POST['event_minute1'];
	//โค๊ดแปลง date
	//$day = strtotime($date);
	//$news_date = date("d/m/Y", $day);
	
		$sql="insert into event values ('$event_id','$event_name','$event_date','$event_hour','$event_minute');";
		//echo $sql."<br>";
		//echo "1"."<br>";
		$mysqli->query($sql);

?>
<meta http-equiv="refresh" content="0; url=./showeventtoadd.php">