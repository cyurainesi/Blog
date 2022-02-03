<?php 
$selectallusers=mysqli_query($con,"SELECT * FROM users,follow where users.unique_id!='$user_identity' and follow.follower!='$user_identity' and follow.following!='$user_identity' ORDER BY RAND()
LIMIT 2");
		if ($selectallusers) {
			if (mysqli_num_rows($selectallusers)>0) {

				while ($fetchalluser=mysqli_fetch_array($selectallusers)) {

					$user_identify=$fetchalluser['follower'];
					$user_to_follow=$fetchalluser['unique_id'];
					 require"userformat.php";
					 ?> 
					 <?php
				}
				 
			}else{
				echo("no users");
			}
		}else{ 
			$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		}
?>