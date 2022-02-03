<?php
	include('header.php');
?>

<style type="text/css">
	.home{
		border-bottom: 2px solid #58a6ff;
		color:#58a6ff;
	}


</style> 

	<div class="container-fluid mb-5" id="mySite">
		<div class="row p-2 justify-content-center">   
			<div class="col-lg-4 headerleft">
				<div class="row justify-content-center fixedleft">  
					<div class="col-lg-12 ">
						<div class="row justify-content-center contaner">
							<div class="col-lg-12">
								<div class="row sticky-top justify-content-center">
									<div class="col-lg-12"> 
										<a href="create.php" style="background:#58a6ff ;color: #ffff;border:1px solid #58a6ff;" class="btn btn-block "><i class="fa fa-plus"></i> Create post </a>
									</div>									
								</div>
							</div>
							<div class="col-lg-11 mt-3  shadow-sm">
								<div class="row justify-content-center">
									<div class="col-lg-12">
										<?php include"profile.php"?>
									</div>
									<div class="col-lg-12 activity pb-3 font-weight-bold">
										<div class="d-flex flex-row justify-content-center"> 
								
										<a href="#Followers" class="flex-fill" id="followerBtn"> 
										<?php Followers($user_identity,$con)  ?> Follower
										</a>
										<a  href="#following" class="flex-fill" id="followingBtn"> 
											<span><?php Followings($user_identity,$con) ?></span> Following
										</a>
										<a href="#Post" class="flex-fill">
											<?php echo$fetchalluserpost['total'];?> Posts</a>
										</div>
									</div> 
								</div>
							</div> 
							<div class="col-lg-11 mt-3 p-3 rounded shadow-sm">
								<div class="row">
									<div class="col-lg-12">
										<hr>
										Suggested users
									</div>
									<div class="col-lg-12">
										<?php require"suggestion.php";?> 
									</div> 
								</div>
							</div> 
							<div class="col-lg-12 mt-2 text-center ">
								<hr>
								<?php require"footer.php";?> 
							</div>
						</div> 
					</div>
				</div>
			</div> 
			<div class="col-lg-6 mb-5">
				<div class="row justify-content-center">
					<di class="col-lg-12 createpostinphone mb-3">
						<a href="create.php" style="background:#58a6ff ;color: #ffff;border:1px solid #58a6ff;" class="btn btn-block "><i class="fa fa-plus"></i> Create post </a>
					</di>
					<div class="col-lg-12 text-break ml-5 mb-3">
						<?php require"c_php/sort.php"?>
					</div>
					<div class="col-lg-12">
						<?php
							require"c_php/postlist.php";
						?>
					</div>
					<div class="col-lg-12 mt-4">
						<div class="row justify-content-center">
							<div class="col-lg-11 p-3">
								Users Joined
								<hr>
							</div>
							<div class="col-lg-11">
								<?php require"registeredusers.php"?> 
							</div>
					</div>
				</div> 
				<div class="col-lg-12 mt-2 text-center ">
					<hr>
					<?php require"footer.php";?> 
				</div>
			</div>  
		</div>
	</div>
</div>
</div>	 
</body>
</html>