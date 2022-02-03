<?php 

$selectcallstories=mysqli_query($con,"SELECT * FROM users,stories where stories.user_unique_id=users.unique_id order by stories.id desc")or die($con->error);

if(mysqli_num_rows($selectcallstories)>0){

	while($fetchstories=mysqli_fetch_array($selectcallstories)){
 ?>
<a  href="viewstory.php?unique_id_profile=<?php echo($user_identity)?>&user_to_follow=<?php echo$fetchstories['user_unique_id']?>" class="row mt-2 bg-white border p-1 rounded">
	<div class="col-lg-12">
		<div class="d-flex flex-row">
			<div class="userstoryimage">  
				<img src="./images/<?php echo$fetchstories['image']?>" class="img-thumbnail " > 
			</div>
			<div class="p-2">
				<?php echo$fetchstories['username'] ?> 
				Added to status on <?php 
					      				echo date('H:i A  D', strtotime($fetchstories['date']));
									?>
			</div>
		</div>
	</div>
</a> 
 <?php }}else{ ?>
 	no stories available
 <?php } ?>