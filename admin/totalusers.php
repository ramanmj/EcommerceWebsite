<?php
require "../dconnection.php";
$totalusers="SELECT COUNT(cid) FROM customers";
$totalusersqry=mysqli_query($connection,$totalusers);
if($totalusersqry){
	$totalu=mysqli_fetch_row($totalusersqry);
	
}


?>