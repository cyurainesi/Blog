
	<?php 
$selectallusers=mysqli_query($con,"SELECT * FROM  users  where users.unique_id!='$user_identity' order by users.unique_id desc limit 7");
		if ($selectallusers) {
			if (mysqli_num_rows($selectallusers)>0) {
				while ($fetchalluser=mysqli_fetch_array($selectallusers)) { 
					$user_to_follow=$fetchalluser['unique_id']; 
				  require"userformat.php";

			 
		}}}else{
			echo$con->error;
			}
 ?>

