<?php 
$con=mysqli_connect("localhost","root","","commentsytem");
if ($con) {
	# code...
}else{
	$message="<div class='alert error'>Error: ".$con->error."</div> "; 
}