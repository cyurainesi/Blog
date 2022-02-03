
<?php
$selectc=mysqli_query($con,"SELECT * FROM comments,posts,users where posts.post_unique_id=comments.post_id and comments.user_unique_id=users.unique_id and posts.post_unique_id='$post_unique_id' order by comments.id desc ")or die($con->error);
		if ($selectc) {
			if (mysqli_num_rows($selectc)>0) {
				?> 
				<div class="" id="commentconatainer">
				<?php
				while($fetchcommented=mysqli_fetch_array($selectc)){
					$comment_id=$fetchcommented['comment_unique_id'];
					$username_replied=$fetchcommented['username'];
					?>

					<div class="row  p-2 row mt-2 "> 
						<div class="col-lg-12 comments"> 
							<div class="d-flex flex-row">
								<div class="flex-grow-1 text-muted"> 
									<a href="user.php?unique_id_profile=<?php echo($fetchcommented['username']) ?>">
										<?php echo$fetchcommented['username']?></a>
								</div> 
							</div> 
						</div>
						<div class="col-lg-12 text-break"> 
						 
							<p class=""> 
								<?php 
								$content=$fetchcommented['comment']; 
								$post_id=$comment_id;
								hashtagse($content,$post_id,$con);
								if(preg_match_all('/#(\w+)/', $content, $matches)){
								$hashtags=$matches[1];
								$content=preg_replace('/#(\w+)/', '<a class="hashtags" href="hashtags.php?hashtags=$1">#$1</a>', $content); 
								echo$content;
								}elseif (preg_match_all('/@(\w+)/', $content, $matches)) {
								$hashtags=$matches[1];
								$content=preg_replace('/@(\w+)/', '<a class="hashtags"    href="user.php?unique_id_profile=$1">@$1</a>', $content); 
								echo$content;	 
								}else{
									echo$content;
								}
								?>

							</p>
						</div>
						<div class="col-lg-12"> 
							<form class="d-flex flex-row" method="POST">
								<div class="flex-grow-1 text-muted">
									<small><?php 
      									echo date('d,M, Y ', strtotime($fetchcommented['date']));
								 	 ?></small>
								</div>
								<div class="mt-1">
									<?php repliedcount($comment_id,$con,$user_to_follow,$user_identity,$username_replied) ?> <small>Replies</small>
								</div>
								<div class=""> 

									<input type="hidden" name="comment_unique_id" value="<?php echo$comment_id?>">
										<?php if($user_identity==$fetchcommented['unique_id']):?>
											<button class="btn text-danger btn-sm" type="submit" name="deletecomment">Delete</button>
										<?php endif?>

								</div>
							</form>
						</div>
					</div>
					<hr>
					<div class="d-flex flex-row  ml-4 mb-4">
						<div class="flex-grow-1">
						<?php require"replyarea.php"?> 
						</div>
					</div>
					<div class="row  ml-4">
						<div class="col-lg-12">
							<?php replied($comment_id,$con,$user_to_follow,$user_identity,$username_replied)?>
						</div>
					</div> 
					<?php
				}
					 deleteall($comment_id,$user_identity,$con);

			?>
		</div> 
			<?php
		}
				}else{ 
			$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		}

?>


<script type="text/javascript">
   $(document).ready(function(){ 
   	$("#commentconatainer").hide();
    $("#commentsLoad").click(function(){
        $("#commentconatainer").show();
    }); 
   
});
</script>