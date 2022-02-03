<?php
$fetchalluserprofile=mysqli_fetch_array($selectallusersprofile);

$selectallusersmuted=mysqli_query($con,"SELECT * FROM muted_users where user_unique_id_m='$user_receiver' and user_unique_id='$user_identity' and muted=1 ")or die($con->error);
$fetmuted=mysqli_fetch_array($selectallusersmuted);
if (mysqli_num_rows($selectallusersmuted) >0) {
	$label="Unmute";
	$color="btn-outline-danger";

}else{
	$label="Mute";
	$color="btn-outline-primary";
}

if ($fetchalluserprofile['active']==1) {
	$active="<small class='text-success fa fa-circle' title='Active now'></small> <small class='text-muted'>Active now</small>";
						}
	else{
	$active="<small class=' text-danger fa fa-times-circle' title='Offline now'></small> <small class='text-muted'>Offline now</small>";
	}

	$selectallusersnickname=mysqli_query($con,"SELECT * FROM nicknames  where user_id='$user_identity' and user_id_r='$user_receiver' ")or die($con->error);
	if (mysqli_num_rows($selectallusersnickname)>0) {
		$fetnickname=mysqli_fetch_array($selectallusersnickname);
		$nickname=$fetnickname['name'].","; 
	}else{
		$nickname="";
	}
$selectcountusersmessage=mysqli_query($con,"SELECT count(messages.message_id) as total FROM messages left join users on ( users.unique_id=messages.user_unique_id)  where (user_unique_id_r='$user_receiver' and user_unique_id='$user_identity') or (user_unique_id_r='$user_identity' and user_unique_id='$user_receiver') ")or die($con->error);
if (mysqli_num_rows($selectcountusersmessage)>0) {
	$totl=mysqli_fetch_array($selectcountusersmessage);
	$total =$totl['total']." Messages";

}else{
	$total ="";	
}


?>

<div class="d-flex shadow-sm flex-row mt-2 pl-3">
	 
	<div class="userprofile">  
		<div class=" text-white p-2  text-center userprofileliked" style="background: #00b8ff;">
			<?php
			$new=$fetchalluserprofile['username'];
			 $upper_name=strtoupper($new); 
			 $nee=substr(($upper_name),0,1);
			 echo("<h3>".$nee."</h3>");
			?>
		</div>
	</div>
 
	<div class="flex-grow-1 p-2  text-truncate">
		<h5><?php echo$fetchalluserprofile['username']?></h5><span class="text-muted"><?php echo$nickname?></span>
		<?php echo$active?> <small class="text-muted float-right "><?php echo$total?></small>
	</div>
	<div id="st" class=" mr-2  ">
		<button class="btn btn-sm btn-light" >Set name</button>
	</div>
	<form method="POST" class="mr-2" id="newname"> 
		<input type="text" name="nickname" placeholder="Enter nickname">
		<button class="btn btn-sm btn-outline-primary" type="submit" name="change">Save</button>
		<button class="btn btn-sm btn-danger" type="submit" name="remove">Remove</button>
		<button class="btn btn-sm btn-outline-danger" >Cancel</button>
	</form>
	<form method="POST" class="pr-2 text-white">
		<button class="btn btn-sm <?php echo($color)?>" type="submit" name="mute"><?php echo$label?></button>
	</form>
</div>


<script type="text/javascript">
	$(document).ready(function(){
	$("#newname").hide();
    $("#st").click(function(){
        $("#newname").show();
        $("#st").hide();
    });

    $("#close").click(function () {
    	$("#newusers").hide();
    });
});
 
</script>

 