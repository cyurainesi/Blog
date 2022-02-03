<?php  
session_start();

include('conn.php');

?>
<div class="text-muted">
	Results for <span class="bg-white font-weight-bold "><?php echo($_POST['searchTerm']);?></span>
	<hr>
</div>
<div class="row justify-content-center">
<?php
$user_identity=$_SESSION['login'];
 
$searchTerm=mysqli_real_escape_string($con,$_POST['searchTerm']);
$selectallusers=mysqli_query($con,"SELECT * FROM users where username like'%{$searchTerm}%' and users.unique_id!='$user_identity'");
		if ($selectallusers) {
			if (mysqli_num_rows($selectallusers)>0) {
				while ($fetchalluser=mysqli_fetch_array($selectallusers)) {
					$user_to_follow=$fetchalluser['unique_id'];
					?> 
					<div class="col-lg-5">
					<div class="d-flex flex-row mt-2 border p-2 bg-white rounded">
						<div class=" text-white p-2  text-center userprofileliked">
							<?php
							 $new=$fetchalluser['username'];
							 $upper_name=strtoupper($new); 
							 $nee=substr(($upper_name),0,1);
							 echo("<h3>".$nee."</h3>");
							?>
						</div>
						<div class="flex-fill mt-3 ml-3">
							<a  href="user.php?unique_id_profile=<?php echo($fetchalluser['unique_id']) ?>"><?php echo$fetchalluser['username']?></a>
						</div>
						<div class="mt-3">
						 <?php include"c_php/followbtn.php"?> 
						</div>
						<div class="mt-3 ml-2">
							<?php if (mysqli_num_rows($selectcfollowing)>0) { ?>
							<a class="btn <?php echo"follow"?> btn-sm" href="messages.php?unique_id_profile=<?php echo($user_identity)?>&usercontroller='messangerController'&unique_id_profile_receiver=<?php echo($user_to_follow)?>&messangerController='messagesAPi'&type=0">Message</a>
						<?php }?>
						</div>
						</div>
					<hr>
				</div>
					<?php
				}
				 
			}else{
				?>
				<div class="text-muted">
					<p>No Search results found</p>
				</div>
				<?php
			}
		}else{ 
			$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		}
?>
</div>