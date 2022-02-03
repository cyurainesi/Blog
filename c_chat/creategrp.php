<?php  
if (isset($_POST['create'])) {

if (empty($_POST['name'])) {
 	$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>No arguments Provided !.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	 
}else{
	if (empty($_POST['Desrciption'])) { 
		$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>No arguments Provided !.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	 
	}else{
	$grp_unique_id=date('s').date('i').date('y').date('m');
	$date=date('Y-m-d h:i:s'); 
	$Desrciption=$_POST['Desrciption'];
	$name=$_POST['name'];

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["images"]["name"]);
$uploadOk = 1;
$image=$_FILES["images"]["name"];
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if ($_FILES["images"]["size"] > 500000) { 
     $message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, your file is too large.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
    $uploadOk = 0;
}else{

		// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    
	$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	    $uploadOk = 0;
	}else{ 
		if ($uploadOk == 0) { 
		    $message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, your file was not uploaded</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		 
		} else {
		    if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {  
			$sqlinsert=mysqli_query($con,"INSERT INTO groups values('$grp_unique_id','$user_identity','','$Desrciption','$image','$name')"); 
			if ($sqlinsert) { 
				$message="<div class='d-flex flex-row success'>
						<div class='flex-fill'>Group created now.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";


			}else{  
				$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error sending grp info!</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

			}



		    } else {
		    	$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, there was an error uploading your file.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		       
		    }
		}


	}
}
	
		}
	}
}


  
if (isset($_POST['changeergrp'])) {

if (empty($_POST['name'])) {
 	$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>No arguments Provided !.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	 
}else{
	if (empty($_POST['Desrciption'])) { 
		$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>No arguments Provided !.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	 
	}else{
	$grp_unique_id=date('s').date('i').date('y').date('m');
	$date=date('Y-m-d h:i:s'); 
	$Desrciption=$_POST['Desrciption'];
	$name=$_POST['name'];

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["images"]["name"]);
$uploadOk = 1;
$image=$_FILES["images"]["name"];
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if ($_FILES["images"]["size"] > 500000) { 
     $message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, your file is too large.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
    $uploadOk = 0;
}else{

		// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    
	$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	    $uploadOk = 0;
	}else{ 
		if ($uploadOk == 0) { 
		    $message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, your file was not uploaded</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		 
		} else {
		    if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {  
			$sqlinsert=mysqli_query($con,"UPDATE set description='$Desrciption',profile='$image',name='$name' where grp_id='$grp_unique_id' "); 
			if ($sqlinsert) { 
				$message="<div class='d-flex flex-row success'>
						<div class='flex-fill'>Group created now.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";


			}else{  
				$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error sending grp info!</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

			}



		    } else {
		    	$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, there was an error uploading your file.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		       
		    }
		}


	}
}
	
		}
	}
}

