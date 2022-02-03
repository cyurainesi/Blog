 <?php
 		$sqlect=mysqli_query($con, "SELECT * FROM users,grp_users,groups where users.unique_id=grp_users.user_id  and groups.id=grp_users.grp_id and (groups.admin_id='$user_identity' or grp_users.user_id='$user_identity') group by groups.id ")or die($con->error);
 		

 		if (mysqli_num_rows($sqlect) >0) {

 		 while ($fettinggrp_users=mysqli_fetch_array($sqlect)){

 			$user_id=$fettinggrp_users['user_id'];
 			$admin_id=$fettinggrp_users['admin_id']; 
 			$id=$fettinggrp_users['id'];

 		$sqlectcount=mysqli_query($con, "SELECT count(user_id) as Totalusers FROM grp_users where grp_id='$id' ")or die($con->error);  
 		$fetgr=mysqli_fetch_array($sqlectcount);  
 		$selectallgrpmessage=mysqli_query($con,"SELECT * FROM grp_messages,groups,users where groups.id=grp_messages.user_unique_id_r and grp_messages.user_unique_id_r='$id' and users.unique_id=grp_messages.user_unique_id  order by grp_messages.message_id desc ")or die($con->error);

 		if(mysqli_num_rows($selectallgrpmessage) >0){
 			$fetmessage=mysqli_fetch_array($selectallgrpmessage);
 		$result=$fetmessage['message'];

 				if ($fetmessage['user_unique_id']==$user_identity) {
							$label="You: ";
							$style="  text-muted";
							
				}else{
							$label=$fetmessage['username'].": ";
							$style="  text-info";
						}
					
					
					if ($fetmessage['message']=='') {
							$result='<i class="fa fa-image"></i>';
							
						}elseif($fetmessage['image']==''){
							$result=$fetmessage['message'];
						}
 		 	 }else{ 
						$label=""; 
							$style="";
							$result="<small class='text-muted'>no messages yet</small>";

					}
 			?>
 			<a href="messages.php?unique_id_profile=<?php echo($user_identity)?>&usercontroller='messangerController'&unique_id_profile_receiver=<?php echo($id)?>&messangerController='messagesAPi'&type=1">
 				<div class="d-flex flex-row mt-2 p-2 userprofile_container">
			 
		 		<div class=" text-white p-2  text-center text-dark">
					<?php
					$new=$fettinggrp_users['name'];
					 $upper_name=strtoupper($new); 
					 $nee=substr(($upper_name),0,1);
					 echo("<h3>#</h3>");
					?>
				</div> 
			<div class="flex-grow-1  text-truncate ml-3">
				<div class="d-flex flex-row text-truncate">
					<div class="flex-grow-1 mt-2 ml-1 text-truncate">
						<h6><span class="text-dark"><?php
 						echo(substr(($fettinggrp_users['name']),0,15))
 					?></span></h6>
 					<span class="<?php echo$style?> text-truncate"><?php echo$label; echo$result?></span>
					</div>
					<div>
						<small class="badge badge-primary"><?php echo"Group"?></small>
					</div>
				</div>  
				<div class="flex-fill text-truncate ">  
					 
		 		</div>
		 		<div class="ml-2 text-muted text-truncate">
		 			<small><?php echo$fetgr['Totalusers']?> Members</small>
		 		</div> 
			</div>
		</div>
	</a>
		<hr>
 			<?php
 		}

 		  		 
 	}else{ 
    
	?>
	<p class="text-white"> no grps available</p>
	<?php
		}
?> 