<?php
			$sqll=mysqli_query($con,"SELECT * FROM posts,users where posts.user_unique_id=users.unique_id and posts.user_unique_id='$userimage' order by posts.id desc");
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
					 	<div class='row  justify-content-center'>
							<div class='col-lg-10	 error_post'>
								<p>No content found<br>
									start by creating new content or follow more users.
								</p>
								<a href="explore.php" class="font-weight-bold text-white">Find more</a>
							</div>
						</div>
					<?php
					 }
				}else{
					echo"<div class='alert error'>".$con->error."</div>";
				} 
					 
				
			?>