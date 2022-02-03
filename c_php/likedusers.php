<?php
$selectlikedusers=mysqli_query($con,"SELECT * FROM likes,posts,users where posts.post_unique_id=likes.post_id and likes.user_unique_id=users.unique_id and posts.post_unique_id='$post_unique_id' and liked=1 limit 4");
		if ($selectc) {
			if (mysqli_num_rows($selectc)>0) {
				while ($fetchlikeduser=mysqli_fetch_array($selectlikedusers)) {
					$user_to_follow=$fetchlikeduser['unique_id'];
					if ($fetchlikeduser['unique_id']==$_SESSION['login']) {
						echo"<strong>You</strong>,";
					}else{
						$y="";
						echo"".$y.$fetchlikeduser['username'].",";
					}
					
				}
				 
			}
		}else{
			$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		}
?>