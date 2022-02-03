
<!-- The Modal for listing users who liked posts-->
  <div class="modal createposts rounded-0" id="<?php echo("xx".$post_unique_id)?>">
    <div class="modal-dialog">
      <div  method="POST" id="formpost" class="modal-content border-0 rounded-0 shadow"> 
        <div class="modal-header ">
          <h4 class="modal-title text-decoration-underline">Notes this post<small></small></h4>
          <hr>
          <button type="button" class="close" id="<?php echo("xxx".$post_unique_id)?>" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
           <?php require"c_php/allnotes.php"?>
        </div>   
      </div>
    </div>
  </div>

<script type="text/javascript">
   $(document).ready(function(){ 
    $("#<?php echo("xx".$post_unique_id)?>").hide();
    $("#<?php echo("morenotes".$post_unique_id)?>").click(function(){
        $("#<?php echo("xx".$post_unique_id)?>").show();
    });

     $("#<?php echo("xxx".$post_unique_id)?>").click(function () {
          $("#<?php echo("xx".$post_unique_id)?>").hide();
    });
   
});
</script>