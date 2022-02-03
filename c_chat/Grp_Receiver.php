<?php
$fetchallgrpprofile=mysqli_fetch_array($selectallusersgrps);
$id=$fetchallgrpprofile['id'];
$selectallusersgrpsadmin=mysqli_query($con,"SELECT * FROM groups,users where admin_id!='$user_identity' and users.unique_id=groups.admin_id and groups.id='$user_receiver'")or die($con->error);
if (mysqli_num_rows($selectallusersgrpsadmin)>0) {
$fetadmin=mysqli_fetch_array($selectallusersgrpsadmin);
$admin=$fetadmin['username'];
}else{
	$admin="";
}
?>

<div class="d-flex shadow-sm flex-row mt-2 pl-3"> 
	<div class="userprofile">  
		<div class=" text-white p-2  text-center userprofileliked"  style="background: #00b8ff;">
			<?php
			$new=$fetchallgrpprofile['name'];
			 $upper_name=strtoupper($new); 
			 $nee=substr(($upper_name),0,1);
			 echo("<h3>".$nee."</h3>");
			?>
		</div>
	</div> 
	<div class="flex-grow-1 p-2 text-truncate">
		<h5><?php echo$fetchallgrpprofile['name']?></h5> 
		<span class="text-muted"><?php echo$fetchallgrpprofile['description']?></span>
		<small class=" float-right badge badge-primary"><?php echo($admin)?> Admin</small>
	</div> 
	<div class="">
		<a href="#info"  id="info" class="btn btn-sm btn-light">Settings</a>
	</div>

</div> <?php  include"c_chat/editgrp.php"?>