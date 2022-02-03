<div class="d-flex flex-row bg-white shadow-sm sticky-top">
  <div class="flex-grow-1">
    <a class="navbar-brand" href="home.php"><h1>J<small style="color: #00b8ff;">r</small></h1></a>   
  </div>

    <?php  
        if (!isset($_SESSION['login'])) {
            ?> 
              <div class="mt-3 pr-3">
              <a href="signup.php" class="signup">Signup</a>
             </div>
            <div class="mt-3 pr-3"> 
              <a href="login.php" class="login">Login</a>
            </div>
            
            <?php                
          }else{
            ?> 
            <div class="mt-3 pr-3">
            <a href="home.php" class="">Home</a>
           </div>
            <?php
          }  
          ?>
 
</div>