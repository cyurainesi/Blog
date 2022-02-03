 
  <div class="modal rounded-0" id="newusers">
    <div class="modal-dialog">
      <div  method="POST" class="modal-content  border-0 rounded-0 shadow"> 
        <div class="modal-header "> New user
          <button type="button" class="close" id="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body"   style="overflow-y: auto;">
         

      
<?php
$user_identity=$_SESSION['login'];
$selectallusers=mysqli_query($con,"SELECT * FROM users,follow where (users.unique_id=follow.follower ) and (follow.following='$user_identity')  and  unique_id!='$user_identity' and follow.follow=1  ");
		if ($selectallusers) {
			if (mysqli_num_rows($selectallusers)>0) {
				while ($fetchalluser=mysqli_fetch_array($selectallusers)) {
					$user_to_follow=$fetchalluser['unique_id'];
					?> 
					<div class="d-flex flex-row mt-2 p-2 ">
						<div class="userprofile "> 
							<?php
								 $new=$fetchalluser['username'];
								 $upper_name=strtoupper($new); 
								 $nee=substr(($upper_name),0,1);
								 echo("<h5>".$nee."</h5>");
							?>
						</div>
						<div class="flex-grow-1 ml-1 text-truncate">
							<div class="d-flex flex-row">
								<div class="">
									<h6><a class="" href="messages.php?unique_id_profile=<?php echo($user_identity)?>&usercontroller='messangerController'&unique_id_profile_receiver=<?php echo($user_to_follow)?>&messangerController='messagesAPi'&type=0"><?php echo$fetchalluser['username']?></a></h6>
									<small class="text-muted"><?php echo$fetchalluser['email']?></small>
								</div> 
							</div>   
						</div>
						<div>
							<a class="btn btn-sm" href="messages.php?unique_id_profile=<?php echo($user_identity)?>&usercontroller='messangerController'&unique_id_profile_receiver=<?php echo($user_to_follow)?>&messangerController='messagesAPi'">Message</a>
						</div>
					</div>
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

  		</div>   
      </div>
    </div>
  </div>