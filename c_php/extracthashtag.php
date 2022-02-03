<?php
function insertags($con,$post_id,$name,$post_number)
{
	$selecttags=mysqli_query($con,"SELECT * FROM tags where tag='$name'");
	$insert=mysqli_query($con,"INSERT INTO tags (`post_id`,`tag`,`posts_number`) Values('$post_id','$name','$post_number')")or die($con->error);
}
function hashtagse($content,$post_id,$con)
{
	 $str = $content;  
	if( preg_match_all('/#\w+/iu', $str, $itens)){ 
	    

	foreach($itens[0] as $name){
		$selecttags=mysqli_query($con,"SELECT * FROM tags where tag='$name'");
		$post_number=1;
		if(mysqli_num_rows($selecttags) > 0){
			$fettags=mysqli_fetch_array($selecttags); 
			if($fettags['tag']==$name and $post_id!=$fettags['post_id']){
				$post_number=$post_number+1;
				mysqli_query($con,"UPDATE tags set posts_number='$post_number'")or die($con->error) ;
			}

		}else{
			$post_number=1;
			insertags($con,$post_id,$name,$post_number);
			
		}
		
	}

	
}
}
?>