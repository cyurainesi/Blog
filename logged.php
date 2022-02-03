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
.profileusercomment{  
    background: url('<?php echo($cover)?>');
     background-repeat: no-repeat;
     background-size: cover; 
     padding: 0; 
     width: 30px;
     height: 30px; 

     border-radius: 50%; 
}

.profileusercomment img{
	border-radius: 50%;
	width: 100%;
	height: 100%;
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
			<div class="profileusercomment">
				<a href="user.php?unique_id_profile=<?php echo($username)?>"><img src="<?php echo$cover?>" class="img-thumbnail"></a>
			</div>

	<?php }}else{
		echo $con->error;
	}?> 