<?php 
function auto_like($user)
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

			if ($totaloverhunderd > 30) { 
				$selectalluserspost=mysqli_query($con,"SELECT * FROM posts where posts.user_unique_id='$user'"); 
				if (mysqli_num_rows($selectalluserspost)>0) {
					while($postlits=mysqli_fetch_array($selectalluserspost)){
						$poests=$postlits['post_unique_id'];  
						 
 
	 
	$user_unique_id=$_SESSION['login']; 
	$like_unique_id=date('s').date('i').date('y').date('m'); 
	$date=date('Y-m-d h:i:s');
	$liked=1;
	$post_id=$poests;
	if ($user!=$user_unique_id) { 
	if (empty($post_id)) { 
		 echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'> error  required input</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	}else{
		$selectc=mysqli_query($con,"SELECT * FROM likes where post_id='$post_id' and user_unique_id='$user_unique_id'");
		if ($selectc) {
			if (mysqli_num_rows($selectc)>0) {
				$fet=mysqli_fetch_array($selectc);
				if ($fet['liked']==0) { 
					$sqlupdate=mysqli_query($con,"UPDATE likes SET liked=1 where user_unique_id='$user_unique_id' and post_id='$post_id'"); 
					}elseif($fet['liked']==1){
							$sqlupdate=mysqli_query($con,"UPDATE likes SET liked=1 where user_unique_id='$user_unique_id' and post_id='$post_id'");
						 
					}
			}else{

				$sqlinsert=mysqli_query($con,"INSERT INTO likes values('$like_unique_id','$liked','$user_unique_id','$post_id','$date')");
				mysqli_query($con, "INSERT INTO notifications VALUES('$like_unique_id','user_unique_id','$like_unique_id','likes','$date','0','liked ')");
				 

				}
			

		}else{ 
			echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

		}
			

}
}
   	}
				 
			}

			}else{ 
			}
	}else{

	}


}

?>