<?php 
session_start();
include('conn.php');

if (empty($_POST['messages'] or $_FILES['images'])) {
	echo"No arguments provided";
}else{

$message_unique_id=date('s').date('i').date('y').date('m');
	$date=date('Y-m-d h:i:s');
	$user_identity=$_POST['user_identity'];
	$user_receiver=$_POST['user_receiver'];

 if(!empty($_POST['messages'])){
	
	$message=$_POST['messages'];

	if($_POST['type']==0){
 
	$sqlinsert=mysqli_query($con,"INSERT INTO messages values('','$user_identity','$user_receiver','$message','',0,'$date','')"); 
			if ($sqlinsert) { 
				echo"";
			}else{ 
				echo" Error sending message ";

			}
		}elseif($_POST['type']==1){

		$sqlinsert=mysqli_query($con,"INSERT INTO grp_messages values('','$user_identity','$user_receiver','$message','',0,'$date')"); 
			if ($sqlinsert) { 
				echo"";
			}else{ 
				echo" Error sending message";

			}

		}
	} 
	elseif(!empty($_FILES["images"])){  
  
	$target_dir = "chat_images/";
$target_file = $target_dir . basename($_FILES["images"]["name"]);
$uploadOk = 1;
$image=$_FILES["images"]["name"];
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 
if ($_FILES["images"]["size"] > 1000000000000) { 
     echo" Sorry, your file is too large. ";
    $uploadOk = 0;
}else{

		// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    
	echo" Sorry, only JPG, JPEG, PNG & GIF files are allowed. ";
	    $uploadOk = 0;
	}else{ 
		if ($uploadOk == 0) { 
		    echo" Sorry, your file was not uploaded ";
		 
		} else {
		    if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) { 
		      
		      if($_POST['type']==0){
 
	$sqlinsert=mysqli_query($con,"INSERT INTO messages values('','$user_identity','$user_receiver','','$image',0,'$date','')"); 
			if ($sqlinsert) { 
				echo"";
			}else{ 
				echo" Error sending message ";

			}
		}elseif($_POST['type']==1){

		$sqlinsert=mysqli_query($con,"INSERT INTO grp_messages values('','$user_identity','$user_receiver','','$image',0,'$date')"); 
			if ($sqlinsert) { 
				echo"";
			}else{ 
				echo" Error sending message";

			}

		}


		    } else {
		    	echo" Sorry, there was an error uploading your file. ";
		       
		    }
		}


	}
}


}else{
	echo"No arguments provided !";
}
}

?>