
<style type="text/css">
	.sj a{
		background:  #282a2d;
		color: grey;
	}
	.grps button{
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
			<div class="col-lg-12 allcontainer mt-4">  
				<div class="mb-4">
					<div class="d-flex flex-row ">
						<div class="flex-grow-1">
						<h5><a href="#"  class="p-2 trandinggrps">Exprole groups</a></h5>
						</div>
						<div class=" sj">
							<a  href="grps.php?unique_id_profile=<?php echo($user_identity)?>&usercontroller='messangerController'&unique_id_profile_receiver=&messangerController='messagesAPi'" target="blank" type="submit" name="send" title="Create Group" class="btn mr-2">Back </a> 
						</div>
					</div>  
					<hr>
					<?php include"c_chat/grplist.php"?>
				</div>
			</div>
		</div>
	</div> 
	<script type="text/javascript" src="vendor/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="vendor/jquery-ui.min.js"></script>
</body>
</html>