<?php session_start(); 
include('conn.php');
$message="";
$error="";

if (!isset($_SESSION['login'])) {
		header('location:login.php');
		
	}else{
		$user_identity=$_SESSION['login'];
		$user_receiver=$_GET['unique_id_profile_receiver'];
		$selectallusersprofile=mysqli_query($con,"SELECT * FROM users where users.unique_id='$user_receiver'");
		$selectallusersgrps=mysqli_query($con,"SELECT * FROM groups,grp_users where groups.id= grp_users.grp_id and grp_users.grp_id='$user_receiver'");
	}
	require"c_chat/mute.php"; 	 
	?>
	<?php require"c_chat/changenames.php";?>
	 
<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jr</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">


	<link rel="icon" type="text/css" href="images/jj copy.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web/css/all.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web/css/all.min.css">
	
	<script type="text/javascript" src="vendor/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="vendor/jquery-ui.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
body{
	color: grey;
}
svg{
	 fill:#8b949e;
  color:#8b949e;
}
	
	.allcontainer{
		height: 100vh;
	background:#e8e8e8 !important;
	}
	.userscontainer{
		height:88vh;width: 28%;
		overflow-x: hidden;
		overflow-y:auto; 
	}
.userscontainer .userprofile h5{
	background:orange;;
		color: white;
		width: 50px;
		height: 50px; 
		text-align: center;
		margin: 0px;
		padding-top: 13px; 
		display: block;
		fill: white;
		border-radius: 50%; 

}

.userprofile h5{
	background: orange;
		color: white;
		width: 50px;
		height: 50px; 
		text-align: center;
		margin: 0px;
		padding-top: 13px; 
		display: block;
		fill: white;
		border-radius: 50%; 

}

	.message_container{
		background:  #fff;
		height: 98vh;width:73% ;
		content: ; 
		overflow-y: hidden;
		overflow-x: hidden;

	}
	.message_container .userselect{
		position: absolute;top: 50%;left: 60%
	}
 
.message_container #message{
	overflow-y: auto;
		overflow-x: hidden; 
		height: 77vh;
		border: 0px solid; 
		margin:0;
}

.message_box h5{
 width: 40px;
    height:40px;
    border-radius: 50%; 
    padding-left: 12px;
    padding-top: 10px;
    color: white;
    border: none;
}

.message_box  label{
  border-radius:25px 25px 25px 0px;
  background: grey;
  color: white;
}
.message_box_r label{
	border-radius:25px 25px 0px 25px;
  color: white;
  background: #00b8ff;;
}
.message_box_r a{
	color: white;
	text-decoration: underline;
}


	.profileuser{ 
		position: absolute;
		bottom: 20px;
		left: 50px;
	}
	.profileuser button{
		background: #fff;;
		color: white;
		width: 50px;
		height: 50px; 
		fill: white;
		border-radius: 50%;  
		text-align: center; 
	}
	.profileuser a{
		background: #fff;;
		color: white;
		width: 50px;
		height: 50px; 
		fill: white;
		border-radius: 50%;  
		text-align: center;
		padding: 10px 0px;
	}

	.messagesendarea{
		position: fixed;
		bottom: 0px;
		width:72%;
		padding: 10px;
		right: 0px;
		background:;
	}
	.messagesendarea .file input{
	 
	}
	.messagesendarea .file  i{
	 border-radius: 50%;  
		height: 35px;
		background: #00b8ff;;
		padding: 8px;
		color: white;
		right: 64px;
		width: 35px;
	}
	
	.messagesendarea input{
		border-radius: 20px;
			background:  #e8e8e8!important;
			margin-left: 5px;

		border: 1px solid  #e8e8e8!important;
	}
	.messagesendarea button{
		border-radius: 50%;  
		height: 37px;
		background: #00b8ff;;;
		color: white;
		position: absolute;
		right: 56px;
		width: 37px;
	}
.search {
	border: none;
}
	.search  input{
			border-radius: 20px; 
			
			padding: 10px;
	}

	.search button{ 
		border-radius: 50%;  
		height: 34px;
		background:#00b8ff;;;
		color: white;
		width: 34px;
		position: absolute;
		top: 15px;
		right: 15px;}

		.userprofile_container {
			color: white;
			cursor: pointer;
		}
		.userprofile_container label{
			cursor: pointer;
		}
		.userprofile_container:hover{
			background: #f1f1f1;
			cursor: pointer;

		}
		.userprofile_container a{
			color: white;
		}
		.createposts {
				background: #282a2d;
		}
		.contenter{
			background: #282a2d;
			color: white;
		}
		.contenter a{
			color: white;}
			#newname{
				display: none;
			}
			#grpinfo{
				display: none;
			}
			.backliink{
				display: none;
			}
  @media screen and (max-width: 757px) {
    .userscontainer {
        display:none; }
       .backliink{
       	display: block;
       }
}

</style>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 allcontainer"> 
				<div class="d-flex flex-row">
					<div class="userscontainer">
						<div class="row p-2">
							<div class="col-lg-12 search p-3">
								<input type="search" name="search" placeholder="search here.." class="form-control border search">
								<button type="submit" name="send" class="btn btn-sm "><i class="fa fa-search"></i></button>
							</div>
							<div class="col-lg-12 userList"> 
								 
							</div>
						</div>
						<div class="profileuser" >

							<a href="index.php" title="Find friends" name="send" class="btn btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="30px" viewBox="0 0 576 512"><path d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"/></svg></a>
							<button type="submit" title="Find friends" name="send" id="new" class="btn btn-sm"><svg width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z"/></svg></button> 

							<a  href="grps.php?unique_id_profile=<?php echo($user_identity)?>&usercontroller='messangerController'&unique_id_profile_receiver=&messangerController='messagesAPi'" target="blank" type="submit" name="send" title="Create Group"  id="new" class="btn btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 640 512"><path d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"/></svg></a>

							

						</div><?php include"c_chat/newusers.php"?>
							
					</div>
					<div class="rounded mt-2 message_container shadow flex-fill">

						<?php
							if ($_GET['type']==0) {
							require"c_chat/user_chat.php";

							}elseif ($_GET['type']==1) {
								require"c_chat/grp_chat.php";
							} 
						?> 
				</div>
			</div>
		</div> 
	</div>  
	<script type="text/javascript" src="js_chat/users.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	$("#newusers").hide();
    $("#new").click(function(){
        $("#newusers").show();
    });

    $("#close").click(function () {
    	$("#newusers").hide();
    })
});
 
</script>
</body>
</html>