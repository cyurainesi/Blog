<?php  
	if (isset($_POST['save_story'])) {
	 
	$unique_id=$_SESSION['login'];
	$post_unique_id=date('s').date('i').date('y').date('m'); 
	$date=date('Y-m-d h:i:s');

}
?>



<?php 
if(isset($_POST["save_story"])) {
	$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["images"]["name"]);
$uploadOk = 1;
$image=$_FILES["images"]["name"];
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$caption=$_POST['caption'];

 
if ($_FILES["images"]["size"] > 1000000000000) { 
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
			if (empty($caption)) {
				 echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, caption required</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
			}else{
		    if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) { 
		        $sqlinsert=mysqli_query($con,"INSERT INTO stories values('','$unique_id','$image','$caption','$date')");

		        mysqli_query($con, "INSERT INTO notifications VALUES('','$post_unique_id','$unique_id','','stories','$date','0','added to story')");

					if ($sqlinsert) { 
						echo"<div class='d-flex flex-row success'>
						<div class='flex-fill'>The story  has been uploaded.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
					}else{ 
						echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Error uploading image.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
					}


		    } else {
		    	echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>Sorry, there was an error uploading your story.</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		       
		    }
		}
	}


	}
}


}
?>