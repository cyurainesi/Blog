

<div class="d-flex flex-row mt-2 p-2 rounded text-truncate">
	<div class=" text-white p-2  text-center"> 
		<?php profileuser($fetchalluser['unique_id'],$fetchalluser['username'],$fetchalluser['username'])?>	 
	</div>
	<div class="flex-fill mt-3 ml-3  text-truncate">
		<a  href="user.php?unique_id_profile=<?php echo($fetchalluser['username']) ?>"><?php echo$fetchalluser['username']?> <span class="text-white"><?php verified($fetchalluser['unique_id'])?></span> </a>
		<p class="text-truncate text-muted"><?php echo $fetchalluser['bio'];?></p>
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