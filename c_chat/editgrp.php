
<!-- The Modal for listing users who liked posts-->
  <div class="modal  rounded-0" id="grpinfo"  style="overflow-y: auto;display: none;">
    <div class="modal-dialog">
      <form  method="POST" id="formpost" class="modal-content border-0 rounded-0 shadow"> 
        <div class="modal-header ">
          <h4 class="modal-title text-decoration-underline">Group Info<small></small></h4>
          <hr>
          <button type="button" class="close" id="closeddd" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body"> 
          <div class="row"> 
            <div class="col-lg-2">
              <div class="userprofile"> 
             
                  <?php
                     $new=$fetchallgrpprofile['name'];
                     $upper_name=strtoupper($new); 
                     $nee=substr(($upper_name),0,1);
                     echo("<h5>".$nee."</h5>");
                  ?>
                </div>
              </div>
                <div class="col-lg-8">
                  <h5 class=""><?php echo$new;?></h5>
                  <span class="text-muted"><?php echo$fetchallgrpprofile['description']?></span>
                </div>               
                <div class="col-lg-12 mt-4">
                 List of joined users
                  <hr>
                </div>  <?php echo$message?>
                <div class="col-lg-12" style="display:none;">
                   <?php 
                  $id=$fetchallgrpprofile['grp_id']; 
                    $sqlectcount=mysqli_query($con, "SELECT * FROM grp_users,users where grp_id='$id' and grp_users.user_id=users.unique_id ")or die($con->error);

                    if (mysqli_num_rows($sqlectcount) > 0) {
                       while($fetchalluser=mysqli_fetch_array($sqlectcount)){ 
                         if ($user_identity==$fetchalluser['admin_id']) {
                        ?>
                      
                        <form class="row" method="POST" enctype="multipart/form-data" id="changeinfo"> 

                          <div class="col-lg-12" >
                            <label>Grp Name</label>
                            <input type="text"class="form-control" value="<?php echo$message?>" name="name" placeholder="Write Grp name">
                          </div>
                          <div class="col-lg-12">
                            <label>Desrciption</label>
                            <textarea class="form-control" name="Desrciption" placeholder="Write Grp Desrciption"></textarea>
                          </div>
                          <div class="col-lg-12 mt-3 ml-3">
                            <label>Grp Profile</label>
                            <input type="file" name="images">
                          </div> 
                        </form>
                        <hr>
                        <?php
                      }
                        ?>
                </div>
                <div class="col-lg-12">
                 
                          <div class="d-flex flex-row" >
                            <div class=" text-white p-2  text-center bg-primary userprofileliked">
                              <?php
                               $new=$fetchalluser['username'];
                               $upper_name=strtoupper($new); 
                               $nee=substr(($upper_name),0,1);
                               echo("<h3>".$nee."</h3>");
                              ?>
                            </div>
                            <div class="flex-fill mt-3 ml-3">
                              <a  href="user.php?unique_id_profile=<?php echo($fetchalluser['unique_id']) ?>"><?php echo$fetchalluser['username']?></a>
                            </div>
                            <div class="mt-3"> 
                            </div>
                            <div class="mt-3 ml-2"> 
                            </div>
                            </div>
                            <hr>


                        <?php 
                       }
                    }else{
                      echo"No users joined";
                    }
                    
                  ?>
                </div>
          
          </div> 
        	 
        </div>   
      </form>
    </div>
  </div>

  <script type="text/javascript">
   $(document).ready(function(){ 
    $("#grpinfo").hide();  
    $("#info").click(function(){
        $("#grpinfo").show();
    });

     $("#closeddd").click(function () {
          $("#grpinfo").hide();
    });
   
});
</script>

  <script type="text/javascript">
   $(document).ready(function(){   
    $("#changer").click(function(){
        $("#changeinfo").show();
    }); 
   
});
</script>