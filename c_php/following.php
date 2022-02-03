<?php 
$selectfolllowingusers=mysqli_query($con,"SELECT * FROM users,follow where  follow.follower='$userimage' and follow.follow=1 and follow.following=users.unique_id");
		if ($selectfolllowingusers) {
			if (mysqli_num_rows($selectfolllowingusers)>0) {
				while ($fetchfollowingss=mysqli_fetch_array($selectfolllowingusers)) {
					$user_to_follow=$fetchfollowingss['unique_id'];
					?>
					<div class="d-flex flex-row">
						<div class=" text-white p-2  text-center">
							<?php profileuser($fetchfollowingss['unique_id'],$fetchfollowingss['username'],$fetchfollowingss['username'])?>
						</div>
						<div class="flex-fill mt-3 ml-3"> 
							<a href="user.php?unique_id_profile=<?php echo($fetchfollowingss['username']) ?>"><?php echo$fetchfollowingss['username']?></a>
						</div>
						<div class="mt-3">
						 <?php include"c_php/followbtn.php"?>
						</div>
					</div>
					<hr>
					<?php
				}
				 
			}else{
				?>
				<div class="text-muted">
					<p>No users found</p>
				</div>
				<?php
			}
		}else{ 
			$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		}
	
?>