<?php 
	include "dconnection.php";
				$id=$_GET['productid'];
				session_start();
				echo $id;
					$delete = "UPDATE product SET active ='suspend' WHERE productid='".$_GET['productid']."'";
					$delsql=(mysqli_query($connection,$delete));
						if($delsql){
							echo "done";
							header("location:sellerprofile.php");
						}else{
							echo "fail $connection->connect_errno";
						}
				
			?>