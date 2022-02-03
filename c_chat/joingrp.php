<?php

if (isset($_POST['Join'])) {
 $gi=$_POST['group_id'];
$ai=$_POST['admin_id'];
$ui=$_POST['users_id'];
if ($gi=="" and $ai="" and $ui="") {
	header('location:exploregrps.php');
	
}else{ 
	$sqlect=mysqli_query($con, "SELECT * FROM grp_users where grp_id='$gi' and 	user_id='$ui' ")or die($con->error);
	if (mysqli_num_rows($sqlect) >0) { 
		$sqldelete=mysqli_query($con,"DELETE FROM grp_users where grp_id='$gi' and user_id='$ui'");
		if ($sqldelete) {
			 $message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>You left </div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		}else{
			$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error occured </div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

		}
		
	}else{
		$sqlinsert=mysqli_query($con,"INSERT INTO grp_users values('','$gi','$ai','$ui')");
	if ($sqlinsert) { 
				$message="<div class='d-flex flex-row success'>
						<div class='flex-fill'>Joined.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

			}else{  
				$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error sending info !.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

			}
	}
	
	
} 
}
?>


<?php echo($message)?>
