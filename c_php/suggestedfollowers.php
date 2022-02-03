 
<?php  
function followersuggestions($user_identity)
{
	include('conn.php');
	
$selectallusers=mysqli_query($con,"SELECT * FROM users,follow where  follow.following='$user_identity' and follow.follow=1 and follow.follower=users.unique_id limit 3");
		if ($selectallusers) {
			if (mysqli_num_rows($selectallusers)>0) {
				?> 
				<?php
				while ($fetchalluser=mysqli_fetch_array($selectallusers)) {
					$user_to_follow=$fetchalluser['unique_id'];
					?> 
							<small><a href="user.php?unique_id_profile=<?php echo($fetchalluser['username']) ?>"><?php echo$fetchalluser['username']?></a>, </small>
					 
					<?php
				}
				?>
				<small>started following</small>
				<?php
				 
			}else{

				 
			}
		}else{ 
			$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		}
		?>
  
<?php

}
?>