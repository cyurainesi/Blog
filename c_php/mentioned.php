<?php 
function mention_users($con,$mentioned_user,$post_unique_id,$username)
{
	$date=date('Y-m-d');

	$insert=mysqli_query($con," INSERT INTO `mentions`(`mentioned_user`, `mentioner_user`, `post`,`date`) VALUES ('$mentioned_user','$username','$post_unique_id','$date')")or die($con->error);

}

function Action_mention($con,$content,$post_id,$username){

	 $str = $content;  
	if( preg_match_all('/@\w+/iu', $str, $itens)){

	foreach($itens[0] as $name){ 

		$selecttas=mysqli_query($con,"SELECT * FROM mentions where mentioned_user='$name' and post='$post_id'")or die($con->error); 

		if(mysqli_num_rows($selecttas) <= 0){  
			mention_users($con,$name,$post_id,$username);  

			}

		}
		
	}
}
 
?>