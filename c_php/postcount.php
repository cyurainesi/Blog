<?php 
function userpostcount($user_to_follow,$con)
{
		$sqllcount=mysqli_query($con,"SELECT count(id) as totalpost FROM posts,users where posts.user_unique_id=users.unique_id and posts.user_unique_id='$user_to_follow'");
			$postcount=mysqli_fetch_array($sqllcount);
			echo$postcount['totalpost'];
}