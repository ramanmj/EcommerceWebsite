<?php

include "../dconnection.php";
	$id=$_GET['customerid'];
	$del="UPDATE customers SET active='suspended' WHERE cid='$id'";
	$delsql=mysqli_query($connection,$del);
	if($delsql){
		echo "deleted customer";
	}else{
		echo "failed to delete order";
	}

