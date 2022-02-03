<form method="POST" title="Notes" class="d-flex flex-row " id="<?php
					 echo($post['id']);
					?>">
	<div class="mr-2">
		<?php require"logged.php"?>
	</div>
	<div class="flex-grow-1">
	<input type="text" name="post_id" value="<?php
					 echo($post['post_unique_id']);
					?>"  class="form-control rounded-0" hidden> 
	<textarea type="text" name="comment" placeholder="Write notes here.." class="form-control border-0 " autofocus></textarea>
	</div>
	<button type="submit" name="commenter" class="btn  " id="btn">send</button> 
</form>