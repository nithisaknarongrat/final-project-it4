<?php
			include("./connectdb.php");
?>
<!-- content ------------------------->

<?php
	$news_id=$_GET['event_id'];
	
	$sql="delete from event where event_id='$event_id'; ";
	//echo $sql;exit();
	$mysqli->query($sql);	
?>		
<meta http-equiv="refresh" content="0; url=./showeventtoadd.php">
