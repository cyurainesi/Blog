<div style="overflow: auto;">
<?php 
$selectallusers=mysqli_query($con,"SELECT * FROM users,follow where  follow.following='$userimage' and follow.follow=1 and follow.follower=users.unique_id ");
		if ($selectallusers) {
			if (mysqli_num_rows($selectallusers)>0) {
				while ($fetchalluser=mysqli_fetch_array($selectallusers)) {
					$user_to_follow=$fetchalluser['unique_id'];
					?>
					<div class="d-flex flex-row">
						<div class=" text-white p-2  text-center ">
							<?php profileuser($fetchalluser['unique_id'],$fetchalluser['username'],$fetchalluser['username'])?>
						</div>
						<div class="flex-fill mt-3 ml-3">
							<a href="user.php?unique_id_profile=<?php echo($fetchalluser['username']) ?>"><?php echo$fetchalluser['username']?></a>
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
					<p>No follower yet</p>
				</div>
				<?php
			}
		}else{ 
			$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		}
		?>

</div>  