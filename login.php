<?php
session_start();
if (isset($_SESSION['login'])) {
	header('location:home.php');;
}
?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php require"name.php"?>. login</title>
	<link rel="icon" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
</head> 
<body class="loginbody">
	<div class="container p-5">
		<div class="row justify-content-center"> 
			<div class="col-lg-4 mt-5">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="p-3  text-muted">
							<h5>Sign in to <?php require"name.php"?></h5> 
						</div>
					</div>
					<div class="former col-lg-12  containered shadow-sm rounded ">
						<form class="row p-3" method="POST">
							<?php require_once('c_chat/login.php')?>
							<span class="messagern text-danger"></span>
							<div class="col-lg-12 mt-3"> 
								<label class="">Username or email address</label>
								<input type="text" id="email_username" name="username_email" placeholder="Username / Email" class="form-control <?php echo $style ?>" autocomplete autofocus>
							</div>
							<div class="col-lg-12 mt-4">
								<div class="d-flex flex-row">
									<label class="flex-grow-1">Password</label>
									<a href="forgot.php" class="text-danger">Forgot password ?</a>
								</div> 
								<input type="Password" id="password" name="password" placeholder="Enter Password" class="form-control <?php echo $style ?>">
							</div>
							<div class="col-lg-12 logined  mt-3">
								<button type="submit" name="login" class="btn logined  text-muted rounded btn- btn-block ">Sign in</button>
							</div>
						</form>
					</div>
					<div class="col-lg-12 mt-3 containered rounded shadow-sm text-center p-3 text-muted">
						New to <?php require"name.php"?>? <a href="signup.php" class="">Create an account </a>.
					</div>
					<div class="col-lg-12 text-center mt-3 d-flex flex-row"> 
						<a href="https://twitter.com/job10236901" class="flex-fill" > job10236901</a>
						    
						<a href="https://www.facebook.com/i.job.5" class="flex-fill" >Job</a>
						       
						<a href="https://www.instagram.com/jobeuse/" class="flex-fill" >Jobeuse</a> 
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="vendor/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="vendor/jquery-ui.min.js"></script>
	<script type="text/javascript" src=""></script> 
</body>

</html>