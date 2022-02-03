<?php  
session_start();

include('conn.php');

?>
<div class="text-muted">
	Results for <span class="bg-white "><?php echo($_POST['searchTerm']);?></span>
	<hr>
</div>
<?php
$user_identity=$_SESSION['login'];
 
$searchTerm=mysqli_real_escape_string($con,$_POST['searchTerm']);
$selectallusers=mysqli_query($con,"SELECT * FROM users where username like'%{$searchTerm}%' and users.unique_id!='$user_identity'");
		if ($selectallusers) {
			if (mysqli_num_rows($selectallusers)>0) {
				while ($fetchalluser=mysqli_fetch_array($selectallusers)) {
					$user_to_follow=$fetchalluser['unique_id'];
					?> 
					<div class="d-flex flex-row mt-2 p-2 userprofile_container">
						<div class="userprofile">  
							<div class=" text-white p-2  text-center userprofileliked">
								<?php
								 $new=$fetchalluser['username'];
								 $upper_name=strtoupper($new); 
								 $nee=substr(($upper_name),0,1);
								 echo("<h3>".$nee."</h3>");
								?>
							</div>
						</div>
						<div class="flex-grow-1 ml-1  text-truncate">
							<div class="d-flex flex-row">
								<div class="">
									<h6><a class="text-dark" href="messages.php?unique_id_profile=<?php echo($user_identity)?>&usercontroller='messangerController'&unique_id_profile_receiver=<?php echo($user_to_follow)?>&messangerController='messagesAPi'&type=0"><?php echo$fetchalluser['username']?></a></h6>
									<small class="text-muted"><?php echo$fetchalluser['email']?></small>
								</div> 
							</div>   
						</div>
					</div>
					<hr>
					<?php
				}
				 
			}else{
				?>
				<div class="text-muted">
					<p>No User found</p>
				</div>
				<?php
			}
		}else{ 
			$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		}
?>