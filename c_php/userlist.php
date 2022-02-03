<?php 
$selectallusers=mysqli_query($con,"SELECT * FROM  users where users.unique_id!='$user_identity'");
		if ($selectallusers) {
			if (mysqli_num_rows($selectallusers)>0) {
				while ($fetchalluser=mysqli_fetch_array($selectallusers)) {
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