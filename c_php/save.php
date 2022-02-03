<form method="POST" title="Save post" class="d-flex flex-row ml-1" id="">
	<div class="flex-grow-1">
	<input type="text" name="post_id" value="<?php
					 echo($post['post_unique_id']);
					?>"  class="form-control rounded-0" hidden>  
	<input type="text" name="postedby" value="<?php
					 echo($post['unique_id']);
					?>" hidden>
	</div> 
	<?php
	$post_unique_id=$post['post_unique_id'];
$sqll324=mysqli_query($con,"SELECT * FROM posts,users,saved_posts WHERE users.unique_id=saved_posts.postedby and saved_posts.post_id=posts.post_unique_id and saved=1 and saved_posts.user_unique_id='$user_identity' and saved_posts.post_id='$post_unique_id' order by posts.date asc ");
				if ($sqll324) {
					 if (mysqli_num_rows($sqll324) >0) {
					 	$style="";
					 	$content="<i class='fa fa-check-circle' title='saved' style='color:#58a6ff'></i><span class='labelicon' style='color:#58a6ff'>Saved</span>";
					 }else{ 
					 	$style="";
					 	$content='

					 	<svg class="svg-icon" viewBox="0 0 20 20" width="20">
							<path d="M17.684,7.925l-5.131-0.67L10.329,2.57c-0.131-0.275-0.527-0.275-0.658,0L7.447,7.255l-5.131,0.67C2.014,7.964,1.892,8.333,2.113,8.54l3.76,3.568L4.924,17.21c-0.056,0.297,0.261,0.525,0.533,0.379L10,15.109l4.543,2.479c0.273,0.153,0.587-0.089,0.533-0.379l-0.949-5.103l3.76-3.568C18.108,8.333,17.986,7.964,17.684,7.925 M13.481,11.723c-0.089,0.083-0.129,0.205-0.105,0.324l0.848,4.547l-4.047-2.208c-0.055-0.03-0.116-0.045-0.176-0.045s-0.122,0.015-0.176,0.045l-4.047,2.208l0.847-4.547c0.023-0.119-0.016-0.241-0.105-0.324L3.162,8.54L7.74,7.941c0.124-0.016,0.229-0.093,0.282-0.203L10,3.568l1.978,4.17c0.053,0.11,0.158,0.187,0.282,0.203l4.578,0.598L13.481,11.723z"></path>
						</svg>


					 	<span class="labelicon" style="color:#58a6ff">Save</span>';
					 }
					}

?>

	<button type="submit" name="saved_post" class="btn font-weight-bold btn-sm <?php echo$style?>" id="btn"><?php echo$content?></button> 
</form>

