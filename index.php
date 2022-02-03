<?php session_start();?>
<?php 
if (isset($_SESSION['login'])) {
	header('location:home.php');;
}
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jr.welcome</title>
	<link rel="icon" type="text/css" href="images/jj copy.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web/css/all.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web/css/all.min.css">
	
	<script type="text/javascript" src="vendor/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="vendor/jquery-ui.min.js"></script>
	<script type="text/javascript" src="javs.js"></script>
	<script type="text/javascript" src="c_js/createpost.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>  
	<div class="container" style="position: absolute; top:34%">
		<div class="row justify-content-center" >
			<div  class="col-lg-12 text-center	" >
				<div class="row">
					<div class="col-lg-12">
						<h2> Fast & Eazy, Funny </h2>
					</div>
					<div class="col-lg-12">
						<small class="text-center text-dark">Fast and secure </small>
							<p>
								Make it Sound Easier for Your Audience and Be Reachable
							</p>
					</div>
					<div class="col-lg-12 mt-5">
						<a href="login.php" class="btn" style="color: #58a6ff;border:1px solid #58a6ff;">Login</a>
						 <a href="signup.php" class="btn"  style="background:#58a6ff ;color: #ffff;border:1px solid #58a6ff;">Sign Up</a>
					</div>
				</div>
				
				<br>

				
			</div> 
		</div> 
	</div>
</body>
</html> 