<?php 
function Followers($user_to_follow,$con)
{
	 $selectallusers=mysqli_query($con,"SELECT count(follower) as follower FROM users,follow where follow.following='$user_to_follow' and follow.follow=1 and follow.follower=users.unique_id");
	$fetchalluser=mysqli_fetch_array($selectallusers);
	echo($fetchalluser['follower']);
}

?>