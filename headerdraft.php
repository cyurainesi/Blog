<?php session_start(); 
include('conn.php');

if (!isset($_SESSION['login'])) {
		header('location:login.php');
		
	}else{
		$user_identity=$_SESSION['login'];
	}	 
	?>
	 
<?php $message="";?>
<?php require"c_php/createpost.php"?>
<?php require"c_php/createlink.php"?>
<?php require"c_php/createimage.php"?>
<?php require"c_php/createvideo.php"?>
<?php require"c_php/like.php"?>
<?php require"c_php/follow.php"?>
<?php require"c_php/createcomment.php"?>
<?php require"c_php/createreply.php"?>
<?php require"c_chat/creategrp.php";?>
<?php require"c_php/savefavbpost.php";?>
<?php require"c_php/createstory.php";?>
<?php require"c_php/verified.php";?>
<?php require"c_php/follower.php";?>
<?php require"c_php/following.php";?>
<?php include('c_php/changeprofile.php');?>
<?php include('postP.php');?>
<?php include('autolike.php');?>




<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jr</title>
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
<body onload="myFunction()" style="margin:0;" class="justify-content-center"> 
	<?php include"navbar.php"?>

	<button class="btn float-right font-weight-bold" id="searchclose">&times; <i class="fa fa-close"></i></button>

	<div class=" p-3 " id="results"></div>  

 <!-- The Modal for shhowing way to create posts-->
  <div class="modal creatpoetdere rounded-0" style="background: white;">
    <div class="modal-dialog">
      <div class="modal-content border-0 rounded-0 shadow">
      <button type="button" class="close" id="closeerrred" data-dismiss="modal">&times;</button> 
        <div class="modal-body">
          <?php?> 
        </div> 
      </div>
    </div>
  </div> 

	<div id="loader"></div>	  



<script type="text/javascript">
		var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 100);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("mySite").style.display = "block";
}
	</script>
 

<script type="text/javascript"> 

$(document).ready(function(){  
    $("#searchclose").click(function () {
    	$("#results").hide();
    	$("#searchclose").hide();
    	 $("#mySite").show();
    })
});
 

 $(document).ready(function(){  
    $("#createpottedd").click(function () {
    	$(".creatpoetdere").show(); 
    	$(".displaycreae").hide(); 
    });

     $("#closeerrred").click(function () {
    	$(".creatpoetdere").hide();  
    });
   
});



  $("#results").hide();
  $("#searchclose").hide();
  function show_results() {
    $("#results").show();
    $("#mySite").hide();
    $("#searchclose").show();
 
 const results=document.querySelector("#results"),
 searchBar=document.querySelector(".searcharea input");
 let searchTerm=searchBar.value;
 
 let xhr = new XMLHttpRequest();
  xhr.open("POST","search.php", true);
  xhr.onload= ()=>{
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status == 200) {
        let data=xhr.response; 
        results.innerHTML=data; 
         
      }
      }
  } 
  xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
  xhr.send("searchTerm="+searchTerm);

} 
</script>
