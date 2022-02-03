<style type="text/css">
a:hover{
	color: white;
	text-decoration: none;
}
	.Explore{
		border-bottom: 2px solid #00b8ff;
		color: #00b8ff;
	}
	.users{
		border-bottom: 2px solid #00b8ff;
		color: #00b8ff;
	}
	.link{
		color: white;
		cursor: pointer;
	}
 
</style>
<?php
	include('header.php');
  
?>
	<div class="container-fluid mb-5"  id="mySite">
		<div class="row  justify-content-center">  
			<div class="col-lg-12">
				<div class="row"> 
					<div class="col-lg-12 p-3 text-white"> 
						<div class="d-flex flex-row font-weight-bold">
							<div class="">
								<h5><a  href="explore.php" class="p-2   tranding ">Trending</a></h5>						
							</div> 
							<div class="">
								<h5><a href="users.php"  class="p-2 users ">Users</a></h5>
							</div>
						</div> 
						<hr>
					</div>
					<div class="col-lg-12">
						<div class="row justify-content-center">
							<div class="col-lg-5">
								<?php require"c_php/userlist.php"?>
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

</body>
</html>