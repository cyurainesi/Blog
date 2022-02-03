
<?php  
	
	if (isset($_POST['saved_post'])) {
	 
	$unique_id=$_SESSION['login'];
	$comment_unique_id=date('s').date('i').date('y').date('m'); 
	$date=date('Y-m-d h:i:s'); 
	$post_unique_id=$_POST['post_id'];
	$postedby=$_POST['postedby'];

	if (empty($post_unique_id)) { 
		  echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error  required input</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	}else{


		$sqll=mysqli_query($con,"SELECT * FROM posts,users,saved_posts WHERE users.unique_id=saved_posts.user_unique_id and saved_posts.post_id=posts.post_unique_id and saved_posts.user_unique_id='$user_identity'  and saved_posts.post_id='$post_unique_id' ");
				if ($sqll) {
					 if (mysqli_num_rows($sqll) >0) {
					 	$fettete=mysqli_fetch_array($sqll);

					 	if ($fettete['saved']==0) {
					 		
					 		 $sqlupdateed=mysqli_query($con,"UPDATE saved_posts set saved=1 where user_unique_id='$user_identity' and post_id='$post_unique_id' ")or die($con->error) ;

								if ($sqlupdateed) { 
									 echo"<div class='d-flex flex-row success'>
											<div class='flex-fill'>Post saved</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
								}else{ 
									echo"<div class='d-flex flex-row error'>
											<div class='flex-fill'>Error Saving Post</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

								}

					 	}else{
 
					 $sqlupdateed=mysqli_query($con,"UPDATE saved_posts set saved=0 where user_unique_id='$user_identity' and post_id='$post_unique_id' ")or die($con->error) ;

			if ($sqlupdateed) { 
				 echo"<div class='d-flex flex-row success'>
						<div class='flex-fill'>Post Unsaved</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
			}else{ 
				echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error Unsaving Post</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

			}
		}

			
}else{

	$sqlinsert=mysqli_query($con,"INSERT INTO saved_posts values('',1,'$unique_id','$postedby','$post_unique_id','$date')");

			if ($sqlinsert) { 
				 echo"<div class='d-flex flex-row success'>
						<div class='flex-fill'>Post saved</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
			}else{ 
				echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error Saving Post</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

			}


}
}else{
	echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error Saving Post".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
}
}
}
  
?>