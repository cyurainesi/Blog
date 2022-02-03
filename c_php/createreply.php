<?php  
	
	if (isset($_POST['replyer'])) {
	 
	$unique_id=$_SESSION['login'];
	$reply_unique_idd=date('s').date('i').date('y').date('m'); 
	$date=date('Y-m-d h:i:s');
	$relpy=$_POST['reply'];
	$post_unique_id=$_POST['post_id'];
	$comment_id=$_POST['comment_id'];

	if (empty($relpy)) { 
		  echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error  required input</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	}else{
			$sqlinsert=mysqli_query($con,"INSERT INTO replys (`reply_unique_idd`, `user_unique_id`, `post_id`, `comment_unique_id`, `reply`, `date`) values('$reply_unique_idd','$unique_id','$post_unique_id','$comment_id','$relpy','$date')")or die($con->error);

			#mysqli_query($con, "INSERT INTO notifications VALUES('','$reply_unique_idd','$unique_id','','replys','$date','0','replied on this comment')");
			if ($sqlinsert) { 
				 echo"<div class='d-flex flex-row success'>
						<div class='flex-fill'>reply created</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
			}else{ 
				echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error creating reply</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

			}
}
}
  
?>