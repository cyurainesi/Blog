<?php
	include('header.php');
	if (isset($_GET['post_unique_id'])) {
		$post_unique_id=$_GET['post_unique_id'];
	}else{
			$post_unique_id="";
	}
?>
	<div class="container-fluid mb-5"  id="mySite">
		<div class="row p-2">  
			<div class="col-lg-12">
				<div class="row">  
					<div class="col-lg-12">
						<div class="row justify-content-center">
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-12">
								<?php

	$sqll=mysqli_query($con,"SELECT * FROM posts,users where posts.user_unique_id=users.unique_id  and posts.post_unique_id='$post_unique_id' order by posts.id desc");
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
			 	<div class="row mt-4">
			 		<div class="col-lg-12 text-center">
			 			<h3 class="">No posts yet</h3>
			 		</div>
			 	</div>
			 	<?php
			 }
		}else{
			echo"<div class='alert error'>".$con->error."</div>";
		} 
			 
		
	?>								</div>
									<div class="col-lg-12 mt-3"> 
										More posts related to this
										<hr>
<?php
	$sqll=mysqli_query($con,"SELECT * FROM posts,users where posts.user_unique_id=users.unique_id  and posts.user_unique_id='$user_to_follow' and posts.post_unique_id!='$post_unique_id' order by posts.id desc");
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
			 	<?php
			 }
		}else{
			echo"<div class='alert error'>".$con->error."</div>";
		} 
			 
		
	?>
							 
									</div>
								</div>
							</div>  
						</div> 
					</div> 
					
				</div>
			</div>
		</div>
	</div>

</body>
</html>