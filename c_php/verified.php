<?php

 function verified($user)
{
	include('conn.php');	 
	$selectallusers=mysqli_query($con,"SELECT count(follower) as follower FROM users,follow where follow.following='$user' and follow.follow=1 and follow.follower=users.unique_id");
	$systemusers=mysqli_query($con,"SELECT count(unique_id) as userss FROM users");
	if (mysqli_num_rows($systemusers) > 0) {
		$fetsystemusers=mysqli_fetch_array($systemusers); 
		 $fetchalluser=mysqli_fetch_array($selectallusers);

 $selectallallpost=mysqli_query($con,"SELECT count(post_unique_id) as totalpost FROM posts ");


		 $selectalluserspost=mysqli_query($con,"SELECT count(post_unique_id) as total FROM posts where posts.user_unique_id='$user'");  
		 $fetchallpost=mysqli_fetch_array($selectallallpost); 
			$fetchalluserpost=mysqli_fetch_array($selectalluserspost);

		$totaloverhunderdpost=($fetchalluserpost['total']*100)/($fetchallpost['totalpost']);

			
			$totaloverhunderd=(($fetchalluser['follower']+$fetchalluserpost['total'])*100)/($fetsystemusers['userss']+$fetchallpost['totalpost']);

			if ($totaloverhunderd > 20) {
				echo('<small title="verified"><i class="fa fa-check-circle" id="verified" ></i></small>');
				 
			}else{ 
			}
	}else{

	}
		
}
?>

