<?php
$sqll=mysqli_query($con,"SELECT * FROM posts,users,saved_posts WHERE users.unique_id=saved_posts.postedby and saved_posts.post_id=posts.post_unique_id and saved=1 and saved_posts.user_unique_id='$user_identity' order by posts.date asc ");
				if ($sqll) {
					 if (mysqli_num_rows($sqll) >0) {
					 	while ($post=mysqli_fetch_array($sqll)) {
					 		$post_unique_id=$post['post_unique_id'];
					 		$user_to_follow=$post['unique_id'];
					 		?> 
					 		<?php include"posts.php"?>
					 		<?php
					 	}
					 }else{
					 	?> 
					 	<div class='d-flex flex-row error_post'>
							<div class='flex-fill'> 
								No content yet<br>
					 			start by saving users posts.
							</div> 
						</div>
					 	<?php
					 }
				}else{
					echo"<div class='alert error'>".$con->error."</div>";
				} 
					 
				