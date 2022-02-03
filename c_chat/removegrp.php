<?php

if (isset($_POST['delete'])) {
 $gi=$_POST['group_id'];
$ai=$_POST['admin_id'];
$ui=$_POST['users_id'];
if ($gi=="" and $ai="" and $ui="") {
	header('location:exploregrps.php');
	
}else{  
	$sqldelete=mysqli_query($con,"DELETE FROM groups where groups.id='$gi'");
	if ($sqldelete) { 
				$message="<div class='alert alert-success'>Group deleted</div>";

			}else{ 
				$message="<div class='alert alert-danger'> Error deleting ".$con->error."</div>"; 

			}
	
	
	
}  
}
?>