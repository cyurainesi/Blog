<style type="text/css">
	.story{
		border-bottom: 2px solid #00b8ff;
		color: #00b8ff;
	}

	.userprofile{	 
      height: 50px;
      width: 50px;
      border-radius: 50%;  
}


.userstoryimage{ 
   border-radius: 50%;
    height: 50px;
    width: 50px; 
    bottom: 0;
    background: orange;
    text-align: center;
    left: 0px;
    right: 50%;
    bottom: 0px;     
}

.userstoryimage img{
	width: 100%;
	height: 100%;
	border-radius: 50%;
}
	 
</style>
<?php
	include('header.php');
?> 
	<div class="container-fluid mb-5" id="mySite">
		<div class="row p-2 justify-content-center"> 
			<div class="col-lg-12 border-bottom p-3"> 
				<div class="d-flex flex-row font-weight-bold">
					<div class="p-3">
						<h3> Stories </h3>						
					</div> 
					<div class="p-3" id="storyopen" title="add New story" style="cursor:pointer;">
						<svg xmlns="http://www.w3.org/2000/svg" width="30px" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"/></svg>
					</div>
				</div>
 
<!-- The Modal for creating story-->
  <div class="modal createposts rounded-0" id="createstory">
    <div class="modal-dialog">
      <form  method="POST" class="modal-content border-0 rounded-0 shadow" enctype="multipart/form-data"> 
        <div class="modal-header border-bottom">
          <h6 class="modal-title">Disappearing After 24hrs</h6>
          <button type="button" class="close" id="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        	<label>Create story cover</label><br>
        	 
           <input type="file" name="images">
           <hr>

          <label>Add Story caption</label><br>
           <textarea type="text" name="caption" class="form-control border-0" placeholder="Write caption"></textarea>
        </div> 
        <div class="modal-footer">
          <button type="submit" name="save_story" class="btn btn-sm">Save</button>
        </div> 
      </form>
    </div>
  </div> 


			</div> 
			<div class="col-lg-12 mb-5">
				<div class="row">
					<div class="col-lg-12 p-2">
						Recent added
					</div>
					<div class="col-lg-12 p-3">
						 <div class="row justify-content-center">
						 	<div class="col-lg-5">
						 		<?php require"c_php/stories.php"?> 
						 	</div> 
						 </div>
					</div>  
				</div>  
			</div>
		</div>
	</div> 

	<script type="text/javascript"> 

$(document).ready(function(){ 
 $("#createstory").hide(); 
    $("#storyopen").click(function () { 
    	 $("#createstory").show();
    });

     $("#close").click(function () { 
    	 $("#createstory").hide();
    });
});
 
 </script>
</body>
</html>