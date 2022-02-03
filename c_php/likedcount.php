
<?php
$selectc=mysqli_query($con,"SELECT count(like_unique_id) AS totalcount FROM likes,posts,users where posts.post_unique_id=likes.post_id and likes.user_unique_id=users.unique_id and posts.post_unique_id='$post_unique_id' and liked=1");
		if ($selectc) {
			if (mysqli_num_rows($selectc)>0) {
				$fetchlikes=mysqli_fetch_array($selectc);
				
				if ($fetchlikes['totalcount']==0) {
				 
				}else{
					echo($fetchlikes['totalcount']); 
				}
			}
		}else{ 
			$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		}
?>