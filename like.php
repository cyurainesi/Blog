
<?php
$selectclikes=mysqli_query($con,"SELECT * FROM likes,posts,users where posts.post_unique_id=likes.post_id and likes.user_unique_id=users.unique_id and posts.post_unique_id='$post_unique_id' and liked=1 and likes.user_unique_id='$user_identity'");
		if ($selectclikes) {
			if (mysqli_num_rows($selectclikes)>0) { 
				$label='
<svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 512 512" fill="#58a6ff"><path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"/></svg>
				<span class="liked labelicon" style="color:#58a6ff"> Liked</span> ';
				$title="Hate";
			}else{
				#$label="<span class='like'>Like</span>";
				$label='

<svg class="svg-icon" viewBox="0 0 20 20" width="20px">
							<path d="M9.719,17.073l-6.562-6.51c-0.27-0.268-0.504-0.567-0.696-0.888C1.385,7.89,1.67,5.613,3.155,4.14c0.864-0.856,2.012-1.329,3.233-1.329c1.924,0,3.115,1.12,3.612,1.752c0.499-0.634,1.689-1.752,3.612-1.752c1.221,0,2.369,0.472,3.233,1.329c1.484,1.473,1.771,3.75,0.693,5.537c-0.19,0.32-0.425,0.618-0.695,0.887l-6.562,6.51C10.125,17.229,9.875,17.229,9.719,17.073 M6.388,3.61C5.379,3.61,4.431,4,3.717,4.707C2.495,5.92,2.259,7.794,3.145,9.265c0.158,0.265,0.351,0.51,0.574,0.731L10,16.228l6.281-6.232c0.224-0.221,0.416-0.466,0.573-0.729c0.887-1.472,0.651-3.346-0.571-4.56C15.57,4,14.621,3.61,13.612,3.61c-1.43,0-2.639,0.786-3.268,1.863c-0.154,0.264-0.536,0.264-0.69,0C9.029,4.397,7.82,3.61,6.388,3.61"></path>
						</svg>


				<span class="liked labelicon" style="color:#58a6ff"> Like</span> 
				'; 
				$title="Love";
			}
		}else{
			
		}
?>

<form method="POST" title="<?php echo$title?>" class="d-flex flex-row  justify-content-center">
	<input type="text" id="post_id" name="post_id" value="<?php
					 echo($post['post_unique_id']);
					?>" hidden>
	<span class="mr-2" style="color:#58a6ff;font-size: 15px;"><?php require"c_php/likedcount.php"?></span>
	<button type="submit" name="like" class="btn countingbtn btn-sm btn-sm "><?php echo$label?></button> 
</form> 