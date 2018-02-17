<?php
	session_start();
	
	$add_user1=$_POST['add_user'];
	$add_password1=$_POST['add_password'];

	if($add_user1=="admin"&&$add_password1=="1234"){ 	
		$status=1;
	}
	if($add_user1!="admin"&&$add_password1!="1234"){ 	
		$status=3;
	}//แก้ไข ครั้งที่2 เพื่อเทสการใช้งาน git
	else{
		$status=2;
	}
	$_SESSION['status']=$status;
?>
<meta http-equiv="refresh" content="0; url=./firstpage_admin.php">