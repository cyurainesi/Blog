<?php 
if (isset($_POST['delete'])) {
	$post_unique_id=$_POST['uni_id'];
	$selectallusers=mysqli_query($con,"SELECT * FROM  users where users.unique_id='$user_identity'");
	$fetchalluser=mysqli_fetch_array($selectallusers);

$selectallpost=mysqli_query($con,"SELECT * FROM  posts where user_unique_id='$user_identity'")or die($con->error);
	$fetchallpost=mysqli_fetch_array($selectallusers);

	 
	$sqldelete=mysqli_query($con,"DELETE FROM posts where post_unique_id='$post_unique_id' and user_unique_id='$user_identity'");
	if ($sqldelete) {
		echo"<div class='d-flex flex-row success'>
					<div class='flex-fill'>Post deleted</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
					
	}else{
		echo"<div class='d-flex flex-row error'>
					<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	}

}
?>