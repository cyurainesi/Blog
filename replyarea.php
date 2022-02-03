<script type="text/javascript">
	
 function show_replybtn() {  
            $("#sbtn").show();             
        }  

</script>
<form method="POST" title="Reply to notes" class="d-flex notes flex-column ">
	<div class="d-flex flex-row">
	<div class="">
		<?php require"logged.php"?>
	</div>
	<div class="flex-grow-1">
	<input type="text" name="post_id" value="<?php
					 echo($post['post_unique_id']);
					?>"  class="form-control rounded-0" hidden> 
	<input type="text" name="comment_id" value="<?php echo($fetchcommented['comment_unique_id']) ?>"  class="form-control rounded-0" hidden> 

	<input type="text" name="reply" placeholder="Write reply here.. to @<?php echo$fetchcommented['username']?>" class="form-control border-0" style="width:100%" onkeypress="show_replybtn()">
	</div>
	</div>
	<div id="sbtn" style="display: none;">
		<button type="submit" name="replyer" class="btn btn-sm " id="">Reply</button>
	</div>
	 
</form>

