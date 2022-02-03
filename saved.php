<style type="text/css">
	.saved{
		border-bottom: 2px solid #00b8ff;
		color: #00b8ff;
	}
</style>
<?php
	include('header.php');
?> 
	<div class="container mb-5" id="mySite">
		<div class="col-lg-12 border-bottom p-3"> 
			<div class="d-flex flex-row font-weight-bold">
				<div class="">
					<h5> Saved posts </h5>						
				</div> 
			</div>  
		</div>
		<div class="row p-2 justify-content-center">  
			<div class="col-lg-7 mb-5 mt-4">
				<div class="row">
					<div class="col-lg-12">
						<?php
							require"c_php/savedlist.php";
						?>
					</div>  
				</div>  
			</div>
			<div class="col-lg-12 mt-2 text-center ">
				<hr>
				<?php require"footer.php";?> 
			</div>
		</div>
	</div> 
</body>
</html>