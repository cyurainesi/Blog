<?php  
	if (isset($_POST['follow'])) {
	 
	$user_unique_id=$_SESSION['login']; 
	$follow_unique_id=date('s').date('i').date('y').date('m'); 
	$date=date('Y-m-d h:i:s');
	$follow=1;
	$user_to_follow=$_POST['user_to_follow'];

	if (empty($user_to_follow)) { 
		 echo"<div class='d-flex flex-row error'>
										<div class='flex-fill'>error  required input</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

	}else{
		$selectc=mysqli_query($con,"SELECT * FROM follow where following='$user_to_follow' and follower='$user_unique_id'");
		if ($selectc) {
			if (mysqli_num_rows($selectc)>0) {
				$fet=mysqli_fetch_array($selectc);
				if ($fet['follow']==0) { 
					$sqlupdate=mysqli_query($con,"UPDATE follow SET follow=1 where   following='$user_to_follow' and follower='$user_unique_id'");
					mysqli_query($con, "INSERT INTO notifications VALUES('','$follow_unique_id','$user_unique_id','$user_to_follow','follow','$date','0','Started following you ')");
				
						if ($sqlupdate) {
							echo"<div class='d-flex flex-row success'>
										<div class='flex-fill'>Following</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
						}else{  
							echo"<div class='d-flex flex-row error'>
										<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
							}
					}elseif($fet['follow']==1){
							$sqlupdate=mysqli_query($con,"UPDATE follow SET follow=0 where  following='$user_to_follow' and follower='$user_unique_id'");
							mysqli_query($con, "INSERT INTO notifications VALUES('','$follow_unique_id','$user_unique_id','$user_to_follow','follow','$date','0','Unfollowed you')");
				
						if ($sqlupdate) { 
							echo"<div class='d-flex flex-row success'>
										<div class='flex-fill'>Unfollowed</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
						}else{
							echo"<div class='d-flex flex-row error'>
								<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
							}
					}
			}else{

				$sqlinsert=mysqli_query($con,"INSERT INTO follow values('$follow_unique_id','$follow','$user_unique_id','$user_to_follow')");
				
				mysqli_query($con, "INSERT INTO notifications VALUES('','$follow_unique_id','$user_unique_id','$user_to_follow','follow','$date','0','Started following you  ')");

					if ($sqlinsert) { 
						echo"<div class='d-flex flex-row success'>
										<div class='flex-fill'>Following</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

					}else{ 
						echo"<div class='d-flex flex-row error'>
								<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

						}

				}
			

		}else{ 
			echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

		}
			
}
}
  
?>