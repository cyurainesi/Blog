<?php require"header.php"?>
 <?php 
	$user_identity=$_SESSION['login']; 
	$selectallusersprofile=mysqli_query($con,"SELECT * FROM users where users.unique_id='$user_identity'");
		 
	?>
	<div class="container-fluid"  id="mySite">
		<div class="row">
			<div class="col-lg-12 allcontainer pt-5"> 
				<a  href="grps.php?unique_id_profile=<?php echo($user_identity)?>&usercontroller='messangerController'&unique_id_profile_receiver=&messangerController='messagesAPi'" target="blank" type="submit" name="send" title="Create Group" class="btn mr-2">Back </a>
				<div class="d-flex flex-row"> 
					<div class="flex-grow-1 ml-5 mt-5 text-muted group ">
						<h5>Create group</h5>
						<hr><?php echo$message?>
						<form class="row" method="POST" enctype="multipart/form-data"> 

							<div class="col-lg-4">
								<label>Grp Name</label>
								<input type="text"class="form-control" name="name" placeholder="Write Grp name">
							</div>
							<div class="col-lg-6">
								<label>Desrciption</label>
								<textarea class="form-control" name="Desrciption" placeholder="Write Grp Desrciption"></textarea>
							</div>
							<div class="4 ml-3">
								<label>Grp Profile</label>
								<input type="file" name="images">
							</div>
							<div class="col-lg-12 mt-3">
								<button class="btn btn-sm btn-primary" type="submit" name="create">Create</button>
							</div>
						</form>
					</div>
				</div> 
			</div>
		</div>
	</div> 
	<script type="text/javascript" src="vendor/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="vendor/jquery-ui.min.js"></script>
</body>
</html>