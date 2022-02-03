<?php  
	if (isset($_POST['save_video'])) {
	 
	$unique_id=$_SESSION['login'];
	$post_unique_id=date('s').date('i').date('y').date('m'); 
	$date=date('Y-m-d h:i:s');

}
?>



<?php 
if(isset($_POST["save_video"])) {
	$target_dir = "videos/";
$target_file = $target_dir . basename($_FILES["videos"]["name"]);
$uploadOk = 1;
$video=$_FILES["videos"]["name"];
$videoformat = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$caption=$_POST['caption'];
	$month=date("M-Y"); 
 
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
		        $sqlinsert=mysqli_query($con,"INSERT INTO posts values('','$post_unique_id','','$date','$unique_id','','','','$video','$month')")or die($con->error);

		        mysqli_query($con, "INSERT INTO notifications VALUES('','$post_unique_id','$unique_id','','posts','$date','0','posted video')");
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
?>