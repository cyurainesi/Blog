<?php 
           /*     $selectcount=mysqli_query($con,"SELECT count(notifications.id) AS totalnotify FROM users,notifications where notifications.type_id='$user_identity' and users.unique_id=notifications.user_id ")or die($con->error);
                

                $selectc=mysqli_query($con,"SELECT count(notifications.id) AS totalnotifyy FROM users,notifications,posts,follow where (notifications.type_id='0' and notifications.user_id!='$user_identity') and (notifications.user_id=follow.follower or notifications.user_id=follow.following ) and (follow.follower='$user_identity' or follow.follower='$user_identity') and (posts.post_unique_id=notifications.notification_id and users.unique_id=notifications.user_id) order by  notifications.id desc")or die($con->error);

                if((mysqli_num_rows($selectcount)>0) or (mysqli_num_rows($selectc)>0)){
                  $newnotifi="<sup id='shownew'><small>New</small></sup>";
                }else{
                  $newnotifi="";<?php echo$newnotifi?>
                }*/
              ?>

<nav class="navbar navbar-expand-md">
  <div class="d-flex flex-row">
    <div class="">
     <a class="navbar-brand" href="home.php"><h6><?php require"name.php"?></h6></a>
    </div>  
  </div>  
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-5 font-weight-bold ">
      <li class="nav-item home" title="Home">
        <a class="nav-link" href="home.php"><h6>Home</h6></a>
      </li>
      <li class="nav-item Explore" title="Explore">
        <a class="nav-link" href="explore.php" ><h6>Explore</h6></a>
      </li> 
      <li class="nav-item Updates" title="Updates">
        <a class="nav-link" href="updates.php?unique_id_profile=<?php echo($user_identity)?>"><h6>Updates </h6></a>
      </li>  
        <li class="nav-item saved">
          <a class="nav-link" href="saved.php"><h6>Saved</h6></a>
        </li>  
      <li class="nav-item message" title="Message">
        <a class="nav-link" href="messages.php?unique_id_profile=<?php echo($user_identity)?>&usercontroller='messangerController'&unique_id_profile_receiver=&messangerController='messagesAPi'&type="><h6>Message</h6></a>

      </li>  
    
     
    </ul> 
  </div> 
    <div class="float-right mr-5 searcharea">
      <div class="d-flex flex-row "> 
        <div class=""> 
<div class="dropdown" style="
    background-color: rgba(56, 139, 253, 0.1);
    border: 1px solid rgba(56, 139, 253, 0.1);
    border-radius: 2em;
    color: #58a6ff;
    display: inline-block;
    font-size: 12px;
    font-weight: 500;
    line-height: 18px;
    line-height: 22px;
    padding: 3px 20px;
    position: absolute;
    right: 75px;



" >
  <a href="#" class="dropdown-toggle" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
   <?php echo $username;?>
  </a>
  <ul class="dropdown-menu p-2 mt-3 rounded-0 dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
    <li><hr class="dropdown-divider"></li>
    <li><a href="user.php?unique_id_profile=<?php echo($username)?>" class="nav-linker">Profile</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a href="settings.php?unique_id_profile=<?php echo($username)?>" class="nav-linker">Settings</a></li> 
    <li><hr class="dropdown-divider"></li>
    <li><?php include('logout.php'); ?></li>
  </ul>
</div>

        </div>
        <div class="ml-2"> 
          <a class="flex-fill" title="Profile"><?php require"logged.php"?></a>
        </div>
    </div> 
    </div> 
</nav>


<div class=" navbar  navbar-expand-md fixed-bottom  shadow border-bottom border-muted " id="navbar_mobile" > 
  <div class="d-flex flex-row">
    <a class="nav-link home flex-fill" href="home.php" title="home"><i class="fa fa-home"></i></a> 

    <a class="nav-link Explore flex-fill" href="explore.php" title="Explore" ><i class="fa fa-rocket"></i></a>

    <a class="nav-link Updates flex-fill" href="updates.php?unique_id_profile=<?php echo($user_identity)?>" title="Updates"><i class="fa fa-bell"></i></a>

    <a class="nav-link saved flex-fill" href="saved.php" title="Saved"><i class="fa fa-save"></i></a>

   <a class="nav-link" href="userscontainerformessage.php?unique_id_profile=<?php echo($user_identity)?>&usercontroller='messangerController'&unique_id_profile_receiver=&messangerController='messagesAPi'&type="><i class="fa fa-comment"></i></a>
    
  </div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>