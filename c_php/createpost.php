<?php  
	
	if (isset($_POST['save_post'])) {
	 
	$unique_id=$_SESSION['login'];
	$post_unique_id=date('s').date('i').date('y').date('m'); 
	$date=date('Y-m-d h:i:s');
	$location=$_POST['location'];
	$caption=$_POST['caption'];
	$month=date("M-Y");  


if (!empty($post=$_POST['post'])){ 
		$post=$_POST['post']; 
			$sqlinsert=mysqli_query($con,"INSERT INTO posts (`post_unique_id`, `post`, `date`, `user_unique_id`,`month`, `location`) values('$post_unique_id','$post','$date','$unique_id','$month','$location')");
			#mysqli_query($con, "INSERT INTO notifications VALUES('','$post_unique_id','$unique_id','','posts','$date','0','created post')");
			if ($sqlinsert) { 
				 echo"<div class='d-flex flex-row success'>
						<div class='flex-fill'>Post created</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
			}else{ 
				echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error creating post</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

			}
	 

}
elseif(!empty($_FILES["images"]["name"])){ 

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

		// Allow certain file formats
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
		        $sqlinsert=mysqli_query($con,"INSERT INTO posts (`post_unique_id`, `date`, `user_unique_id`, `image`, `image_caption`,`month`, `location`) values('$post_unique_id','$date','$unique_id','$image','$caption','$month','$location')"); 
					if ($sqlinsert) { 
						echo"<div class='d-flex flex-row success'>
						<div class='flex-fill'>The file  has been uploaded.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
					}else{ 
						echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error uploading image.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
					}


		    } else {
		    	echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, there was an error uploading your file.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		       
		    }
		}


	}

}
}



elseif(!empty($_FILES["videos"]["name"])){ 

$target_dir = "videos/";
$target_file = $target_dir . basename($_FILES["videos"]["name"]);
$uploadOk = 1;
$video=$_FILES["videos"]["name"];
$videoformat = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
if ($_FILES["videos"]["size"] > 128403041) { 
     echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, your video is too large.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
    $uploadOk = 0;
}else{

		// Allow certain video formats
	if($videoformat != "mp4" && $videoformat != "avi" && $videoformat != "mpg"
	&& $videoformat != "gif" && $videoformat!='mov'&&$videoformat!='vob' && $videoformat!='mkv' && $videoformat!='3gp' ) {
	    
	echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, only mp4, avi,mpg ,mov, vob, mkv, 3gp video extensions are allowed.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	    $uploadOk = 0;
	}else{ 
		if ($uploadOk == 0) { 
		    echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, your video was not uploaded</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		 
		} else {
		    if (move_uploaded_file($_FILES["videos"]["tmp_name"], $target_file)) { 
		        $sqlinsert=mysqli_query($con,"INSERT INTO posts (`post_unique_id`, `date`, `user_unique_id`, `image_caption`, `video`, `month`, `location`) values('$post_unique_id','$date','$unique_id','$caption','$video','$month','$location')")or die($con->error);

		        #mysqli_query($con, "INSERT INTO notifications VALUES('','$post_unique_id','$unique_id','','posts','$date','0','posted video')");
					if ($sqlinsert) { 
						echo"<div class='d-flex flex-row success'>
						<div class='flex-fill'>The video  has been uploaded.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

					}else{ 
						echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error uploading videos.".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
					}


		    } else {
		    	echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, there was an error uploading your video.".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		       
		    }
		}


	}
}
 
 
}

else{
		echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error  required input</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		
		}
	}
  
?>