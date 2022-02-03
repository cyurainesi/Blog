
<?php
$selectc=mysqli_query($con,"SELECT count(comment_unique_id	) AS totalcount FROM comments,posts,users where posts.post_unique_id=comments.post_id and comments.user_unique_id=users.unique_id and posts.post_unique_id='$post_unique_id'");
		if ($selectc) {
			if (mysqli_num_rows($selectc)>0) {
				$fetchcommented=mysqli_fetch_array($selectc);
				
				if ($fetchcommented['totalcount']==0) {
				 
				}else{
					echo($fetchcommented['totalcount']);
				}
			}
		}else{ 
			$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		}
?>