
<!-- The Modal for listing users who liked posts-->
<div class="modal createposts " id="<?php echo("hh".$post_unique_id)?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <form  method="POST" id="formpost" class="modal-content border-0 rounded-0 shadow"> 
        <div class="modal-header ">
          <h4 class="modal-title">Delete warning<small></small></h4>
          <hr>
          <button type="button" class="close" id="<?php echo("yy".$post_unique_id)?>" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        	<i class="fa fa-info-circle"></i> Are you sure you want to delete this.
           <form method="POST">
            <input type="text" name="uni_id" value="<?php echo($post_unique_id)?>" hidden>
           	<button class="btn " type="submit" name="delete">Delete</button>
           </form>
        </div>   
      </form>
    </div>
  </div>

<script type="text/javascript">
   $(document).ready(function(){ 
   	$("#<?php echo("hh".$post_unique_id)?>").hide();
    $("#<?php echo("dele".$post_unique_id)?>").click(function(){
        $("#<?php echo("hh".$post_unique_id)?>").show();
    });

     $("#<?php echo("yy".$post_unique_id)?>").click(function () {
        	$("#<?php echo("hh".$post_unique_id)?>").hide();
    });
   
});
</script>