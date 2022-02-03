<?php
	include('header.php');
	if(isset($_GET['unique_id_profile'])){
		$user_to_follow=$_GET['unique_id_profile'];
		$selectallusers=mysqli_query($con,"SELECT * FROM  users where users.username='$user_to_follow'");
		$fetchalluser=mysqli_fetch_array($selectallusers);
		$userimage=$fetchalluser['unique_id'];
	}else{
		$user_to_follow="";
	}
	
?>
<?php  
	$selectallusersprofile=mysqli_query($con,"SELECT * FROM  profile where profile.user_id='$userimage'");
		if ($selectallusersprofile) {
			if (mysqli_num_rows($selectallusersprofile)>0) {
			$fetchalluserprofile=mysqli_fetch_array($selectallusersprofile); 
			$cover="images/".$fetchalluserprofile['profile'];
			 }else{
			 $cover="images/Capture.PNG";
			}
		}?>
<style type="text/css">
body{
	margin: 0;
}
	#bioBtn{
		cursor: pointer;
	}
	textarea{
  box-shadow: none!important;
            border: 0!important;
              display: block; 
    background-color: #0c162d; 
    letter-spacing: normal;
    word-spacing: normal;
    text-transform: none;
    text-indent: 0px;
    text-shadow: none;
    display: inline-block;  
    appearance: auto;
    background-color: -internal-light-dark(rgb(255, 255, 255), rgb(59, 59, 59)); 
    border-style: inset;
    border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));

}
 

.userprofileimage{ 
   border-radius: 50%;
    height: 150px;
    width: 150px;  
    background: #58a6ff; 
    text-align: center; 
     
}
.linkmentions{
	background-color: rgba(56, 139, 253, 0.1);
    border: 1px solid transparent; 
    color: #58a6ff;
    display: inline-block;
    font-size: 12px;
    font-weight: 500;
    line-height: 18px;
    line-height: 22px;
    padding:6px;	
}

</style>
<div class="container-fluid" id="mySite"> 

<div class="container"  >
	<div class="row  justify-content-center"> 
		<?php  
			$selectallusers=mysqli_query($con,"SELECT * FROM  users where users.username='$user_to_follow'");
		if ($selectallusers) {
			if (mysqli_num_rows($selectallusers)>0) {
			$fetchalluser=mysqli_fetch_array($selectallusers); 
			$new=$fetchalluser['username'];
			$phone=$fetchalluser['phone'];
			?>  

		<div class="col-lg-9 userprofilecontent ">
			<div class="row justify-content-center">
				<div class="col-lg-12 text-white">
					<div class="row justify-content-center text-white">
						<div class="col-lg-3 mb-2">  
							<img src="<?php echo($cover)?>" class="userprofileimage img-thumbnail" >
						</div>
						<div class="col-lg-8 mb-2">
								<div class="row"> 
									<div class="col-lg-8 username p-2">
										<div class="row mb-3">
											<div class="col-lg-12 text-white">
												<h6><?php echo$new?>, <span class="text-muted font-weight-bold"><?php echo$fetchalluser['email']?></span> </h6>
											</div>
											<div class="col-lg-12">Joined date
												<small class="text-white"><?php 
													echo date('d,M, Y ', strtotime($fetchalluser['date']));
												  ?></small>
											</div>
										</div>
										 
									</div>
									<div class="col-lg-4">
										<div class="d-flex flex-row">
											<div class="flex-grow-1 p-2">
												<?php verified($fetchalluser['unique_id'])?> 
											</div>
											<div class="flex-grow-1 p-2  ">
												<?php if($username!=$user_to_follow){
													include"c_php/followbtn.php";
												?> 
											</div>
											<div class=' p-2'>
											<?php if (mysqli_num_rows($selectcfollowing)>0) { ?>
												<a class="btn <?php echo"follow"?> btn-sm" href="messages.php?unique_id_profile=<?php echo($username)?>&usercontroller='messangerController'&unique_id_profile_receiver=<?php echo($user_to_follow)?>&messangerController='messagesAPi'&type=0">Message</a>
											<?php } }?>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-12 text-center">
										<?php auto_like($user_to_follow)?>
										<p class="text-muted"> 

												<?php 
										$content=$fetchalluser['bio']; 
										if(preg_match_all('/#(\w+)/', $content, $matches)){
										$hashtags=$matches[1];
										$content=preg_replace('/#(\w+)/', '<a class="hashtags" href="hashtags.php?hashtags=$1">#$1</a>', $content); 
										echo$content;
										}elseif (preg_match_all('/@(\w+)/', $content, $matches)) {
										$hashtags=$matches[1];
										$content=preg_replace('/@(\w+)/', '<a class="hashtags"    href="user.php?unique_id_profile=$1">@$1</a>', $content); 
										echo$content;	 
										}else{
											echo$content;
										}
										?>
											</p>	

					<?php if ($user_to_follow==$username): ?> 
										<p id="bioBtn">Bio <i class="fa fa-plus-circle"></i></p> 
					<?php endif ?>

										<form method="POST" id="bio" style="display:none;">
											<textarea placeholder="Write Bio" name="bio" class="form-control"><?php echo$fetchalluser['bio']?></textarea>
											<button name="addbio" type="submit" class="btn btn-sm btn-primary">Save</button>
											<a href="#" class="btn btn-sm btn-danger" id="closebio">Cancel</a>
										</form>
									</div>
								</div>



							</div> 
					</div>
				</div> 
			</div>
		</div>
	</div>
 
	<div class="row usernav sticky-top">
		<div class="col-lg-12">
			<hr>
			<div class="row  justify-content-center font-weight-bold">
				<div class="col-lg-3">
					<a href="#followers" class="nav-linker" id="follower"> 
					<?php Followers($userimage,$con)  ?> Follower</a>						
				</div>
				<div class="col-lg-3">
					<a  href="#following" class="nav-linker" id="followinger"> <span>
						<?php Followings($userimage,$con)  ?></span> Following</a>
				</div>
				<div class="col-lg-3">
					<a  href="#Post" class="nav-linker" > <span>
						<?php userpostcount($userimage,$con)?></span> Posts</a>
				</div>
				<div class="col-lg-3"> 
					<a  href="#Mentions" class="nav-linker" >
					<span><?php selectcounting_mentions($con,$user_to_follow)?></span> Mentions</a>
				</div> 
			</div>
			<hr> 
		</div>
	</div>
</div>




<div class="container-fluid">			 
	<div class="row justify-content-center mt-5">
			<?php selecting_mentioned($con,$user_to_follow)?>
		<div class="col-lg-6"> 
			<div class="row"> 
				<div class="col-lg-12">
					<?php include"c_php/userpost.php"; ?>
				</div> 
			<?php

		}else{ 
			?>
			<div class="mt-5 p-5">
				<h3>No content available</h3>
				<a href="index.php" class="border p-2">Back home</a>
			</div>
		<?php 
	}}else{ ?>
		<div class="">Error</div>
	<?php }?>
		</div>

	</div>
	<div class="col-lg-12 mt-2 text-center ">
		<hr>
		<?php require"footer.php";?> 
	</div>
	</div>
</div> 
</div> 
<?php include"follower.php"?>
<?php include"following.php"?> 

<script type="text/javascript">
$(document).ready(function () {
    $("#bio").hide(); 
     $("#bioBtn").click(function(){
        $("#bio").show();
    });
     $("#closebio").click(function () {
          $("#bio").hide();
     })

});</script>