<?php
session_start();
if (isset($_SESSION['login'])) {
	header('location:home.php');;
}
 
	include('conn.php'); 
 
?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php require"name.php"?>. Reset your password</title>
	<link rel="icon" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web/css/all.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
	<script type="text/javascript" src="vendor/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="vendor/jquery-ui.min.js"></script>
	<script type="text/javascript" src="javs.js"></script>
	<script type="text/javascript" src="c_js/createpost.js"></script>
</head> 
<body class="loginbody">
	<div class="container p-4">
		<div class="row justify-content-center"> 
			<div class="col-lg-4 mt-5">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="p-3  text-muted">
							<h5>Reset your <?php require"name.php"?> password</h5> 
						</div>
					</div>
					<div class="col-lg-12  containered shadow-sm rounded	">
						<?php
						if(isset($_POST['send'])){
    if(!empty($_POST['email'])){ 
        $email=$_POST['email'];
        $sql=mysqli_query($con,"SELECT * FROM users WHERE email='$email'")or die($con->error);
        if($sql){
            if(mysqli_num_rows($sql)>0){
                $tk=random_bytes(32); 
                $new_tk=password_hash($tk,PASSWORD_DEFAULT);
        
                $sql_insert=mysqli_query($con,"UPDATE users set token_='$new_tk' where email='$email'")or die($con->error);
                if($sql_insert){ 
                $to=$_POST['email'];
                
                $url="https://mulinditvet.ac.rw/admin_register.php?tkn=".$new_tk;
                
                    $subject="IKISE hh😂😂😂😂";
                    $message="click the link bellow to reset password\r\n";
                    
                    $message.='<a href="'.$url.'" style="">Create new and reset password</a>';
                    $headers="From: ikise <yobiur@gmail.com>\r\n";
                    $headers.="Content-type:text/html\r\n";
                    $maik=mail($to,$subject,$message,$headers);
                    if($maik){
                        ?>
                        <div class="text-success">
                            link successfully sent to <?php echo$to?> <br>
                            check your email
                        </div>
                        <?php
                    }else{
                        ?>
                         <div class="text-danger">
                           *Error sending email !
                        </div>
                        <?php
                    }
            }

            }else{
                ?>
                <div class="text-danger">
                    *Email doesn't exist !
                </div>
                <?php
                
            }
        }
    }else{
        ?>
         <div class="text-danger">
            *Empty space found
        </div>
        <?php
    }

}

?> 

						<form class="row p-3" method="POST">  
							<div class="col-lg-12 mt-4">
								<label>Enter your user account's verified email address and we will send you a password reset link.</label> 
								<input type="email" name="email" placeholder="Enter Your email address" class="form-control ">
							</div>
							<div class="col-lg-12 logined mt-4">
								<button type="submit" name="send" class="btn  text-muted rounded btn- btn-block ">Send reset password link</button>
							</div>
						</form>
					</div>
					<div class="col-lg-12 mt-3 containered rounded shadow-sm text-center p-3 text-muted">
						Or change mind <?php require"name.php"?> <a href="signup.php" class="">Create an account </a>.
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>