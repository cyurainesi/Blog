<?php  
	
	if (isset($_POST['commenter'])) {
	 
	$unique_id=$_SESSION['login'];
	$comment_unique_id=date('s').date('i').date('y').date('m'); 
	$date=date('Y-m-d h:i:s');
	$comment=$_POST['comment'];
	$post_unique_id=$_POST['post_id'];
	if (empty($comment)) { 
		  echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error  required input</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	}else{
			$sqlinsert=mysqli_query($con,"INSERT INTO comments (`comment_unique_id`, `user_unique_id`, `post_id`, `comment`, `date`) values('$comment_unique_id','$unique_id','$post_unique_id','$comment','$date')");
			#mysqli_query($con, "INSERT INTO notifications VALUES('','$comment_unique_id','$unique_id','','comments','$date','0','commented on this post')");
			if ($sqlinsert) { 
				 echo"<div class='d-flex flex-row success'>
						<div class='flex-fill'>comment created</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

			}else{ 
				echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error creating comment</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

			}
}
}
  
?>