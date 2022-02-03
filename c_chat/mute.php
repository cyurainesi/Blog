<?php  
	if (isset($_POST['mute'])) {
	$muted_unique_id=date('s').date('i').date('y').date('m');
	if (empty($user_receiver)) { 
		 $message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>error  required input</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

	}else{
		$selectc=mysqli_query($con,"SELECT * FROM muted_users where user_unique_id='$user_identity' and user_unique_id_m='$user_receiver'");
		if ($selectc) {
			if (mysqli_num_rows($selectc)>0) {
				$fet=mysqli_fetch_array($selectc);
				if ($fet['muted']==0) { 
					$sqlupdate=mysqli_query($con,"UPDATE muted_users SET muted=1  where user_unique_id='$user_identity' and user_unique_id_m='$user_receiver'");
						if ($sqlupdate) {
							$message="<div class='d-flex flex-row success'>
										<div class='flex-fill'>Muted</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
						}else{  
							$message="<div class='d-flex flex-row error'>
										<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
							}
					}elseif($fet['muted']==1){
							$sqlupdate=mysqli_query($con,"UPDATE muted_users SET muted=0  where user_unique_id='$user_identity' and user_unique_id_m='$user_receiver'");
						if ($sqlupdate) { 
							$message="<div class='d-flex flex-row success'>
										<div class='flex-fill'>Unmuted</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
						}else{
							$message="<div class='d-flex flex-row error'>
								<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
							}
					}
			}else{

				$sqlinsert=mysqli_query($con,"INSERT INTO muted_users values('$muted_unique_id','$user_identity','$user_receiver',1)");
					if ($sqlinsert) { 
						$message="<div class='d-flex flex-row success'>
										<div class='flex-fill'>Muted</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

					}else{ 
						$message="<div class='d-flex flex-row error'>
								<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

						}

				}
			

		}else{ 
			$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

		}
			
}
}
  
?>