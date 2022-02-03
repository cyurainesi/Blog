<?php
$user_to_follow=$user_identity;  
	$selectallusersprofile=mysqli_query($con,"SELECT * FROM  profile where profile.user_id='$user_identity'");
		if ($selectallusersprofile) {
			if (mysqli_num_rows($selectallusersprofile)>0) {
			$fetchalluserprofile=mysqli_fetch_array($selectallusersprofile); 
			$cover="images/".$fetchalluserprofile['profile'];
			 }else{
			 $cover="images/Capture.PNG";
			}
		}?>
<style type="text/css">
.profileuser img{ 
width: 60px;
height: 60px;
border-radius: 50%;   
}
	 
</style> 
	<?php  
			$selectallusers=mysqli_query($con,"SELECT * FROM  users where users.unique_id='$user_identity'");
		if ($selectallusers) {
			if (mysqli_num_rows($selectallusers)>0) {
			$fetchalluser=mysqli_fetch_array($selectallusers); 
 
$selectalluserspost=mysqli_query($con,"SELECT count(post_unique_id) as total FROM posts where posts.user_unique_id='$user_identity'");

$fetchalluserpost=mysqli_fetch_array($selectalluserspost);

			$new=$fetchalluser['username'];
			?> 
				<div class="row ">  
					<div class="col-lg-12 profileuser ">
						<div class="d-flex flex-row p-2"> 

							<img src="<?php echo($cover)?>" class="img-thumbnail border-0 ">

							<h5 class="row ml-2">
								<div class="col-lg-12">
									<a href="user.php?unique_id_profile=<?php echo($username)?>" class="text-white"><?php echo$new?></a>  <?php verified($user_identity)?>
								</div>
								<div>
									<a href="settings.php?unique_id_profile=<?php echo($username)?>" class="btn-sm  p-2 rounded">Edit</a>
								</div> 
							</h5> 
						</div> 
					</div> 
				</div> 
		
	 
	<?php }}else{
		echo $con->error;
	}?>
 