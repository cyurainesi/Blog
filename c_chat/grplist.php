<div class="d-flex flex-row grpcontainer">
	
<?php
$selectallusersgrps=mysqli_query($con,"SELECT * FROM groups,users where admin_id!='$user_identity' and users.unique_id=groups.admin_id ")or die($con->error);
if (mysqli_num_rows($selectallusersgrps)>0) {
 	while ($fetgrps=mysqli_fetch_array($selectallusersgrps)) {
 		$id=$fetgrps['id'];
 		$sqlect=mysqli_query($con, "SELECT * FROM grp_users where grp_id='$id' and 	user_id='$user_identity' ")or die($con->error); 
 		$fetgr=mysqli_fetch_array($sqlect);
 		 
 		?>
 		<div class="col-lg-2 grps shadow rounded shadow-sm bg-white p-2 ml-2">
 			<div class="row">
 				<div class="col-lg-12">
 					<img src="images/<?php echo$fetgrps['profile']?>" class="img-thumbnail" height="100px" width="100%">
 				</div>
 				<div class="col-lg-12 text-center p-2 text-primary">
 					<h4><?php
 						echo(substr(($fetgrps['name']),0,15))
 					?></h4>
 				
 				</div>
 				<div class="col-lg-12">
 					<?php
 						echo("<span class='bg-primary text-white p-1'>".$fetgrps['username']."</span> group admin")
 					?> 
 					<hr>
 					<p><?php echo(substr(($fetgrps['description']),0,60))?> </p>
 				</div>
 				<div class="col-lg-12 x"> 
 					<form method="POST">
 						<input type="text" name="group_id" value="<?php echo$fetgrps['id']?>" hidden>
 						<input type="text" name="admin_id" value="<?php echo$fetgrps['admin_id']?>" hidden>
 						<input type="text" name="users_id" value="<?php echo$user_identity?>" hidden>

 						<button class="btn btn-block shadow" name="Join" type="submit"> Join</button>
 						<?php require"c_chat/joingrp.php"?>
 					</form>
 					
 				</div>
 			</div>
 			</div>
 		
 		<?php  		 
 	}
}else{
	?>
	no grps available
	<?php
}
?></div>