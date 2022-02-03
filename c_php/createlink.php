<?php  
	if (isset($_POST['save_link'])) {
	 
	$unique_id=$_SESSION['login'];
	$post_unique_id=date('s').date('i').date('y').date('m'); 
	$date=date('Y-m-d h:i:s');
	$link=$_POST['link'];
		$month=date("M-Y"); 

	if (empty($link)) { 
		  $message="<div class='d-flex flex-row error'>
						<div class='flex-fill'> error  required input</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	}else{
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$link)) { 
      $message="<div class='d-flex flex-row error'>
						<div class='flex-fill'> Error creating Link: Invalid URL</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";

    }else{
    	$sqlinsert=mysqli_query($con,"INSERT INTO posts values('','$post_unique_id','','$date','$unique_id','$link','','','','$month')");
    	mysqli_query($con, "INSERT INTO notifications VALUES('','$post_unique_id','$unique_id','','posts','$date','0','created link')");
			if ($sqlinsert) {
				 $message="<div class=' success'> </div>";
				 $message="<div class='d-flex flex-row success'>
						<div class='flex-fill'> Link created </div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
			}else{ 

		  $message="<div class='d-flex flex-row error'>
						<div class='flex-fill'> Error creating Link </div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
			}
    }
			
}
}
  
?>