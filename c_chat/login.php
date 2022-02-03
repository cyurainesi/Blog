
<?php  
include('conn.php');   
 if(isset($_POST['login'])):
	$username_email=$_POST['username_email'];
	$password=$_POST['password'];
	$user_id=date('s').date('l').date('y').date('m'); 
	$date=date('Y-m-d h:i:s'); 
	 
		if(empty($username_email)){
			$style="style_error";
			$data="* Username email required";
			 
		}elseif (empty($password)) {
			$style="style_error";
			$data="* Password required";
		}
			else{

			$mysql=mysqli_query($con, "SELECT * FROM users where email='$username_email' or username='$username_email'");
			if ($mysql) { 
				if (mysqli_num_rows($mysql) >0) { 
					$result=mysqli_fetch_array($mysql);
					if ($result['email']==$username_email or $result['username']==$username_email) {

						if ($result['password'] ==$password) { 

							$_SESSION['login']=$result['unique_id'];
							
							$user_id=$result['unique_id'];

							$_SESSION['username']=$result['username']; 

							mysqli_query($con, "UPDATE users set active=1 where unique_id='$user_id' ");

							$data='success';
							header('location:home.php');

						}else{
							$data="* Incorrect password";
						}
					}else{
						$data="* Email username  not found"; 
					}
					
				}else{
					$data="* No user found".$con->error."";
				}
			}else{
				$data="* ". $con->error."";
			}  
		}
		 echo ("<strong class='text-danger'>".$data."</strong>");
		endif
	

?>