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
	$news_oldimage=$_POST['news_oldimage'];
	$news_image2=$_POST['news_image2'];
	$news_oldimage2=$_POST['news_oldimage2'];
	$news_image3=$_POST['news_image3'];
	$news_oldimage3=$_POST['news_oldimage3'];	
	$news_oldshowdate=$_POST['news_oldshowdate1'];
	$news_deleteimage=$_POST['news_deleteimage'];
	$news_deleteimage2=$_POST['news_deleteimage2'];
	$news_deleteimage3=$_POST['news_deleteimage3'];
	
	//echo $news_oldshowdate."<br>";

	//$day = strtotime($date);
	//$news_date = date("d/m/Y", $day);
	
	$sql="update news set news_name='$news_name',news_data='$news_data' where news_id='$news_id'";
	//echo $sql."<br>";
	$mysqli->query($sql);
	
	$sql="update news set news_showdate='$news_oldshowdate' where news_id='$news_id'";
	//echo $sql."<br>";
	$mysqli->query($sql);
			
	if($news_image=="")
		{
			$sql="update news set news_image='$news_oldimage' where news_id='$news_id'";
			//echo $sql."<br>";
			//echo "1"."<br>";
			$mysqli->query($sql);
		}
	if($news_image!="")
		{
			$sql="update news set news_image='$news_image' where news_id='$news_id'";
			//echo $sql."<br>";
			//echo "2"."<br>";
			$mysqli->query($sql);
		}
	if($news_image2=="")
		{
			$sql="update news set news_image2='$news_oldimage2' where news_id='$news_id'";
			//echo $sql."<br>";
			//echo "3"."<br>";
			$mysqli->query($sql);
		}
	if($news_image2!="")
		{
			$sql="update news set news_image2='$news_image2' where news_id='$news_id'";
			//echo $sql."<br>";
			//echo "4"."<br>";
			$mysqli->query($sql);
		}
	if($news_image3=="")
		{
			$sql="update news set news_image3='$news_oldimage3' where news_id='$news_id'";
			//echo $sql."<br>";
			//echo "5"."<br>";
			$mysqli->query($sql);
		}
	if($news_image3!="")
		{
			$sql="update news set news_image3='$news_image3' where news_id='$news_id'";
			//echo $sql."<br>";
			//echo "6"."<br>";
			$mysqli->query($sql);
		}
	if($news_deleteimage!="")
		{
			$sql="UPDATE news SET news_image='' where news_id='$news_id'";
			//echo $sql;exit();
			//echo "7"."<br>";
			$mysqli->query($sql);
		}
	if($news_deleteimage2!="")
		{
			$sql="UPDATE news SET news_image2='' where news_id='$news_id'";
			//echo $sql;exit();
			//echo "8"."<br>";
			$mysqli->query($sql);
		}
	if($news_deleteimage3!="")
		{
			$sql="UPDATE news SET news_image3='' where news_id='$news_id'";
			//echo $sql;exit();
			//echo "9"."<br>";
			$mysqli->query($sql);
		}
	else
		{		
		}
	
	//echo $sql;exit();
		
?>	
<meta http-equiv="refresh" content="0; url=./shownewstoadd.php">
