<?php session_start(); 
include('conn.php');

if (!isset($_SESSION['login'])) {
    header('location:login.php');
    
  }else{
    $user_identity=$_SESSION['login'];
  }  
  ?>
   
<?php $message="";?>
<!DOCTYPE html>
<html>
<head> 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jr</title>
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
  <script type="text/javascript" src="c_js/createpost.js"></script> 
  <link rel="stylesheet" type="text/css" href="style.css">
   
</head>
<body> 
  <?php require"c_php/createpost.php"?> 
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6   p-2">
        <div class="d-flex  flex-row">
          <div class="flex-fill">
            <a href="home.php" class="btn bg-light  btn-dafault shadow-sm"> <i class="fa fa-arrow-left"></i> Back home</a>
          </div>
          <div class="flex-grow-1">
            <a href="">Refresh</a>
          </div>
          <div>
             <?php require"logged.php"?>
          </div>
        </div>
        <hr>
        <form  method="POST" enctype="multipart/form-data" 
         class="d-flex justify-between bg-light p-2  flex-column">
         <div class="mb-2">
           <h4 class="text-center text-muted">Start Sharing your ideas</h4>
         </div>
         <div class="mb-3">
           <input type="location" name="location" class="form-control" placeholder="Add location">
         </div>
          <div>
            <textarea name="post" onfocus ="getmessages_info()" class="form-control postarea" placeholder="Start Writting here.."></textarea>
            <label class="text-info " id="message_info" style="display: none;">Use # to add tags and @ to mention someone</label>
          </div>
          <div class="caption mt-3">
            <input type="text" name="caption" placeholder="Add Caption" class="form-control">
          </div>
          <div class="row mt-3 " id="">
            <div class="col-lg-4 media1"> 
               <span title="attach image" class=" attachFileSpan" onclick="document.getElementById('myInput').click()">
            <i class="fa fa-image" style="font-size: 30px; cursor: pointer;color: #58a6ff"></i>
            </span>
             <input id="myInput" type="file" name="images" style="visibility:hidden" onchange="previewFile(this);"/>
           
            </div>
            <div class="col-lg-4 media2">
              <span title="attach image" class=" attachFileSpan" onclick="document.getElementById('myInput2').click()">
              <i class="fa fa-video"  style="font-size: 30px; cursor: pointer;color: #58a6ff"></i>
            </span>
             <input id="myInput2" name="videos" type="file" style="visibility:hidden" onchange="previewvideo(this);"/>
            </div>
          </div>
          <div class="d-flex flex-row">
            <div class="flex-fill preview" > 
               <img id="previewImg" src="" class="mt-2 img-thumbnail" width="100px" alt="Image preview">
            </div>
             <div class="flex-fill preview2">  
              <video src="" id="previewvideos" width="100px" alt="Image preview"  class="img-thumbnail border-0" autoplay controls>
                browser doesn't support this video
              </video>
            </div>
          </div>
          <div class="mt-2">
              <button type="submit" name="save_post" class="save_post btn btn-block" style="background:#58a6ff ;color: #ffff;border:1px solid #58a6ff;">Save</button>
          </div> 
        </form> 
<script type="text/javascript">
  $(".preview").hide();
  $(".preview2").hide();
   $(".caption").hide();
   function previewFile(input){
    $(".postarea").hide();
    $(".caption").show();
   var file = $("#myInput").get(0).files[0];
    if(file){
          $(".preview").show();
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }

  }

  function previewvideo(input) {
    $(".postarea").hide();
    $(".caption").show();
    var file = $("#myInput2").get(0).files[0];
    if(file){
          $(".preview2").show();
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewvideos").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
  }

</script>


      </div>
    </div>
  </div>
  <script type="text/javascript" src="vendor/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="vendor/jquery-ui.min.js"></script>
</body>
</html>