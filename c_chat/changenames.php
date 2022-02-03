<?php  
	
if (isset($_POST['change'])) {
	  
		$name=$_POST['nickname'];
	if (empty($user_receiver)) { 
		 $message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>error  required input</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

	}else{
		$selectc=mysqli_query($con,"SELECT * FROM nicknames where user_id='$user_identity' and user_id_r='$user_receiver'");
		if ($selectc) {
			if (mysqli_num_rows($selectc)>0) {
				$fet=mysqli_fetch_array($selectc); 
					$sqlupdate=mysqli_query($con,"UPDATE nicknames SET 	name='$name' where user_id='$user_identity' and user_id_r='$user_receiver'");
						if ($sqlupdate) {
							$message="<div class='d-flex flex-row success'>
										<div class='flex-fill'>nickname set</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
						}else{  
							$message="<div class='d-flex flex-row error'>
										<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
							}
					
			}else{

				$sqlinsert=mysqli_query($con,"INSERT INTO nicknames values('','$user_identity','$user_receiver','$name')");
					if ($sqlinsert) { 
						$message="<div class='d-flex flex-row success'>
										<div class='flex-fill'>nickname set</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

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

if (isset($_POST['remove'])) {
	$seldelete=mysqli_query($con,"DELETE FROM nicknames where user_id='$user_identity' and user_id_r='$user_receiver'");
	if ($seldelete) {
		$message="<div class='d-flex flex-row success'>
										<div class='flex-fill'>nickname deleted</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	}else{ 
			$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

		}
}
  
?>