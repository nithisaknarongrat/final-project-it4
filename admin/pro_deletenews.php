<?php
			include("./connectdb.php");
?>
<!-- content ------------------------->

<?php
	$news_id=$_GET['news_id'];
	
	$sql="delete from news where news_id='$news_id'; ";
	//echo $sql;exit();
	$mysqli->query($sql);	
?>		
<meta http-equiv="refresh" content="0; url=./shownewstoadd.php">
