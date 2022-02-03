<?php  
session_start();
$message="";
include('conn.php'); 
$user_identity=$_SESSION['login'];
	$selectalluser=mysqli_query($con,"SELECT * FROM users,follow where (users.unique_id=follow.follower ) and (follow.following='$user_identity') and  unique_id!='$user_identity' and follow.follow=1 ")or die($con->error); 
	
		if ($selectalluser) {  
					if (mysqli_num_rows($selectalluser) >0) {
			while ($fetchallusers=mysqli_fetch_array($selectalluser) ) {
					$user_to_follow=$fetchallusers['unique_id']; 

				$selectallusersmessages=mysqli_query($con,"SELECT * FROM messages where (messages.user_unique_id='$user_identity' or messages.user_unique_id_r='$user_identity')  and  (messages.user_unique_id='$user_to_follow' or messages.user_unique_id_r='$user_to_follow') and messages.message!='' order by messages.message_id desc ")or die($con->error);
				
				$fetchallusermessages=mysqli_fetch_array($selectallusersmessages); 
			  	 
			 		if (mysqli_num_rows($selectallusersmessages) >0) { 
						$date=$fetchallusermessages['date'];
						$datee= date('H:m A',strtotime($date));
			 	
						


						if ($fetchallusermessages['user_unique_id']==$user_identity) {
							$label="You: "; 
							$badge="Sent";
							$style="font-weight-bold text-muted";
							
						}else{
							$label="";
							$badge="";
							$style="font-weight-bold text-info";
						}

							

						if ($user_to_follow==1) {
							$active="<small class='text-success fa fa-circle' title='Active now'></small>";
						}else{
							$active="<small class=' text-danger fa fa-times-circle' title='Offline now'></small>";
						}


				$selectallusersnickname=mysqli_query($con,"SELECT * FROM nicknames  where user_id='$user_identity' and user_id_r='$user_to_follow'")or die($con->error);
						if (mysqli_num_rows($selectallusersnickname)>0) {
							$fetnickname=mysqli_fetch_array($selectallusersnickname);
							$nickname=$fetnickname['name'];
							$name =$fetnickname['name'];
							$supername=$fetchallusers['username'];
						}else{
							$nickname=$fetchallusers['username'];
							$name=$fetchallusers['username'];
						}

						if ($fetchallusermessages['message']=='') {
							$result='<i class="fa fa-image"></i>';
							
						}elseif($fetchallusermessages['image']==''){
							$result=$fetchallusermessages['message'];
						}

				 
					?> 
					<div class="d-flex flex-row mt-2 p-2 userprofile_container">
						<div class="userprofile">  
							<div class=" text-white p-2  text-center userprofileliked" style="background: #00b8ff;">
								<?php
								$new=$nickname;
								 $upper_name=strtoupper($new); 
								 $nee=substr(($upper_name),0,1);
								 echo("<h3>".$nee."</h3>");
								?>
							</div>

							<span style="position: absolute;top: 0px;"><?php echo$active?></span>
						</div>

						<div class="flex-grow-1 ml-1  text-truncate">
							<div class="d-flex flex-row">
								<div class="flex-grow-1">
									<h6><a class="text-dark" href="messages.php?unique_id_profile=<?php echo($user_identity)?>&usercontroller='messangerController'&unique_id_profile_receiver=<?php echo($user_to_follow)?>&messangerController='messagesAPi'&type=0"><?php echo$name?></a></h6>
								</div>
								<div>
									<small class="badge text-muted"><?php echo$badge?></small>
								</div>
							</div> 
							<a class=" d-flex flex-row" href="messages.php?unique_id_profile=<?php echo($user_identity)?>&usercontroller='messangerController'&unique_id_profile_receiver=<?php echo($user_to_follow)?>&messangerController='messagesAPi'&type=0">
								<div class="flex-fill text-truncate ">  
									<small class="<?php echo($style)?>"><?php echo$label?><?php echo$result?></small>
						 		</div>
						 		<div class="ml-2 text-muted text-truncate">
						 			<?php echo$datee?>
						 		</div>
						 	</a> 
						</div>
					</div>
					<hr>


					<?php
					}else{

			 			 $message='<div class="text-muted"> 
						<a href="users.php" style="color: #00b8ff;">Find more users</a>
					</div>';
			 		}



				} 
				}else{
					 $message='<div class=" "> 
						<a href="users.php" style="color: #00b8ff;">Find more users</a>
					</div>';
				}

				require"groups.php";

				
				?> 
				
			<?php
			}else{
				 echo$con->error;
			}
			echo$message;
		 
?>