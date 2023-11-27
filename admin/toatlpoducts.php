<?php
require "../dconnection.php";
$totalprodcut="SELECT COUNT(productid) FROM product";
$totalproductqry=mysqli_query($connection,$totalprodcut);
if($totalproductqry){
	$totalp=mysqli_fetch_row($totalproductqry);
	
}


?>