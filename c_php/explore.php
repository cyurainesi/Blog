 
<?php
			$sqll=mysqli_query($con,"SELECT * FROM posts,users,likes where posts.user_unique_id=users.unique_id and likes.post_id=posts.post_unique_id  and likes.user_unique_id=users.unique_id order by likes.date desc");
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
					 		<div class="col-lg-12 text-center">
					 			<h3 class="text-white">No posts yet</h3>
					 		</div>
					 	</div>
					 	<?php
					 }
				}else{
					echo"<div class='alert error'>".$con->error."</div>";
				} 
					 
				
			?> 