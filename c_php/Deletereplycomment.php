<?php
function deleteall($id,$user_identity,$con)
{
	if (isset($_POST['deletecomment'])) {
	$comment_id=$_POST['comment_unique_id']; 	 
	$sqldelete=mysqli_query($con,"DELETE FROM comments where comment_unique_id='$id' and user_unique_id='$user_identity'");
	if ($sqldelete) {
		echo"<div class='d-flex flex-row success'>
					<div class='flex-fill'>Comments deleted</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
					echo "<meta charset='utf-8' http-equiv='refresh' content='0.01;'>";
	}else{
		echo"<div class='d-flex flex-row error'>
					<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	}
}

} 


?>