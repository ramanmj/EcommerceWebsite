<?php

include "../dconnection.php";
	$id=$_GET['id'];
	$del="DELETE FROM comments WHERE id='$id'";
	$delsql=mysqli_query($connection,$del);
	if($delsql){
		echo "deleted comments";
		header("location:comments.php");
	}else{
		echo "failed to delete comment";
	}

?>