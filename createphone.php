 
<div class="d-flex flex-row justify-content-center creatingpostss mb-3"> 
	<div class="flex-grow-1"> 
		<div class="d-flex flex-row  rounded  shadow-sm">
			<div class="flex-fill  rounded-left posters   p-4 text-center" id="myBtnphone" title="Create post with text">
				<h3>Aa<small>..</small></h3>
			</div>
			<div class="flex-fill  posters p-4 text-center" id="myBtn2phone" title="Create post with link">
				<h3><i class="fa fa-link"></i></h3>
			</div>
			<div class="flex-fill  posters  p-4 text-center" id="myBtn3phone" title="Create post with image">
				<h3><i class="fa fa-image"></i></h3>
			</div>
      <div class="flex-fill posters p-4 text-center" id="myBtn4phone" title="Create post with video">
        <h3><i class="fa fa-video"></i></h3>
      </div>   
		</div>
	</div>
</div>
  


 <!-- The Modal for creating posts-->
  <div class="modal createposts rounded-0" id="myModalphone">
    <div class="modal-dialog">
      <form  method="POST" id="formpost" class="modal-content border-0 rounded-0 shadow"> 
        <div class="modal-header border-0">
          <div class="d-flex flex-row">
            <div>
              <?php require"logged.php"?>
            </div>
            <div class="flex-grow-1 pl-3">
             <h4 class="modal-title">Aa<small>..</small></h4>
            </div>
          </div>
         
          <button type="button" class="close" id="closephone" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
           * Start with # to create hashtags.
           <textarea placeholder="Write here...." class="rounded-0 border-0 form-control" name="post"></textarea>
        </div> 
        <div class="modal-footer">
          <button type="submit" name="save_post" class="save_post btn btn-sm">Save</button>
        </div> 
      </form>
    </div>
  </div>
 



 <!-- The Modal for creating links-->
  <div class="modal createposts rounded-0" id="myModal2phone">
    <div class="modal-dialog">
      <form method="POST" id="formpost" class="modal-content border-0 rounded-0 shadow"> 
        <div class="modal-header border-0">
          <div class="d-flex flex-row">
            <div>
              <?php require"logged.php"?>
            </div>
            <div class="flex-grow-1 pl-3 pt-2">
              <h4 class="modal-title"><i class="fa fa-link"></i></h4>
            </div>
          </div>
          <button type="button" class="close" id="close2phone" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

           <textarea placeholder="Copy link here...." class="rounded-0 border-0 form-control" name="link"></textarea>
        </div> 
        <div class="modal-footer">
          <button  type="submit" name="save_link" class="btn btn-sm">Save</button>
        </div> 
      </form>
    </div>
  </div>

  <!-- The Modal for creating images-->
  <div class="modal createposts rounded-0" id="myModal3phone">
    <div class="modal-dialog">
      <form  method="POST" id="formpost" class="modal-content border-0 rounded-0 shadow" enctype="multipart/form-data"> 
        <div class="modal-header border-0">
          <div class="d-flex flex-row">
            <div>
              <?php require"logged.php"?>
            </div>
            <div class="flex-grow-1 pl-3 pt-2">
              <h4 class="modal-title"><i class="fa fa-image"></i></h4>
            </div>
          </div> 
          <button type="button" class="close" id="close3phone" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        	<label>Upload image</label><br>
           <input type="file" name="images">
           <hr>

          <label>Add caption</label><br>
           * Start with # to create hashtags.
           <textarea type="text" name="caption" class="form-control border-0" placeholder="Write caption"></textarea>
        </div> 
        <div class="modal-footer">
          <button type="submit" name="save_image" class="btn btn-sm">Save</button>
        </div> 
      </form>
    </div>
  </div>



  <!-- The Modal for creating images-->
  <div class="modal  rounded-0" id="myModal4phone">
    <div class="modal-dialog">
      <form  method="POST" id="formpost" class="text-dark modal-content border-0 rounded-0 shadow" enctype="multipart/form-data"> 
        <div class="modal-header border-0">
          <div class="d-flex flex-row">
            <div>
              <?php require"logged.php"?>
            </div>
            <div class="flex-grow-1 pl-3 pt-2">
               <h4 class="modal-title"><i class="fa fa-video"></i></h4> 
            </div>
          </div>
          <button type="button" class="close" id="close4phone" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <label>Upload video</label><br>
           * Start with # to create hashtags.
           <input type="file" name="videos">
           <hr>

          <label>Add description</label><br>
           <textarea type="text" name="caption" class="form-control border-0" placeholder="Write caption"></textarea>
        </div> 
        <div class="modal-footer">
          <button type="submit" name="save_video" class="btn btn-sm">Save</button>
        </div> 
      </form>
    </div>
  </div>
 

 <script type="text/javascript"> 
 $(document).ready(function(){
    $("#myModalphone").hide();
    $("#myBtnphone").click(function(){
        $("#myModalphone").show();
    });

    $("#closephone").click(function () {
        $("#myModalphone").hide();
    })
});
 


$(document).ready(function(){
  $("#myModal2phone").hide();
    $("#myBtn2phone").click(function(){
        $("#myModal2phone").show();
    });

    $("#close2phone").click(function () {
      $("#myModal2phone").hide();
    });
});
 

  $(document).ready(function(){
    $("#myModal3phone").hide();

    $("#myBtn3phone").click(function(){
        $("#myModal3phone").show();
    });

     $("#close3phone").click(function () {
        $("#myModal3phone").hide();
    });
   
});






   $("#myModal4phone").hide();

  $(document).ready(function(){
    $("#myModal4phone").hide();

    $("#myBtn4phone").click(function(){
        $("#myModal4phone").show();
    });

     $("#close4phone").click(function () {
        $("#myModal4phone").hide();
    });
   
});

 </script>