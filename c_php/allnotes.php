
<?php
$selectc=mysqli_query($con,"SELECT * FROM comments,posts,users where posts.post_unique_id=comments.post_id and comments.user_unique_id=users.unique_id and posts.post_unique_id='$post_unique_id' order by comments.id asc");
		if ($selectc) {
			if (mysqli_num_rows($selectc)>0) {
				while($fetchcommented=mysqli_fetch_array($selectc)){?>

					<div class="row border-top p-2 row mt-2 "> 
						<div class="col-lg-12 comments"> 
							<div class="d-flex flex-row">
								<div class="flex-grow-1"> 
									<a href="user.php?unique_id_profile=<?php echo($fetchcommented['unique_id']) ?>"><?php echo$fetchcommented['username']?></a>
								</div> 
							</div> 
						</div>
						<div class="col-lg-12 text-break"> 
						 
							<p class="text-dark "> 
								<?php 
								$content=$fetchcommented['comment']; 
								if(preg_match_all('/#(\w+)/', $content, $matches)){
								$hashtags=$matches[1];
								$content=preg_replace('/#(\w+)/', '<a href="hashtags.php?hashtags=$1">#$1</a>', $content); 
								echo$content;
								}elseif (preg_match_all('/@(\w+)/', $content, $matches)) {
								$hashtags=$matches[1];
								$content=preg_replace('/@(\w+)/', '<a href="#/tagged/$1">@$1</a>', $content); 
								echo$content;	 
								}else{
									echo$content;
								}
								?>

							</p>
						</div>
						<div class="col-lg-12"> 
							<form class="d-flex flex-row" method="POST">
								<div class="flex-grow-1 mt-2">
									<small><?php 
      									echo date('d,M, Y ', strtotime($fetchcommented['date']));
								 	 ?></small>
								</div>
								<div class=""> 

									<input type="hidden" name="comment_unique_id" value="<?php echo$comment_id?>">
										<?php if($user_identity==$fetchcommented['unique_id']):?>
											<button class="btn btn-sm" type="submit" name="deletecomment">Delete</button>
										<?php endif?>

								</div>
							</form>
						</div>
					</div>
					<hr>
					<?php
			}}
		}else{ 
			$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		}
?>