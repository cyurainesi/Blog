<?php
if (isset($_POST['recent'])) {
	$date_r=date("Y-m-d H:i:s");  
	$date_re=mysqli_query($con,"SELECT date_sub('$date_r',INTERVAL 7 DAY) AS recentday")or die($con->error);
	if ($date_r) {
			$fettingdate_r=mysqli_fetch_array($date_re);
			$recentday=$fettingdate_r['recentday'];  
$sqll = mysqli_query($con, "SELECT * FROM posts,users,follow where 
			posts.user_unique_id=users.unique_id and (follow.follower='$user_identity' or 
			follow.following='$user_identity') and 
			(follow.follower=posts.user_unique_id or 
			follow.following=posts.user_unique_id) and
			(follow.follower=users.unique_id or
			follow.following=users.unique_id) and 
			follow.follow=1 and posts.date between '$date_r' and  '$recentday'  group by posts.post_unique_id  order by posts.id desc ");


$sqll2 = mysqli_query($con, "SELECT * FROM posts,users,follow where 	
								posts.user_unique_id=users.unique_id and
								 posts.user_unique_id='$user_identity' and posts.date between '$date_r' and '$recentday'  group by 
								 posts.post_unique_id  order by posts.id desc ");

	}else{
		echo$con->error;
	}
}elseif (isset($_POST['sorting_date'])) { 
	$sort_date=$_POST['sort_date'];
	$sqll = mysqli_query($con, "SELECT * FROM posts,users,follow where 
			posts.user_unique_id=users.unique_id and (follow.follower='$user_identity' or 
			follow.following='$user_identity') and 
			(follow.follower=posts.user_unique_id or 
			follow.following=posts.user_unique_id) and
			(follow.follower=users.unique_id or
			follow.following=users.unique_id) and 
			follow.follow=1 and CONCAT(YEAR(posts.date),'-',MONTHNAME(posts.date)) like'%$sort_date%'  group by posts.post_unique_id  order by posts.id desc ");

$sqll2 = mysqli_query($con, "SELECT * FROM posts,users,follow where 	
								posts.user_unique_id=users.unique_id and
								 posts.user_unique_id='$user_identity' and CONCAT(YEAR(posts.date),'-',MONTHNAME(posts.date)) like'%$sort_date%'   group by 
								 posts.post_unique_id  order by posts.id desc ");




}
else{
 
$sqll = mysqli_query($con, "SELECT * FROM posts,users,follow where 
			posts.user_unique_id=users.unique_id and (follow.follower='$user_identity' or 
			follow.following='$user_identity') and 
			(follow.follower=posts.user_unique_id or 
			follow.following=posts.user_unique_id) and
			(follow.follower=users.unique_id or
			follow.following=users.unique_id) and 
			follow.follow=1  group by posts.post_unique_id  order by posts.id desc ");


$sqll2 = mysqli_query($con, "SELECT * FROM posts,users,follow where 	
								posts.user_unique_id=users.unique_id and
								 posts.user_unique_id='$user_identity'  group by 
								 posts.post_unique_id  order by posts.id desc ");
}


if ($sqll) {
	if (mysqli_num_rows($sqll) > 0) {
		while ($post = mysqli_fetch_array($sqll)) {
			$post_unique_id = $post['post_unique_id'];
			$user_to_follow = $post['unique_id'];
?>
			<?php include "posts.php" ?>
			
		<?php
		}
	} elseif (mysqli_num_rows($sqll2) > 0) {
		while ($post = mysqli_fetch_array($sqll2)) {
			$post_unique_id = $post['post_unique_id'];
			$user_to_follow = $post['unique_id'];
			$username=$post['username'];
		?>
			<?php include "posts.php" ?>
		<?php
		}
	} else {
		?>
		<div class='row  justify-content-center'>
			<div class='col-lg-10	 error_post'>
				<p>No content found<br>
					start by creating new content or follow more users.
				</p>
				<a href="explore.php" class="font-weight-bold linker">Find more</a>
			</div>
		</div>
<?php
	}
} else {
	echo "<div class='alert error'>" . $con->error . "</div>";
}
