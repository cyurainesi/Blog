<?php 
$selectlikedusers=mysqli_query($con,"SELECT * FROM likes,posts,users where posts.post_unique_id=likes.post_id and likes.user_unique_id=users.unique_id and posts.post_unique_id='$post_unique_id' and liked=1 and posts.post_unique_id='$post_unique_id' order by likes.date desc ");
		if ($selectc) {
			if (mysqli_num_rows($selectc)>0) {
				while ($fetchlikeduser=mysqli_fetch_array($selectlikedusers)) {
					?>
					<div class="d-flex flex-row text-break">
						<div class=" text-white p-2  text-center userprofileliked">
							<?php
							 $new=$fetchlikeduser['username'];
							 $upper_name=strtoupper($new); 
							 $nee=substr(($upper_name),0,1);
							 echo("<h3>".$nee."</h3>");
							?>
						</div>
						<div class="flex-fill mt-3 ml-3">
							<a href="user.php?unique_id_profile=<?php echo($fetchlikeduser['username']) ?>"><?php echo$fetchlikeduser['username']?></a>
						</div>
						<div class="mt-3"> 
							liked on <small><?php 
      							echo date('d,M, Y ', strtotime($fetchlikeduser['date']));
								  ?></small>
						</div>
					</div>
					<hr>
					<?php
				}
				 
			}
		}else{ 
			$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		}
?>