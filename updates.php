<?php
	include('header.php');
	include('c_php/changeprofile.php');
	
	$user_to_follow=$_GET['unique_id_profile'];

?> 
<style type="text/css">
	 
	.Updates{
		border-bottom: 2px solid #58a6ff;
		color: #58a6ff;
	}
	#change{
		border: 1px solid #074384;
		color: #074384;

	} 

	#change:hover{
		background:#074384;
		color: white;
	}
	.link{
		border-bottom: 2px solid #58a6ff;
		color: #58a6ff;
		cursor: pointer;
		text-decoration: none;
	}

	.notification{
		 color: #8b949e;
  background: rgba(22, 27, 34,0.2);
  margin-left: 40px;
  border:  1px solid #30363d;
  padding: 5px;
  border-radius: 5px;
	}
 
	
</style>

<div class="container mb-5"  id="mySite">
	<div class="row justify-content-center p-2"> 
		<?php  
			$selectallusers=mysqli_query($con,"SELECT * FROM  users where users.unique_id='$user_identity'");
		if ($selectallusers) {
			if (mysqli_num_rows($selectallusers)>0) {
			$fetchalluser=mysqli_fetch_array($selectallusers); 
			$new=$fetchalluser['username'];
			?>
			<?php if($user_to_follow==$user_identity){?>
				<div class="col-lg-8 text-muted p-3 mt-5"> 
					<strong>Notifications:</strong>
					<div class="d-flex flex-row mt-2 justify-content-center">

						<div class="flex-fill">
							<?php 
								$selectcount=mysqli_query($con,"SELECT count(notifications.id) AS totalnotify FROM users,notifications where notifications.type_id='$user_identity'  and notifications.table='follow' and users.unique_id=notifications.user_id ")or die($con->error);
								$seleccoutning=mysqli_fetch_array($selectcount);

							?>
							<a href="#top">Follower/Following</a> <strong class=""><?php echo $seleccoutning['totalnotify']?></strong>
						</div>
						<div class="flex-fill">
							<?php
							$selectc=mysqli_query($con,"SELECT count(notifications.id) AS totalnotifyy FROM users,notifications,posts,follow where (notifications.type_id='0' and notifications.user_id!='$user_identity') and (notifications.user_id=follow.follower or notifications.user_id=follow.following ) and (follow.follower='$user_identity' or follow.follower='$user_identity') and (posts.post_unique_id=notifications.notification_id and users.unique_id=notifications.user_id)  and follow.follow=1 order by  notifications.id desc")or die($con->error);
							$selecinhh=mysqli_fetch_array($selectc);
							?>
							<a href="#posts">Posts</a> <strong class=""><?php echo$selecinhh['totalnotifyy']?></strong>
						</div>
					</div>
					<hr>
					<?php require"c_php/allupdates.php"?>
				</div>

			<?php }else{
				?>
				<div class="text-white mt-5 p-5">
					<h3>No content available</h3>
					<a href="index.php" class="text-white border p-2">Back home</a>
				</div>
				<?php
			}?>
			<?php
		}else{
				?>


				<div class="text-white mt-5 p-5">
					<h3>No content available</h3>
					<a href="index.php" class="text-white border p-2">Back home</a>
				</div>
				<?php
			}}else{
				?>
				<div class="col-lg-12">
					Error found
				</div>
				<?php
			}
			?>   

	</div>