<?php  
 function profileuser($user_to_follow,$fetchalluserwithnophoto,$username)
{ 
	require"conn.php";
	$selectallusersprofile=mysqli_query($con,"SELECT * FROM  profile where profile.user_id='$user_to_follow'");
	#$selctusername=mysqli_select($con,"SELECT * FROM users WHERE unique_id='$user_to_follow'");
	#$fetusername=mysqli_fetch_array($selectusername);

		if ($selectallusersprofile) {
			if (mysqli_num_rows($selectallusersprofile)>0) { 
			$fetchalluserprofile=mysqli_fetch_array($selectallusersprofile);
			 ?>  
				<?php
					$cover="images/".$fetchalluserprofile['profile'];
				?>
				<div class="userprofile ">
					<a  class="text-decoration-none " href="user.php?unique_id_profile=<?php echo($username) ?>"> 
						<img src="<?php echo($cover)?>"  class=" img-thumbnail " alt="profile">
					</a> 
				</div>
			<?php
			 } 
			 else{
			 
			 ?>
				<div class=" text-white p-2  text-center userprofileliked">
					<?php
					 $new=$fetchalluserwithnophoto;
					 $upper_name=strtoupper($new); 
					 $nee=substr(($upper_name),0,1);
					 echo("<h3>".$nee."</h3>");
					?>
				</div>

			 <?php
			}
		}else{
			?> 

			<div class=" text-white p-4 text-center bg-primary shadow userprofile sticky-top top-0">  
				<?php
				 $new=$fetchalluserwithnophoto;
				 $upper_name=strtoupper($new); 
				 $nee=substr(($upper_name),0,1);
				 echo("<h3>".$nee."</h3>");
				?>
			</div>

			<?php
			}
		}
			?>
