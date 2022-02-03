	<div class="row mb-3">
	<div class="col-lg-12">
		<div class="d-flex flex-row">
			<div class="sticky-top profilepost">
				<?php profileuser($post['unique_id'],$post['username'],$post['username']);?>
			</div>
			<div class="row ml-1 postreal pt-2">
				<div class="col-lg-12">
					<div class="d-flex flex-column">
						<div class="">
							<div class="d-flex flex-row text-truncate">
								<div class="flex-grow-1 text-truncate">
									<a class="text-decoration-none  text-muted " href="user.php?unique_id_profile=<?php echo($post['username']) ?>"> 
										<small class="text-truncate">
											<?php  echo($post['username']);
												?>
										</small>
									</a><span class="ml-2"><?php verified($post['user_unique_id'])?></span>
								</div> 

								<div class="text-truncate">
									<small class="text-truncate"><?php 
									echo date('d,M, Y ', strtotime($post['date']));
								  ?></small>	
								</div>
								<div>
									<?php if($user_identity!=$user_to_follow){ include"c_php/followbtn.php";}?>

								</div>
							</div>
						</div>
						<div>
						<?php if($post['location'] != ''){?>
							<small><i class="fa fa-map-marker"></i> <?php echo" ".$post['location']?></small>
						<?php }?>
						</div>
						<div class="">
							<small><?php followersuggestions($post['unique_id'])?></small> 
						</div> 
					</div>
				</div>
				<div class="col-lg-12 rounded p-2 text-break">

						<?php

				if (!empty($post['post'])) {
				?>
				<p class=""> 
					<?php 
					$content=$post['post']; 
					$post_id=$post['post_unique_id'];
					hashtagse($content,$post_id,$con);
					if(preg_match_all('/#(\w+)/', $content, $matches)){
					$hashtags=$matches[1];
					$content=preg_replace('/#(\w+)/', '<a class="hashtags" href="hashtags.php?hashtags=$1">#$1</a>', $content); 

					echo$content;

					}elseif (preg_match_all('/@(\w+)/', $content, $matches)) {

					$content=$post['post']; 
					$post_id=$post['post_unique_id'];

					Action_mention($con,$content,$post_id,$username);
					$hashtags=$matches[1];

					$content=preg_replace('/@(\w+)/', '<a class="hashtags"    href="user.php?unique_id_profile=$1">@$1</a>', $content);

					$inner=preg_replace('/@(\w+)/', '@$1', $content); 
					echo$content;	

					}

					else{
						echo$content;
					}
					?>

				</p>
				<?php
					}elseif (!empty($post['link'])) {
						?>
					<p class=" ">
					<?php
						$linked=$post['link'];
						echo("<a href='$linked'>".$post['link']."</a>");
					?>
					</p>
						<?php
					}elseif (!empty($post['image'])) {
						 ?>
					<?php
						if ($post['image_caption']!='') {
							?>
							<p class="p-3"> 
								<?php 
						$content=$post['image_caption']; 
						$post_id=$post['post_unique_id'];
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

							<?php
						} 
						?>
						<img src="images/<?php echo($post['image'])?>" class="border-0 img-thumbnail">
						 <?php
						}elseif($post['video']!=''){
						?>
						<?php
						if ($post['image_caption']!='') {
							?>
							<p class="p-3"> 
								<?php 
						$content=$post['image_caption']; 
						$post_id=$post['post_unique_id'];
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

							<?php
						} 
						?>

						<video src="videos/<?php echo($post['video'])?>" height="200" class="img-thumbnail border-0" controls>browser doesn't support this video</video>
				<?php }?>


						<div class="col-lg-12 followerpartlike pt-3">  
							<div class="d-flex flex-row justify-content-center"> 
								<div class=" flex-fill " id="<?php echo($post['id']) ?>">
									<?php require"like.php"?> 
								</div>
								<div class="flex-fill btncomment<?php echo($post_unique_id)?>">
									<?php require"comment.php"?>
								</div> 

								<div  class="flex-fill " id="<?php echo("dele".$post_unique_id)?>">
									<?php if($user_identity==$post['unique_id']){?>
										<a href="#" class="btn btn-sm text-danger font-weight-bold"><i class="fa fa-trash"></i> <span class="labelicon">Delete</span> </a>	<?php }?>
								</div>
							
								<div class="flex-fill  ">
									<?php require"c_php/save.php"?>
								</div>	
												
								 
							</div> 
							<div class="d-flex flex-row pr-2 ">
								<?php
									if ($fetchlikes['totalcount']==0) { 
									}else{ 
								?>
								<small id="<?php echo($post_unique_id)?>" class="">
									<a href='#index?postU_ideddd=<?php echo($post_unique_id)?>'> liked by: <?php require"c_php/likedusers.php"?></a></small>
								<?php
									}
								?>
								<?php require"userlikedlist.php"?>
							</div> 
						</div> 
						<div class="col-lg-12 comment<?php echo($post_unique_id)?>">
							<hr> 
							<?php include"createcomment.php"?> 
						</div>
						<div>
							<hr>
							<?php require"c_php/loadcommentbtn.php"?>
							
						</div>
					</div>
			</div> 
		</div>

		<div class="row commentarea">
			<div class="col-lg-12">  
				<div class="ml-5"> 
					<div>
						<?php require"c_php/noteslist.php"?>
					</div>
				</div>
				
			</div>
						 
		</div>
	</div> 
</div>

<script type="text/javascript">
	     $(".comment<?php echo($post_unique_id)?>").hide();  
        function getpost_comments(){  
            $(".comment<?php echo($post_unique_id)?>").show(); 
        }

        $(".btncomment<?php echo($post_unique_id)?>").click(function () {
        	$(".comment<?php echo($post_unique_id)?>").show();
        });

</script>



<?php require"deletepost.php"?>
<?php require"allnotes.php"?>
<?php require"c_php/Deletepost.php"?> 