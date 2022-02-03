<div class="row" id="top">
	<div class="col-lg-12 mt-3 font-weight-bold"> 
		Follower/Following 
	</div>
	<div class="col-lg-12">
<?php
$selectc=mysqli_query($con,"SELECT * FROM users,notifications where notifications.type_id='$user_identity' and notifications.table='follow' and users.unique_id=notifications.user_id order by  notifications.id desc")or die($con->error);
		if ($selectc) {
			if (mysqli_num_rows($selectc)>0) {
				while($selecc=mysqli_fetch_array($selectc)){
					 $user_to_follow=$selecc['user_id'];
	$selectallusersprofile=mysqli_query($con,"SELECT * FROM  profile where profile.user_id='$user_to_follow'");
		if ($selectallusersprofile) {
			if (mysqli_num_rows($selectallusersprofile)>0) {
			$fetchalluserprofile=mysqli_fetch_array($selectallusersprofile); 
			$cover="images/".$fetchalluserprofile['profile'];
			 }else{
			 $cover="images/Capture.PNG";
			}
		}
					?> 
					<a href="user.php?unique_id_profile=<?php echo($user_to_follow)?>" id="top">
						<div class="d-flex flex-row mt-2 notification ">
							<div class="flex-fill">
								<div class="d-flex flex-row">
									<div class="">
										New notification
									</div>
								</div>
								<div class="d-flex flex-row text-muted p-2">
									<div class="profilenotif  mr-2" style="width:30px;height: 30px;" >
										<img src="<?php echo$cover?>" class="img-thumbnail border-0">
									</div>
									<div class="flex-grow-1 mt-1"> 
										<div class="d-flex flex-row">
											<div class="">  
												<?php echo$selecc['username']?> 
											</div> 
											<div class="flex-grow-1 ml-2">
												<?php echo$selecc['action']?> 
											</div>
											<div class="mt-1 pr-2"> 
												<small><?php 
					      							echo date('H:i A  D', strtotime($selecc['date']));
													  ?></small>
											</div>
										</div>
									</div>
								</div>
								
								
							</div> 
						</div> 
					</a> 

					<?php
				}
					}else{ 	
					}
				} 
					else{ 
					echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
				}
?>
	</div>
</div>

<div class="row" id="posts">
	<div class="col-lg-12 mt-3 font-weight-bold border-top">
		Posts
	</div>
	<div class="col-lg-12">
<?php
$selectc=mysqli_query($con,"SELECT * FROM users,notifications,posts,follow where (notifications.type_id='0' and notifications.user_id!='$user_identity') and (notifications.user_id=follow.follower or notifications.user_id=follow.following ) and (follow.follower='$user_identity' or follow.follower='$user_identity') and (posts.post_unique_id=notifications.notification_id and users.unique_id=notifications.user_id) and follow.follow=1 order by  notifications.id desc")or die($con->error);
		if ($selectc) {
			if (mysqli_num_rows($selectc)>0) {
				while($selecc=mysqli_fetch_array($selectc)){
					 $user_to_follow=$selecc['user_id'];
					 $post_unique_id=$selecc['id'];
	$selectallusersprofile=mysqli_query($con,"SELECT * FROM  profile where profile.user_id='$user_to_follow'");
		if ($selectallusersprofile) {
			if (mysqli_num_rows($selectallusersprofile)>0) {
			$fetchalluserprofile=mysqli_fetch_array($selectallusersprofile); 
			$cover="images/".$fetchalluserprofile['profile'];
			 }else{
			 $cover="images/Capture.PNG";
			}
		}
					?> 
					<a href="viewpost.php?post_unique_id=<?php echo($post_unique_id)?>&&user_to_follow=<?php echo$user_to_follow?>" >
						<div class="d-flex flex-row mt-2 notification">
							<div class="flex-fill">
								<div class="d-flex flex-row">
									<div class="">
										 New notification
									</div>
								</div>
								<div class="d-flex flex-row text-muted p-2">
									<div class="profilenotif mr-2" style="width:30px;height: 30px;" >
										<img src="<?php echo$cover?>" class="img-thumbnail border-0">
									</div>
									<div class="flex-grow-1 mt-1"> 
										<div class="d-flex flex-row">
											<div class="">  
												<?php echo$selecc['username']?> 
											</div> 
											<div class="flex-grow-1 ml-2">
												<?php echo$selecc['action']?> 
											</div>
											<div class="mt-1 pr-2"> 
												<small><?php 
					      							echo date('H:i A  D', strtotime($selecc['date']));
													  ?></small>
											</div>
										</div>
									</div>
								</div> 								
							</div> 
						</div> 
					</a> 

					<?php
				}
					}else{ 
					}
				} 
					else{ 
					echo"<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
				}
?>
	</div>
</div>





