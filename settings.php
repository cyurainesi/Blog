<style type="text/css">
	.profile{
		border-bottom: 2px solid #00b8ff;
		color: #00b8ff;
	}
	#change{
		border: 1px solid #00b8ff;
		color: #00b8ff;

	} 

	#change:hover{
		background:#00b8ff;
		color: white;
	}
	.link{
		border-bottom: 2px solid #00b8ff;
		color: #00b8ff;
		cursor: pointer;
		text-decoration: none;
	}
	.Nouserpost{
	 color: #8b949e;
  background: rgba(22, 27, 34,0.2);
  border:  1px solid #30363d; 
	}
	
</style>
<?php
	include('header.php'); 
	if(isset($_GET['unique_id_profile'])){
		$userimage=$_GET['unique_id_profile'];
		$selectallusers=mysqli_query($con,"SELECT * FROM  users where users.username='$userimage'");
		$fetchalluser=mysqli_fetch_array($selectallusers);
		$user_identity=$fetchalluser['unique_id'];
	}else{
		$user_to_follow="";
	}
	


if (isset($_POST['delete'])) {
 $sqldelete=mysqli_query($con,"DELETE FROM users where unique_id='$user_identity'");
	if ($sqldelete) {
		echo "<meta charset='utf-8' http-equiv='refresh' content='0.1;login.php'>";
		session_destroy();
		$_SESSION['delete']="<div class='d-flex flex-row success'>
					<div class='flex-fill'>User deleted</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	}else{
		echo"<div class='d-flex flex-row error'>
					<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	}
}
	

?>
<div class="container-fluid mb-5">
	<div class="row" id="profile">
		<div class="col-lg-12 mt-5">
			<div class="d-flex flex-row">
				<div class="">
					<a href="user.php?unique_id_profile=<?php echo($username)?>" class="nav-link">Profile</a>
				</div>
				<div >
					<a href="#" class="link nav-link">Settings</a>
				</div>
			</div>
			  
		</div>
	</div>
</div>
<div class="container"  id="mySite">
	<div class="row justify-content-center"> 
		<?php  
			$selectallusers=mysqli_query($con,"SELECT * FROM  users where users.unique_id='$user_identity'");
		if ($selectallusers) {
			if (mysqli_num_rows($selectallusers)>0) {
			$fetchalluser=mysqli_fetch_array($selectallusers); 
			$new=$fetchalluser['username'];
			$email=$fetchalluser['email'];
			?>
			<?php if($user_to_follow==$user_identity){?>
				<div class="col-lg-8 mt-5">
					<div class="row p-5">
						<div class="col-lg-12 mb-2 p-3 rounded Nouserpost text-muted">
							<strong>Set Profile image</strong>
							<hr>
							<form class="row pl-3" method="POST" enctype="multipart/form-data">
								<input type="file" name="images">
								<button class="btn btn-sm mt-3" type="submit" name="save_profile" id="change">Save</button>
							</form>
						</div>
						<div class="col-lg-12 Nouserpost mt-2 rounded text-muted"><hr>
							<strong>Change Profile Names or Email</strong>
							<hr>
							<form class="row p-3" method="POST"> 
								<div class="col-lg-12 ">
									<label>User name</label>
									<input type="text" name="username" placeholder="User name" class="form-control rounded-0" autocomplete value="<?php echo$new?>">
									<?php
										 echo($user_error);
									?>
								</div> 
								<div class="col-lg-12 mt-3">
									<label>Email address</label>
									<input type="email" name="email" placeholder="Enter email" class="form-control rounded-0" value="<?php echo$email?>">
									<?php
										echo($email_error); 
									?>
								</div>  
								<div class="col-lg-12 mt-4">
									<button class="btn " id="change" type="submit" name="change">Change account</button> 
								</div>
							</form> 
						</div> 
						<div class="col-lg-12 text-muted Nouserpost mt-2 rounded"><hr>
							<strong>Change phone number </strong>
							<hr>
							<form class="row p-3" method="POST">
								<div class="col-lg-12">
									<label>Phone number</label>
									<input type="tel" name="phone" placeholder="Enter phone" class="form-control rounded-0">
									<?php echo$phone_error?>
								</div>
								<div class="col-lg-12 mt-4">
									<button class="btn " id="change" type="submit" name="change_phone">Change phone</button> 
								</div>
							</form>
						</div>

							<div class="col-lg-12 text-muted Nouserpost mt-2 rounded"hidden><hr>
							<strong>Set new password </strong>
							<hr>
							<form class="row p-3" method="POST">
								<div class="col-lg-12">
									<label>Old password</label>
									<input type="Password" name="oldpassword" placeholder="Enter old password" class="form-control rounded-0">
								</div>
								<div class="col-lg-12">
									<label>New password</label>
									<input type="Password" name="Newpassword" placeholder="Enter new password" class="form-control rounded-0">

								</div>
								<div class="col-lg-12 mt-4">
									<button class="btn " id="change" type="submit" name="change_pass">Change phone</button> 
								</div>
							</form>
						</div>

						<div class="col-lg-12 mt-4 text-muted">
							 <strong>Delete account </strong>
							<hr> 
								<button class="btn btn-block btn-danger " id="myBtn4"  type="submit" name="delete">Disable account</button> 
						 




							<div class="modal  createposts" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							    <div class="modal-dialog modal-dialog-centered" role="document">
							      <form  method="POST" class="modal-content border-0 rounded-0 shadow" id="formpost"> 
							        <div class="modal-header ">
							          <h4 class="modal-title text-decoration-underline">Delete warning<small></small></h4>
							          <hr>
							          <button type="button" class="close" id="close4" data-dismiss="modal">&times;</button>
							        </div>
							        <div class="modal-body">
							        	<i class="fa fa-info-circle"></i> Are you sure you want to delete this account.
							           <form method="POST"> 
							           	<button class="btn btn-block mt-3 " type="submit" name="delete">Delete</button>
							           </form>
							        </div>   
							      </form>
							    </div>
							  </div>
						</div>

					</div>
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

	 <script type="text/javascript">
   $("#myModal4").hide();

  $(document).ready(function(){
    $("#myModal4").hide();

    $("#myBtn4").click(function(){
        $("#myModal4").show();
    });

     $("#close4").click(function () {
        $("#myModal4").hide();
    });
   
});

 </script>