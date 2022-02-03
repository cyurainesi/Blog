
 
<style type="text/css">
 	  
		.trandinggrps{
		border-bottom: 2px solid #00b8ff;
		color: #00b8ff;
	}
			.grpcontainer{
				overflow-x: auto;
				color: white;
				overflow-y:;
				margin-bottom: 40px;

			}
			.sj a{
				background:  #282a2d;
				color: grey;
			} 
				.grpcontainer .x p{background:  #282a2d;
				color: grey;
			}
</style>
<?php require"header.php"?>
 <?php
 
	$user_identity=$_SESSION['login']; 
	$selectallusersprofile=mysqli_query($con,"SELECT * FROM users where users.unique_id='$user_identity'");
		 
	?>
	 
	
	<div class="container-fluid mb-5" id="mySite">
		<div class="row">
			<div class="col-lg-12 mt-4">
				<div class="d-flex flex-row font-weight-bold">
					<div class="">
						<h5><a  href="#" class="p-2 tranding ">Trending</a></h5>						
					</div> 
					<div class="">
						<h5><a href="#"  class="p-2 trandinggrps">Groups</a></h5>
					</div>
				</div>
			</div>
			<div class="col-lg-12 allcontainer"> 
			<div class="col-lg-12 ">
				<div class="row">
					<div class="col-lg-12 mt-3">
						Your groups
						<hr>
					</div>
					<div class="col-lg-12">
						<?php include"c_chat/usergrps.php"?>
					</div>
				
				
			</div> 
			<div class="col-lg-12">
				<div class="d-flex flex-row sj"> 
					<p class=" flex-grow-1">Joined groups</p>
 
					 <a class="btn mr-2" href="messages.php?unique_id_profile=<?php echo($user_identity)?>&usercontroller='messangerController'&unique_id_profile_receiver=&messangerController='messagesAPi'&type=">Chat</a>

					<a  href="exploregrps.php?unique_id_profile=<?php echo($user_identity)?>&usercontroller='messangerController'&unique_id_profile_receiver=&messangerController='messagesAPi'" target="blank" type="submit" name="send" title="Create Group" class="btn mr-2">Find more groups</a> 
				</div>  
				<hr>
				<?php include"c_chat/grplistjoined.php"?>
			</div>
			</div>
		</div>
	</div> 
	<script type="text/javascript" src="vendor/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="vendor/jquery-ui.min.js"></script>
</body>
</html>