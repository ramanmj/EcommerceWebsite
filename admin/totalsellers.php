<?php
require "../dconnection.php";
$totalseller="SELECT COUNT(sellerid) FROM seller";
$totalsellersqry=mysqli_query($connection,$totalseller);
if($totalsellersqry){
	 $totals = mysqli_fetch_row($totalsellersqry);
    // return $totals[0];
}


?>