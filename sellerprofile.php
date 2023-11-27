<?php 
session_start();
	if(isset($_SESSION['sellerid'])){
?>
<?php 
	include "header.php";
	$err=[];
	include "dconnection.php";
	if(isset($_POST['update'])){
		if(empty($_POST['shopname'])){
			$err['shopname']="enter shopname";
		}else{
			$shopname=$_POST['shopname'];
		}
		if(empty($_POST['Location'])){
			$err['Location']="enter Location";
		}else{
			$Location=$_POST['Location'];
		}
		if(empty($_POST['Landline'])){
			$err['Landline']="enter Landline";
		}else{
			$Landline=$_POST['Landline'];
		}
		if(empty($_POST['email'])){
			$err['email']="enter email";
		}else{
			$email=$_POST['email'];
		}
		if(count($err) == 0){
			$update = "UPDATE seller SET shopname= '$shopname' ,location='$Location',landline='$Landline',email='$email' WHERE sellerid='".$_SESSION['sellerid']."'";
			$updatesql=mysqli_query($connection,$update);
			if($updatesql){
				echo "done";
			}else{
				echo "$connection->connect_errno";
			}
		}
	}
	?>

	<form action="#" class="form profile-form" method="post">
		<fieldset>
		<div class="shop shopname">
			<label for="shopname">Shopname</label><br>
			<input type="text" name="shopname">
			<?php
				if(isset($err['shopname'])){
					echo $err['shopname'];
				}
			?>
		</div>
		<div class="shop Location">
			<label for="Location">Location</label><br>
			<input type="text" name="Location">
			<?php
				if(isset($err['Location'])){
					echo $err['Location'];
				}
			?>
		</div>
		<div class="shop Landline">
			<label for="Landline">Landline</label><br>
			<input type="number" name="Landline">
			<?php
				if(isset($err['Landline'])){
					echo $err['Landline'];
				}
			?>
		</div>
		<div class="shop email">
			<label for="email">email</label><br>
			<input type="text" name="email">
			<?php
				if(isset($err['email'])){
					echo $err['email'];
				}
			?>
		</div>
		<button name="update" class="btn2">Update</button>
		</fieldset>
	</form>
	<table>
		<h3>product orders</h3>
		<thead>
			<tr>
			<th>produtname</th>
			<th>price</th>
			<th>contact number</th>
			<th>status</th>
			<th>action</th>
		</tr>
		</thead>
		<tbody>
			<?php
		// echo var_dump($_SESSION);
					include "dconnection.php";
						$order="SELECT * FROM orders INNER JOIN product ON orders.pname = product.name WHERE sellerid='".$_SESSION['sellerid']."'";
						$ordersql = mysqli_query($connection,$order);
						if(mysqli_num_rows($ordersql)>0){
							while($row=mysqli_fetch_assoc($ordersql)){
								$data[]=$row;
							}
							foreach ($data as $key ) {
								// echo var_dump($key);
								?>
				<tr>
						<td><?php echo $key['pname']?></td>
						<td><?php echo $key['salestotal']?></td>
						<td><?php echo $key['contact']?></td>
						<td><?php echo $key['status']?></td>
						<td><a href="sellerprofile.php?orderid=<?php echo $key['orderid']?>"><button name="delete" class="btn2">Update</button></a></td>
				</tr>
		</tbody>
					<?php }
						}else{
							echo "no data";
						}
						if(isset($_GET['orderid'])){

							$status = "UPDATE orders SET status ='delevred' WHERE orderid='".$_GET['orderid']."';";
							$statussql= mysqli_query($connection,$status);
						}
					
						?>


	</table>
	<table>
		<h3>your products</h3>
		<thead>
			<tr>
			<th>name</th>
			<th>price</th>
			<th>description</th>
			<th>tag</th>
			<th>delete</th>
		</tr>
		</thead>
		<tbody>
			<tr>
			<?php
						$yourpro="SELECT * FROM product WHERE sellerid='".$_SESSION['sellerid']."' AND active='active'";
						$yourprosql = mysqli_query($connection,$yourpro);
						if(mysqli_num_rows($yourprosql)>0){
							while($orow=mysqli_fetch_assoc($yourprosql)){
								$odata[]=$orow;
							}
							foreach ($odata as $okey ) {
								?>
			<td><?php echo $okey['name'];?></td>
			<td><?php echo $okey['price'];?></td>
			<td><?php echo $okey['description'];?></td>
			<td><?php echo $okey['tag'];?></td>
			<td><a href="deletesellerorder.php?productid=<?php echo $okey['productid']?>"><button name="delete" class="btn1 btn-danger">delete</button></a></td>
		</tr>
			<?php }
		}else
		echo "no data";
			?>
		</tbody>
		
	</table>
	<?php include "footer.php";
}else{
	header("location:sellerlogin.php");
}
	?>
