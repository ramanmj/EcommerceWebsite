<?php

include "../dconnection.php";
	$id=$_GET['orderid'];
	$del="DELETE FROM orders WHERE orderid='$id'";
	$delsql=mysqli_query($connection,$del);
	if($delsql){
		echo "deleted order";
	}else{
		echo "failed to delete order";
	}

?>