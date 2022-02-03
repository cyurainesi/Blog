<?php 
$selectcfollowing=mysqli_query($con,"SELECT * FROM users,follow where follow.following='$user_to_follow' and follow.follower='$user_identity' and (users.unique_id=follow.following or users.unique_id=follow.follower) and follow.follow= 1 ");
		if ($selectcfollowing) {
			if (mysqli_num_rows($selectcfollowing)>0) { 
				$label="<span class='unfollow'>Unfollow</span>";
				$title="Unfollow"; 
				$style="following";
			}else{
				$label="<span class='followed'>Follow</span>";
				$title="Follow";
				$style="follow";
			}
		}else{
			echo"<div class='d-flex flex-row error'>
					<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		}
?>

<form method="POST" title="<?php echo($title)?>" class="pl-2">
	<input type="text" name="user_to_follow" value="<?php echo($user_to_follow)?>" hidden> 
	<button type="submit" name="follow" class="btn <?php echo$style?> btn-sm ">
		<?php echo$label?> 
	</button>
</form>
 
