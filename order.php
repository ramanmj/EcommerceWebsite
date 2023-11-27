<?php
	include "dconnection.php";
	// var_dump($_SESSION);
	if(isset($_POST['buy'])){
		$date = date('Y-m-d H:i:s');
		$order="INSERT INTO orders (salestotal,contact,pname) VALUES ('".$row['price']."','".$_SESSION['phone']."','".$row['name']."');";;
				
		$orderdetails="INSERT INTO orderdetails (orderdate,status,paymethord,contact,username,orderid) VALUES ('$date','queued','cash','".$_SESSION['phone']."','".$_SESSION['name']."') ;";
		$orderdetailsql=mysqli_query($connection,$orderdetails);
		$ordersql=mysqli_query($connection,$order);

		if($ordersql){
			echo "ordered sucessfully";
		}else{
			echo " failed order".mysqli_error($connection);
		}
	}
?>