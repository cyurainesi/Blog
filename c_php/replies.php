
<?php

function replied($xr,$con,$user_to_follow,$user_identity,$username_replied)
{
	$selectreply=mysqli_query($con,"SELECT * FROM replys,comments,users where
								 replys.comment_unique_id='$xr'and 
								 replys.user_unique_id=users.unique_id and 
								 replys.comment_unique_id=comments.comment_unique_id order by replys.date desc ")or die($con->error);
		if ($selectreply):
			if (mysqli_num_rows($selectreply)>0):
				while($replies=mysqli_fetch_array($selectreply)):
					?>

					<div class="row"> 
						<div class="col-lg-12 reply"> 
							<div class="d-flex flex-row">
								<div class="flex-grow-1 ">
								<i class="fa fa-arrow-right"></i>	<a href="user.php?unique_id_profile=<?php echo($replies['username']) ?>" class="text-muted"><?php echo$replies['username']?></a> <small>replying to<a href="user.php?unique_id_profile=<?php echo($username_replied) ?>"> @<?php echo$username_replied?></a></small>
								</div> 
							</div>
							
						</div>
						<div class="col-lg-9 text-break"> 
						 
							<p class=" "> 
								<?php 
								$replycontent=$replies['reply']; 
								if(preg_match_all('/#(\w+)/', $replycontent, $matches)){
								$hashtags=$matches[1];
								$replycontent=preg_replace('/#(\w+)/', '<a class="hashtags" href="hashtags.php?hashtags=$1">#$1</a>', $replycontent); 
								echo$replycontent;
								}elseif (preg_match_all('/@(\w+)/', $replycontent, $matches)) {
								$hashtags=$matches[1];
								$replycontent=preg_replace('/@(\w+)/', '<a class="hashtags"    href="user.php?unique_id_profile=$1">@$1</a>', $replycontent); 
								echo$replycontent;	 
								}else{
									echo$replycontent;
								}
								?> 
							</p>
						</div>
						<div class="col-lg-12">  
							<form class="d-flex flex-row" method="POST">
								<div class="flex-grow-1 text-muted">
									<small><?php 
      							echo date('d,M, Y ', strtotime($replies['date']));
								  ?></small>
								</div>
								<div class=""> 

									<input type="hidden" name="reply_unique_id" value="<?php echo$replies['reply_unique_idd']?>">
									<?php if($user_identity==$replies['unique_id']):?>
									<button class="btn text-danger btn-sm" type="submit" name="deletereply">Delete</button>

										<?php endif?>
								</div>
							</form>
						</div>
					</div>
					<?php 
			endwhile;
			
	if(isset($_POST['deletereply'])) {
		echo"hw;;;";
		$id=$_POST['reply_unique_id']; 	 
	$sqldelete=mysqli_query($con,"DELETE FROM replys where reply_unique_idd='$id' and user_unique_id='$user_identity'");
	if ($sqldelete) {
		echo"<div class='d-flex flex-row success'>
					<div class='flex-fill'>Reply deleted</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
					echo "<meta charset='utf-8' http-equiv='refresh' content='0.01;'>";
	}else{
		echo"<div class='d-flex flex-row error'>
					<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
	}
	
}
			endif;
		endif;
}

				 
?>