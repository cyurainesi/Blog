
<?php
$selectc=mysqli_query($con,"SELECT * FROM comments,posts,users where posts.post_unique_id=comments.post_id and comments.user_unique_id=users.unique_id and posts.post_unique_id='$post_unique_id' order by comments.id desc ")or die($con->error);
		if ($selectc) {
			if (mysqli_num_rows($selectc)>0) {
				?>
			<div class="col-lg-12 " id="commentsLoad">
					<div class="flex-fill" style="cursor: pointer;">
						<small>Load comments</small>
					</div>
				</div>
				 
			<?php
		}
				}else{ 
			$message="<div class='d-flex flex-row error'>
						<div class='flex-fill'>".$con->error."</div><div class='ml-2 disabled'><i class='fa fa-times-circle'></i></div></div>";
		}

?>


<script type="text/javascript">
   $(document).ready(function(){ 
   	$("#commentconatainer").hide();
    $("#commentsLoad").click(function(){
        $("#commentconatainer").show();
    }); 
   
});
</script>