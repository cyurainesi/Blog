 
	<div class="col-lg-5 p-2 bg-white ml-2 mt-3" style="height:500px">  
				 <div class="row">
					<div class="col-lg-12">
						<div class="d-flex flex-row text-truncate">
							<div class="flex-grow-1">
								<div class="d-flex flex-row text-truncate">
									<div class=" text-truncate">
										<a  class="text-decoration-none " href="user.php?unique_id_profile=<?php echo($post['unique_id']) ?>"> 
										<small class="text-dark"><?php
											 echo($post['username']);
										?></small>,
										<small class="text-muted "><?php
											 echo($post['email']);
										?></small></a>
									</div>
								</div>
							</div>   
							<div class="">
								<?php ($user_identity!=$user_to_follow)? include"c_php/followbtn.php":"";?>
							</div> 
						</div>
					</div> 
					<div class="col-lg-10 text-break">
						<?php
if (!empty($post['post'])) {
?>
<?php
 echo($post['post']);
?>
<?php
}elseif (!empty($post['link'])) {
	?>

	<p class="text-break"><?php
		$linked=$post['link'];
		 echo("<a href='$linked' class='text-break'>".$post['link']."</a>");
		?>
	</p>
	<?php
}elseif (!empty($post['image'])) {
	 ?>
<?php
	if ($post['image_caption']!='') {
		?>
		 <?php echo$post['image_caption']?> 
		<?php
	} 
	?>
	<p class="mb-5"><img src="images/<?php echo($post['image'])?>" class="border-0 img-thumbnail"></p>

	 <?php
	}
?>


						
					</div>
					<div class="col-lg-12 mt-3" style="position: absolute;bottom: 0;left: 0">
						<hr>  
						<div class="d-flex flex-row"> 
							<div class="">
								<?php require"like.php"?>
							</div>
							<div>
								<?php require"comment.php"?>
							</div>
							<div class="text-right flex-grow-1 pr-2">
								<?php
									if ($fetchlikes['totalcount']==0) { 
									}else{ 
								?>
								<small id="<?php echo($post_unique_id)?>">
									<a href='#index?postU_ideddd=<?php echo($post_unique_id)?>'> liked by: <?php require"c_php/likedusers.php"?></a></small>
								<?php
									}
								?>
							</div> 							
						</div>
					</div> 
				</div> 
	</div>

<?php require"userlikedlist.php"?>
<?php require"deletepost.php"?>
<?php require"c_php/Deletepost.php"?>
