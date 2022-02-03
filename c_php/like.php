<?php  
	if (isset($_POST['like'])) {
	 
	$user_unique_id=$_SESSION['login']; 
	$like_unique_id=date('s').date('i').date('y').date('m'); 
	$date=date('Y-m-d h:i:s');
	$liked=1;
	$post_id=$_POST['post_id'];

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
						if ($sqlupdate) {
							echo"<div class='d-flex flex-row success'>
										<div class='flex-fill'>Loved</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
							
	 
						}else{  
							echo"<div class='d-flex flex-row error'>
										<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
							}
					}elseif($fet['liked']==1){
							$sqlupdate=mysqli_query($con,"UPDATE likes SET liked=0 where user_unique_id='$user_unique_id' and post_id='$post_id'");
						if ($sqlupdate) { 
							echo"<div class='d-flex flex-row success'>
										<div class='flex-fill'>Hated</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
						}else{
							echo"<div class='error'>".$con->error."</div>";
							}
					}
			}else{

				$sqlinsert=mysqli_query($con,"INSERT INTO likes values('$like_unique_id','$liked','$user_unique_id','$post_id','$date')");
				mysqli_query($con, "INSERT INTO notifications VALUES('$like_unique_id','user_unique_id','$like_unique_id','likes','$date','0','liked')");
					if ($sqlinsert) { 
						echo"<div class='d-flex flex-row success'>
										<div class='flex-fill'>Loved</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

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