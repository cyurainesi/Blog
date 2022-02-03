<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php require"name.php"?>. SinUp</title>
	<link rel="icon" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="style.css">

	<style type="text/css">
	
  .loginbody .containerfield input{
    -webkit-text-fill-color:#fff;
        box-shadow: none!important;
            border: 0!important;
                display: block;
    width: 100%;
    background-color: #0c162d;
    -webkit-writing-mode: horizontal-tb !important;
    text-rendering: auto;
    color: -internal-light-dark(black, white);
    letter-spacing: normal;
    word-spacing: normal;
    text-transform: none;
    text-indent: 0px;
    text-shadow: none;
    display: inline-block;
    text-align: start;
    appearance: auto;
    background-color: -internal-light-dark(rgb(255, 255, 255), rgb(59, 59, 59));
    -webkit-rtl-ordering: logical;
    cursor: text;
    margin: 0em;
    font: 400 13.3333px Arial;
    padding: 1px 2px;
    border-width: 2px;
    border-style: inset;
    border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
    border-image: initial;}
	</style>
</head>
<body class="loginbody">
<div class="container p-5">
	<div class="row justify-content-center"> 
			<div class="col-lg-6 p-4 containerfield rounded">
				<div class="row">
					<div class="col-lg-12">
						<div class=" text-muted">
							<p>Welcome to <?php require"name.php"?>
							<br>
								Let’s begin the adventure
							</p> 
						</div>
					</div>
					<form method="POST" class="col-lg-12 mt-2">
						<label class="messagern text-danger"></label>
						<div class="row">

							<div class="col-lg-12"> 
								<label>Enter Username</label>
								<div class="d-flex flex-row">
									<div class="mt-1">
										<svg class="svg-icon" viewBox="0 0 20 20" width="15px">
											<path fill="white" d="M1.729,9.212h14.656l-4.184-4.184c-0.307-0.306-0.307-0.801,0-1.107c0.305-0.306,0.801-0.306,1.106,0
											l5.481,5.482c0.018,0.014,0.037,0.019,0.053,0.034c0.181,0.181,0.242,0.425,0.209,0.66c-0.004,0.038-0.012,0.071-0.021,0.109
											c-0.028,0.098-0.075,0.188-0.143,0.271c-0.021,0.026-0.021,0.061-0.045,0.085c-0.015,0.016-0.034,0.02-0.051,0.033l-5.483,5.483
											c-0.306,0.307-0.802,0.307-1.106,0c-0.307-0.305-0.307-0.801,0-1.105l4.184-4.185H1.729c-0.436,0-0.788-0.353-0.788-0.788
											S1.293,9.212,1.729,9.212z"></path>
										</svg>
									</div>
									<div class="flex-grow-1 pl-2">
										<input type="text" name="username" id="username" class="form-control rounded-0" autocomplete autofocus>
										<?php
											 ($user_error);
										?>
									</div>
								</div>
							</div>


							<div class="col-lg-12"> 
								<label>Enter your email</label>
								<div class="d-flex flex-row">
									<div class="mt-1">
										<svg class="svg-icon" viewBox="0 0 20 20" width="15px">
											<path fill="white" d="M1.729,9.212h14.656l-4.184-4.184c-0.307-0.306-0.307-0.801,0-1.107c0.305-0.306,0.801-0.306,1.106,0
											l5.481,5.482c0.018,0.014,0.037,0.019,0.053,0.034c0.181,0.181,0.242,0.425,0.209,0.66c-0.004,0.038-0.012,0.071-0.021,0.109
											c-0.028,0.098-0.075,0.188-0.143,0.271c-0.021,0.026-0.021,0.061-0.045,0.085c-0.015,0.016-0.034,0.02-0.051,0.033l-5.483,5.483
											c-0.306,0.307-0.802,0.307-1.106,0c-0.307-0.305-0.307-0.801,0-1.105l4.184-4.185H1.729c-0.436,0-0.788-0.353-0.788-0.788
											S1.293,9.212,1.729,9.212z"></path>
										</svg>
									</div>
									<div class="flex-grow-1 pl-2">
										<input type="email"  id="email" name="email" class="form-control border-0 rounded-0" autofocus>
										<?php ($email_error);?>
									</div>
								</div>
							</div>

 
							<div class="col-lg-12"> 
								<label>Enter Phone +250780809031</label>
								<div class="d-flex flex-row">
									<div class="mt-1">
										<svg class="svg-icon" viewBox="0 0 20 20" width="15px">
											<path fill="white" d="M1.729,9.212h14.656l-4.184-4.184c-0.307-0.306-0.307-0.801,0-1.107c0.305-0.306,0.801-0.306,1.106,0
											l5.481,5.482c0.018,0.014,0.037,0.019,0.053,0.034c0.181,0.181,0.242,0.425,0.209,0.66c-0.004,0.038-0.012,0.071-0.021,0.109
											c-0.028,0.098-0.075,0.188-0.143,0.271c-0.021,0.026-0.021,0.061-0.045,0.085c-0.015,0.016-0.034,0.02-0.051,0.033l-5.483,5.483
											c-0.306,0.307-0.802,0.307-1.106,0c-0.307-0.305-0.307-0.801,0-1.105l4.184-4.185H1.729c-0.436,0-0.788-0.353-0.788-0.788
											S1.293,9.212,1.729,9.212z"></path>
										</svg>
									</div>
									<div class="flex-grow-1 pl-2">
										<input type="phone" id="phone" name="phone" class="form-control rounded-0">
										<?php
											($phone_error); 
										?>
									</div>
								</div>
							</div>


							<div class="col-lg-12"> 
								<label>Create a password</label>
								<div class="d-flex flex-row">
									<div class="">
										<svg class="svg-icon" viewBox="0 0 20 20" width="15px">
											<path fill="white" d="M1.729,9.212h14.656l-4.184-4.184c-0.307-0.306-0.307-0.801,0-1.107c0.305-0.306,0.801-0.306,1.106,0
											l5.481,5.482c0.018,0.014,0.037,0.019,0.053,0.034c0.181,0.181,0.242,0.425,0.209,0.66c-0.004,0.038-0.012,0.071-0.021,0.109
											c-0.028,0.098-0.075,0.188-0.143,0.271c-0.021,0.026-0.021,0.061-0.045,0.085c-0.015,0.016-0.034,0.02-0.051,0.033l-5.483,5.483
											c-0.306,0.307-0.802,0.307-1.106,0c-0.307-0.305-0.307-0.801,0-1.105l4.184-4.185H1.729c-0.436,0-0.788-0.353-0.788-0.788
											S1.293,9.212,1.729,9.212z"></path>
										</svg>
									</div>
									<div class="flex-grow-1 pl-2">
										<input type="Password" id="password" name="password" class="form-control rounded-0">
										<?php
											($password_error); 
										?>
									</div>
								</div>
							</div>

							<div class="col-lg-12 text-right mt-2 signed">
								<button type="submit" name="login" class="logined btn btn-sm rounded border">Continue</button>
							</div>

						</div>
					</form>
					<div class="col-lg-12   text-center p-3 text-muted">
						<hr>
						Already have an account?  <a href="login.php" class="">Sign in  </a>.
					</div>
					<div class="col-lg-12 text-center mt-3 d-flex flex-row"> 
						<hr>
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
	<script type="text/javascript" src="javs.js"></script>
	<script type="text/javascript" src="authentication/register.js"></script>

</body>
</html>