<?php session_start(); 
include('conn.php'); 
if (!isset($_SESSION['login'])) {
		header('location:login.php');
		
	}else{
		$user_identity=$_SESSION['login']; 
		$username=$_SESSION['username'];
	}	 
	?> 
<!DOCTYPE html>
<html>
<head> 
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title><?php require"name.php"?></title>
	<link rel="icon" type="text/css" href="images/jj copy.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web/css/all.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web/css/all.min.css">

	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css">
<script type="text/javascript" src="vendor/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="vendor/jquery-ui.min.js"></script>

	<script type="text/javascript" src="javs.js"></script>
	<script type="text/javascript" src="c_js/createpost.js"></script>
	<script type="text/javascript">
   $(document).ready(function(){ 
   	$("#followermodel").hide();
    $("#follower").click(function(){
        $("#followermodel").show();
    });

     $("#closed").click(function () {
        	$("#followermodel").hide();
    });
   
});
</script>
	<script type="text/javascript" src="c_js/	creatcomments.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body onload="myFunction()" style="margin:0;" class="justify-content-center">
<?php $message="";?> 
<?php require"c_php/like.php"?>
<?php require"c_php/follow.php"?>
<?php require"c_php/createcomment.php"?>
<?php require"c_php/createreply.php"?>
<?php require"c_chat/creategrp.php";?>
<?php require"c_php/savefavbpost.php";?>
<?php require"c_php/createstory.php";?>
<?php require"c_php/verified.php";?>
<?php include('c_php/changeprofile.php');?>
<?php include"c_php/extracthashtag.php"?>
<?php include"c_php/mentioned.php"?>
<?php include('postP.php');?>
<?php include('autolike.php');?>
<?php require"c_php/replies.php"?>
<?php require"c_php/Deletereplycomment.php"?>
<?php require"c_php/suggestedfollowers.php"?> 
<?php require"c_php/repliescout.php"?>  
<?php require"c_php/selectmentions.php"?>

<?php include"c_php/followercount.php";
include"c_php/followingcount.php";
include"c_php/postcount.php"; ?> 
	<div class="container-fluid">
		<div class="row shadow topnav fixed-top">
			<div class="col-lg-12">
				<?php include"navbar.php"?>
			</div>
		</div>
		<div id="loader">Wait !!!</div> 
		<div class="row bodycontainer">
 <script type="text/javascript">
function tempAlert()
{
 var el = document.querySelector('.success');  
 setTimeout(function(){
  el.parentNode.removeChild(el);
 },3000);
 document.body.appendChild(el);
}

tempAlert();



function tempAlerterror()
{
 var el = document.querySelector('.error');  
 setTimeout(function(){
  el.parentNode.removeChild(el);
 },3000);
 document.body.appendChild(el);
}

tempAlerterror();


</script>


<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("mySite").style.display = "block";
}
</script>


