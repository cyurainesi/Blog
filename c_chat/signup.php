<?php 
	include('conn.php'); 
  
?>
<?php
$error='';
$data=""; 
	$user_name=$_POST['username'];
	$email=$_POST['email'];
	$user_id=date('sihm'); 
	$date=date('Y-m-d h:i:s');
	$phone=$_POST['phone'];
	$lphone=strlen($phone); 
	$password=$_POST['password']; 
	$lpassword=strlen($password);

 
		if(empty($user_name)){
			$data="<div class='text-danger'><i class='fa fa-info-circle'></i> Username required </div> ";
		}elseif (empty($email)) {
			$data="<div class='text-danger'><i class='fa fa-info-circle'></i> email required </div> ";
		}
		elseif(empty($phone)){
			$data="<div class='text-danger'><i class='fa fa-info-circle'></i> phone required </div> ";
		}elseif(empty($password)){
				$data ="<div class='text-danger'><i class='fa fa-info-circle'></i> password required </div> ";
		}elseif($lphone < 13){
			$data="<div class='text-danger'><i class='fa fa-info-circle'></i> Enter valid phone number include country code)</div> ";
		}elseif($lpassword < 5){
			$data ="<div class='text-danger'><i class='fa fa-info-circle'></i> password must be more than 5 characters </div> ";

		}else{
			$mysql=mysqli_query($con, "SELECT * FROM users where email='$email' or username='$user_name'")or die($con->error);
			if ($mysql) {
			if (mysqli_num_rows ($mysql)> 0) {
			  $result=mysqli_fetch_array($mysql); 
				 
   					if ( $result['username']!=$user_name  and $result['email']!=$email){
   						$_SSESSION['create']=$user_name;

   						$insert=mysqli_query($con,"INSERT INTO users (`unique_id`,`username`,`email`,`date`,`active`,`password`,`phone`,`bio`,`token_`) VALUES('$user_id','$user_name','$email','$date',0,'$password','$phone','','')")or die($con->error);  
   						 
   						if ($insert) {
   							$data="success";
   						}else{

   							$data= "<div class='text-danger '><i class='fa fa-info-circle'></i> Error occured while creating account</div> "; 
   						}
      						 
								} 
					elseif($result['email']==$email){
					        $data= "<div class='text-danger'><i class='fa fa-info-circle'></i> Email  Exist</div> "; 
						} 
						elseif( $result['username']==$user_name) { 
							$data="<div class='text-danger'><i class='fa fa-info-circle'></i> Username Exist </div> ";

						} 
					}else{

				$insert=mysqli_query($con,"INSERT INTO users (`unique_id`,`username`,`email`,`date`,`active`,`password`,`phone`,`bio`,`token_`) VALUES('$user_id','$user_name','$email','$date',0,'$password','$phone','','')")or die($con->error); 
   						if ($insert) {
   						$data="success";
   						}else{

   							$data= "<div class='text-danger '><i class='fa fa-info-circle'></i> Error occured while creating account</div>".$con->error; 
   						}
					}
			}else{
				$data= "<div class='text-danger '><i class='fa fa-info-circle'></i> Error occured while creating account</div> "; 
			}
				
				}

				echo$data;
			
   



?>