<div class="row pl-3 mb-5">
	<?php 
session_start();
include('conn.php'); 

$user_receiver=$_POST['user_receiver'];
$user_identity=$_POST['user_identity'];


if ($_POST['type']==0) { 

$selectallusersmessage=mysqli_query($con,"SELECT * FROM messages left join users on ( users.unique_id=messages.user_unique_id)  where (user_unique_id_r='$user_receiver' and user_unique_id='$user_identity') or (user_unique_id_r='$user_identity' and user_unique_id='$user_receiver') order by messages.message_id asc ")or die($con->error);




if (mysqli_num_rows($selectallusersmessage) >0) {
	 
while ($fetmessage=mysqli_fetch_array($selectallusersmessage)) {
	if ($fetmessage['user_unique_id']==$user_receiver) {
?>

	<div class="col-lg-7  message_box text-break">
		<div class="d-flex flex-row"> 
			<div class="mt-3"> 
				<h5 class="userprofileliked"  style="background: #00b8ff;">
				<?php
					 $new=$fetmessage['username'];
					 $upper_name=strtoupper($new); 
					 $nee=substr(($upper_name),0,1);
					 echo("".$nee."");
				?></h5>
			</div> 
			<div class="ml-3"> 
			<?php 
				if($fetmessage['message']!=''){ 
					?>
					<label class=" p-2 text-break"> 
					<?php
					$content=$fetmessage['message']; 
					if(preg_match_all('/#(\w+)/', $content, $matches)){
					$hashtags=$matches[1];
					$content=preg_replace('/#(\w+)/', '<a href="hashtags.php?hashtags=$1" class="text-decoration-underline text-link " target="blank">#$1</a>', $content); 
					echo$content;
					}elseif (preg_match_all('/@(\w+)/', $content, $matches)) {
					$hashtags=$matches[1];
					$content=preg_replace('/@(\w+)/', '<a href="#/tagged/$1" class="text-decoration-underline text-link " target="blank">@$1</a>', $content); 
					echo$content;	 
					}else{
						echo$content;
					}
					?>
				</label>
					<?php
				} 
				else{ 
					?>
					<img src="c_chat/chat_images/<?php echo$fetmessage['image']?>" class="img-thumbnail rounded border">
					<?php
				}

					?>

					<br></label>		 
				<p class="text-dark"><?php echo($fetmessage['username'])?>	<span class="text-muted"><?php echo date('H:i A  D',strtotime($fetmessage['date']))?></span></p>		
			</div> 
		</div>
	</div>


<?php
}else{
?>  
	<div class="col-lg-12 message_box_r text-right  pr-5">  
			<div class="ml-3 ">
				
				<?php 
				if($fetmessage['message']!=''){ 
					?>
					<label class=" text-white p-2 text-break"> 
					<?php
					$content=$fetmessage['message']; 
					if(preg_match_all('/#(\w+)/', $content, $matches)){
					$hashtags=$matches[1];
					$content=preg_replace('/#(\w+)/', '<a href="hashtags.php?hashtags=$1" class="text-decoration-underline text-link " target="blank">#$1</a>', $content); 
					echo$content;
					}elseif (preg_match_all('/@(\w+)/', $content, $matches)) {
					$hashtags=$matches[1];
					$content=preg_replace('/@(\w+)/', '<a href="#/tagged/$1" class="text-decoration-underline text-link " target="blank">@$1</a>', $content); 
					echo$content;	 
					}else{
						echo$content;
					}
					?>
				</label>
					<?php
				} 
				else{ 
					?>
					<img src="c_chat/chat_images/<?php echo$fetmessage['image']?>" class="img-thumbnail rounded border">
					<?php
				}

					?>
				 
				<p class="text-white"><span class="text-muted"><?php echo date('H:i A  D',strtotime($fetmessage['date']) )?></span></p>		
			</div> 
	</div>

<?php	 
}
}
}else{
	?>
	<div class="col-lg-12 text-muted " style="position: absolute;top: 40%;left: 30%">
		No  messages yet <svg xmlns="http://www.w3.org/2000/svg" width="50px" viewBox="0 0 640 512"><path d="M64 240c0 49.6 21.4 95 57 130.7-12.6 50.3-54.3 95.2-54.8 95.8-2.2 2.3-2.8 5.7-1.5 8.7 1.3 2.9 4.1 4.8 7.3 4.8 66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 27.4 0 53.7-3.6 78.4-10L72.9 186.4c-5.6 17.1-8.9 35-8.9 53.6zm569.8 218.1l-114.4-88.4C554.6 334.1 576 289.2 576 240c0-114.9-114.6-208-256-208-65.1 0-124.2 20.1-169.4 52.7L45.5 3.4C38.5-2 28.5-.8 23 6.2L3.4 31.4c-5.4 7-4.2 17 2.8 22.4l588.4 454.7c7 5.4 17 4.2 22.5-2.8l19.6-25.3c5.4-6.8 4.1-16.9-2.9-22.3z"/></svg>
	</div>
	<?php
}

?>















<?php 

	}elseif ($_POST['type']==1) { 
		$grp_id=$_POST['unique_id_profile_receiver'];
		$user_receiver=$_SESSION['login']; 

$selectallusersmessage=mysqli_query($con,"SELECT * FROM grp_messages,users where grp_messages.user_unique_id=users.unique_id and grp_messages.user_unique_id_r='$grp_id' order by grp_messages.message_id asc ")or die($con->error);



if (mysqli_num_rows($selectallusersmessage) >0) {
	 
while ($fetmessage=mysqli_fetch_array($selectallusersmessage)) { 

	if ($fetmessage['user_unique_id']!=$user_receiver) {
?>

	<div class="col-lg-7  message_box text-break">
		<div class="d-flex flex-row"> 
			<div class="mt-3">  
				<div class=" text-white p-2  text-center userprofileliked" style="background: #00b8ff;">
			<?php
			$new=$fetmessage['username'];
			 $upper_name=strtoupper($new); 
			 $nee=substr(($upper_name),0,1);
			 echo("<h3>".$nee."</h3>");
			?>
		</div>
			</div> 
			<div class="ml-3"> 
				
				<?php 
				if($fetmessage['message']!=''){ 
					?>
					<label class=" p-2 text-break"> 
					<?php
					$content=$fetmessage['message']; 
					if(preg_match_all('/#(\w+)/', $content, $matches)){
					$hashtags=$matches[1];
					$content=preg_replace('/#(\w+)/', '<a href="hashtags.php?hashtags=$1" class="text-decoration-underline text-link " target="blank">#$1</a>', $content); 
					echo$content;
					}elseif (preg_match_all('/@(\w+)/', $content, $matches)) {
					$hashtags=$matches[1];
					$content=preg_replace('/@(\w+)/', '<a href="#/tagged/$1" class="text-decoration-underline text-link " target="blank">@$1</a>', $content); 
					echo$content;	 
					}else{
						echo$content;
					}
					?>
				</label>
					<?php
				} 
				else{ 
					?>
					<img src="c_chat/chat_images/<?php echo$fetmessage['image']?>" class="img-thumbnail rounded border">
					<?php
				}

					?>		 
				<p class="text-dark"><?php echo($fetmessage['username'])?>	<span class="text-muted"><?php echo date('H:i A  D',strtotime($fetmessage['date']))?></span></p>		
			</div> 
		</div>
	</div>


<?php
}else{
?>  
	<div class="col-lg-12 message_box_r text-right  pr-5">  
			<div class="ml-3 ">
				<?php 
				if($fetmessage['message']!=''){ 
					?>
					<label class=" text-white p-2 text-break"> 
					<?php
					$content=$fetmessage['message']; 
					if(preg_match_all('/#(\w+)/', $content, $matches)){
					$hashtags=$matches[1];
					$content=preg_replace('/#(\w+)/', '<a href="hashtags.php?hashtags=$1" class="text-decoration-underline text-link " target="blank">#$1</a>', $content); 
					echo$content;
					}elseif (preg_match_all('/@(\w+)/', $content, $matches)) {
					$hashtags=$matches[1];
					$content=preg_replace('/@(\w+)/', '<a href="#/tagged/$1" class="text-decoration-underline text-link " target="blank">@$1</a>', $content); 
					echo$content;	 
					}else{
						echo$content;
					}
					?>
				</label>
					<?php
				} 
				else{ 
					?>
					<img src="c_chat/chat_images/<?php echo$fetmessage['image']?>" class="img-thumbnail rounded border">
					<?php
				}

					?>
				<p class="text-white"><span class="text-muted"><?php echo date('H:i A  D',strtotime($fetmessage['date']) )?></span></p>		
			</div> 
	</div>

<?php	 
}
}
}else{
	?>
	<div class="col-lg-12 text-muted " style="position: absolute;top: 40%;left: 30%">
		No  messages yet <svg xmlns="http://www.w3.org/2000/svg" width="50px" viewBox="0 0 640 512"><path d="M64 240c0 49.6 21.4 95 57 130.7-12.6 50.3-54.3 95.2-54.8 95.8-2.2 2.3-2.8 5.7-1.5 8.7 1.3 2.9 4.1 4.8 7.3 4.8 66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 27.4 0 53.7-3.6 78.4-10L72.9 186.4c-5.6 17.1-8.9 35-8.9 53.6zm569.8 218.1l-114.4-88.4C554.6 334.1 576 289.2 576 240c0-114.9-114.6-208-256-208-65.1 0-124.2 20.1-169.4 52.7L45.5 3.4C38.5-2 28.5-.8 23 6.2L3.4 31.4c-5.4 7-4.2 17 2.8 22.4l588.4 454.7c7 5.4 17 4.2 22.5-2.8l19.6-25.3c5.4-6.8 4.1-16.9-2.9-22.3z"/></svg>
	</div>
	<?php
}
}

?>
</div>

