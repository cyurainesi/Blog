<?php

$sqll=mysqli_query($con,"SELECT * FROM posts,users where posts.user_unique_id=users.unique_id and posts.post like'%#$hashtags%' order by posts.date desc")or die($con->error);

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
					 	<div class="row">
					 		<div class="mt-5 p-5">
								<h3>No content available</h3>
								<a href="index.php" class="border p-2">Back home</a>
							</div>
					 	</div>
					 	<?php
					 }
				}else{
					echo"<div class='alert error'>".$con->error."</div>";
				} 
					 
				