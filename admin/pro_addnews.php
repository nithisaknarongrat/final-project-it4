<?php
			include("./connectdb.php");
?>
<!-- content ------------------------->
<?php
	date_default_timezone_set("asia/bangkok");
	$news_id=$_POST['news_id'];
	$news_name=$_POST['news_name'];
	$news_data=$_POST['news_data'];
	$news_image=$_POST['news_image'];
	$news_image2=$_POST['news_image2'];
	$news_image3=$_POST['news_image3'];
	$news_showdate=$_POST['news_showdate'];
	
	//โค๊ดแปลง date
	//$day = strtotime($date);
	//$news_date = date("d/m/Y", $day);
	
	//หา ID ใหม่ โดยหาค่า Max มาบวก 1
	$sqlmax = "select max(news_id) as maxid from news"; 
		//send sql to process
		$result = $mysqli->query($sqlmax) or die($mysqli->error.__LINE__);
		while($row = mysqli_fetch_array($result)) {
			$maxid=$row["maxid"];
		}
		$news_id=$maxid+1;
	
	$sql="insert into news values ('$news_id','$news_name','$news_data','$news_image','$news_image2','$news_image3','$news_showdate');";
	//echo $sql;exit();
	$mysqli->query($sql);

?>
<meta http-equiv="refresh" content="0; url=./shownewstoadd.php">