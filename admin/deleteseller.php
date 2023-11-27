<?php
include "../dconnection.php";
	$id=$_GET['sellerid'];
	$qry="UPDATE seller SET active='suspended' WHERE sellerid='$id'";
	$res=mysqli_query($connection,$qry);
	if($res){
		echo "deleted seller";
	}else{
		echo "failed to delete seller";
	}
?>