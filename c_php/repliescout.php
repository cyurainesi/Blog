
<?php

function repliedcount($xr,$con,$user_to_follow,$user_identity,$username_replied)
{
	$selectreplycount=mysqli_query($con,"SELECT count(replys.id) AS totalcount FROM replys,comments,users where
								 replys.comment_unique_id='$xr'and 
								 replys.user_unique_id=users.unique_id and 
								 replys.comment_unique_id=comments.comment_unique_id order by replys.date desc ")or die($con->error);
		if ($selectreplycount):
			if (mysqli_num_rows($selectreplycount) > 0):
				$repliescount=mysqli_fetch_array($selectreplycount);
				
			if ($repliescount['totalcount']== 0){
				echo$repliescount['totalcount']=" ";
			}else{echo$repliescount['totalcount'];
				
			}

			endif;
		endif;
}

				 
?>