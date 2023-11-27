<?php
require "../dconnection.php";
$totalorder="SELECT COUNT(orderid) FROM orders";
$totalorderqry=mysqli_query($connection,$totalorder);
if($totalorderqry){
	$totalo=mysqli_fetch_row($totalorderqry);
	
}


?>