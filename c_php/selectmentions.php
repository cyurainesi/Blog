<?php

function selecting_mentioned($con,$name){
	$name="@".$name;
	$selecttas=mysqli_query($con,"SELECT * FROM mentions where mentioned_user='$name'")or die($con->error); 

		if(mysqli_num_rows($selecttas) > 0){ 
			?>
				<div class="col-lg-4">
					<div class="row">
						<div class="col-lg-12">
							Mentioned
							<hr>
						</div>
			<?php
			while ($fetchingisermentioned=mysqli_fetch_array($selecttas)) {
				?>
				
						<a href="viewpost.php?post_unique_id=<?php echo($fetchingisermentioned['post'])?>" class="text-light mb-2 linkmentions  col-lg-12"> 
							<?php echo"You have mentioned by <kbd>".$fetchingisermentioned['mentioner_user']."</kbd> in post" ?>
						</a> 
				<?php
			} 
			?> 
				</div>
			</div>
			<?php			
		}
}


function selectcounting_mentions($con,$name)
{
	$name="@".$name;
	$selecttas=mysqli_query($con,"SELECT count(id) AS totalcount FROM mentions where mentioned_user='$name'")or die($con->error); 
 
		if(mysqli_num_rows($selecttas) > 0){
			$totla=mysqli_fetch_array($selecttas);
			echo($totla['totalcount']); 
		} 
}
?>

