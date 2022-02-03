<?php 
	include('conn.php'); 
  
?>

<?php 
$user_error=""; 
$email_error="";  
$phone_error="";
if (isset($_POST['change'])) {
	$phone=$_POST['username'];
	$email=$_POST['email'];
	$date=date('Y-m-d h:i:s');
	if (empty($phone and $email)) {
		if(empty($phone)){
			$user_error="<div class='text-danger font-weight-bold'>Username required </div> ";
			echo"<div class='d-flex flex-row error'>
										<div class='flex-fill'>Username required </div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

		}elseif (empty($email)) {
			$email_error="<div class='text-danger font-weight-bold'>Email required </div> ";
			echo"<div class='d-flex flex-row error'>
										<div class='flex-fill'>Email required</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		}
		
	}else{

			$mysql=mysqli_query($con, "SELECT * FROM users where unique_id='$user_identity'");
			if ($mysql) {

				$result=mysqli_fetch_array($mysql);
				
   					if ( $result['username']!=$phone  and $result['email']!=$email){
   						$_SSESSION['create']=$phone;
   						$update=mysqli_query($con,"UPDATE users SET username='$phone',email='$email' where unique_id='$user_identity'"); 
   						 
   						if ($update) {
   						 echo"<div class='d-flex flex-row success'>
										<div class='flex-fill'>Profile changed</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>"; 
   						}else{

   							echo"<div class='d-flex flex-row error'>
										<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
   						}
      						 
								} 
					elseif($result['email']==$email){
					        $email_error= "<div class='text-danger font-weight-bold'>Email  Exist</div> "; 
					        echo"<div class='d-flex flex-row error'>
										<div class='flex-fill'>Email  Exist</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
						} 
						elseif( $result['username']==$phone) { 
							$user_error="<div class='text-danger font-weight-bold'>Username Exist </div> ";
							echo"<div class='d-flex flex-row error'>
										<div class='flex-fill'>Username Exist</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

						} 
			}else{
				echo $con->error;
			}
				}
    } 


?>



<?php
    if (isset($_POST['addbio'])) {
	$bio=$_POST['bio']; 
		if(empty($bio)){
			$user_error="<div class='text-danger font-weight-bold'>bio required </div> ";
			echo"<div class='d-flex flex-row error'>
										<div class='flex-fill'>bio required </div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

		}else{
			$update=mysqli_query($con,"UPDATE users SET bio='$bio' where unique_id='$user_identity'"); 
   						 
   						if ($update) {
   						 echo"<div class='d-flex flex-row success'>
										<div class='flex-fill'>Bio changed</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>"; 
   						}else{

   							echo"<div class='d-flex flex-row error'>
										<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
   						}

		}}

 ?>








<?php
 
if(isset($_POST["save_profile"])) {

	$profile_id=date('s').date('l').date('y').date('m'); 

	$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["images"]["name"]);
$uploadOk = 1;
$image=$_FILES["images"]["name"];
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
if ($_FILES["images"]["size"] > 128403041) { 
     echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, your file is too large.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
    $uploadOk = 0;
}else{
 
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    
	echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	    $uploadOk = 0;
	}else{ 
		if ($uploadOk == 0) { 
		    echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, your file was not uploaded</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		 
		} else {
		    if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) { 
		    	$mysql=mysqli_query($con, "SELECT * FROM profile where user_id='$user_identity'");
		    	if (mysqli_num_rows($mysql)>0) {
		    		$sqlpudate=mysqli_query($con,"UPDATE profile SET profile='$image' where user_id='$user_identity'");
					if ($sqlpudate) { 
						echo"<div class='d-flex flex-row success'>
						<div class='flex-fill'>The profile  has been changed.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
					}else{ 
						echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error uploading image.".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
					}
		    	}else{
		    		$sqlinsert=mysqli_query($con,"INSERT INTO profile values('$profile_id','$user_identity','$image')");
					if ($sqlinsert) { 
						echo"<div class='d-flex flex-row success'>
						<div class='flex-fill'>The profile  has been uploaded.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
					}else{ 
						echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error uploading image.".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
					}
		    	}
		        


		    } else {
		    	echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, there was an error uploading your file.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		       
		    }
		}


	}
}


}
?>




<?php 
$user_error=""; 
$email_error="";  
if (isset($_POST['change_phone'])) {
	$phone=$_POST['phone']; 
	$date=date('Y-m-d h:i:s');
	if (empty($phone)) {
		if(empty($phone)){
			$phone_error="<div class='text-danger font-weight-bold'>phone required </div> ";
			echo"<div class='d-flex flex-row error'>
										<div class='flex-fill'>phone required </div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

		}
		
	}else{

			$mysql=mysqli_query($con, "SELECT * FROM users where unique_id='$user_identity'");
			if ($mysql) {

				$result=mysqli_fetch_array($mysql);
				
   					if ( $result['phone']!=$phone ){
   						$_SSESSION['create']=$phone;
   						$update=mysqli_query($con,"UPDATE users SET phone='$phone' where unique_id='$user_identity'"); 
   						 
   						if ($update) {
   						 echo"<div class='d-flex flex-row success'>
										<div class='flex-fill'>Phone changed</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>"; 
   						}else{

   							echo"<div class='d-flex flex-row error'>
										<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
   						}
      						 
								}  
						elseif( $result['phone']==$phone) { 
							$phone_error="<div class='text-danger font-weight-bold'>phone Exist </div> ";
							echo"<div class='d-flex flex-row error'>
										<div class='flex-fill'>Phone Exist</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

						} 
			}else{
				echo $con->error;
			}
				}
    } 

 ?>