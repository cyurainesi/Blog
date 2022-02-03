<style type="text/css">
a:hover{
	color: white;
	text-decoration: none;
}
	.Explore{
		border-bottom: 2px solid #00b8ff;
		color: #00b8ff;
	}
	 
	.trandinghash {
		background-color: #074384;
		
		height: 50px;
		width: 50px;
		border-radius: 50%;
		padding-top:10px ;
	}


	.link{
		color: white;
		cursor: pointer;
	}
	.hashtag{
		font-size: 20px;
		position: absolute;
		top: 30px;
		color: #074384;
		left: 80px;
	}
 
</style>
<?php
	include('header.php');
	if (isset($_GET['hashtags'])){
		$hashtags=$_GET['hashtags'];
	}else{
		$hashtags=" ";
	}
	
  
?>
	<div class="container-fluid mb-5"  id="mySite">
		<div class="row  justify-content-center">  
			<div class="col-lg-12">
				<div class="row"> 
					<?php 
						$selectcount=mysqli_query($con,"SELECT count(post_unique_id)  AS totalcountpost FROM posts,users where posts.user_unique_id=users.unique_id and posts.post like'%#$hashtags%'")or die($con->error);
						$selct=mysqli_fetch_array($selectcount);
					?>
					<div class="col-lg-12 p-3"> 
						<div class="d-flex flex-row font-weight-bold">
							<div class="trandinghash  text-center">
								<h4 class="text-white">#</h4> 
								<a  href="#" class="hashtag">#<?php echo$_GET['hashtags']?></a>		
							</div>  
						</div> 
						<hr>
					</div>
					<div class="col-lg-12 mb-5">
						<div class="row justify-content-center">
							<div class="col-lg-12">
								<?php echo$selct['totalcountpost']?> Posts
							</div>
							<div class="col-lg-6">
								<?php include"c_php/hashtags.php"?>
							</div>  
						</div>	
					</div> 
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="vendor/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="vendor/jquery-ui.min.js"></script>
</body>
</html>