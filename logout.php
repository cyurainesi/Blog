<?php
		if (isset($_POST['logout'])) {
		mysqli_query($con, "UPDATE users set active=0 where unique_id='$user_identity' ");
		
		session_destroy(); 
		echo "<meta charset='utf-8' http-equiv='refresh' content='0.1;login.php'>";
		}
?>
<form method="POST">
	<button class="btn btn-block btn-danger rounded-0 btn-sm" type="submit" name="logout">Logout</button>
</form>