<?php
session_start();
	if(isset($_SESSION['cid'])){
		?>
	
<div class="container">
		<?php
			
			// echo var_dump($_SESSION);
		 include 'header.php';?>
		<?php 
		include "dconnection.php";
			
		
		if(isset($_POST['update'])){
			$error=[];
				if(empty($_POST['name'])){
					$error['name']="enter name";
				}else{
					if(strlen($_POST['name'])<8){
						$error['name']="enter more then 8 letter";
					}else{
						$name=$_POST['name'];
					}
				}
				if(empty($_POST['email'])){
					$error['email']="enter email";
				}elseif (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $_POST['email'])){
					$email=$_POST['email'];
				}else{
					$error['email']="enter pattern dosent match";
				}
				if(empty($_POST['address'])){
					$error['address2']='enter address';
				}else{
					$address=$_POST['address'];
				}
				if(empty($_POST['address2'])){
					$error['address2']='enter address';
				}else{
					$address=$_POST['address2'];
				}

			if(count($error) == 0){
					$change = "UPDATE customers SET name = '".$_POST['name']."', email= '".$_POST['email']."', delevary_add='".$_POST['address']."', delevary_add2='".$_POST['address2']."'  WHERE cid = '".$_SESSION['cid']."'";
					$qchange = mysqli_query($connection,$change);
					if($qchange){
						echo "done";
					}
					else{
						die("$connection->connect_errno");
						}
			}

		}
			
		
			// echo var_dump($_SESSION);
			if(isset($_SESSION['cid'])){
				$sql=" SELECT * FROM customers WHERE cid='".$_SESSION['cid']."'";
				$result =Mysqli_query($connection,$sql);
				$row =Mysqli_fetch_array($result);
				// echo var_dump($row);

		?>
		<form class="form profile-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
			<fieldset>
				<div class="name">
					<label for="name" class="pnamel">Name</label><br>
					<input type="text" class="pname" name="name" placeholder="<?php echo $row['name'];?>">
					<?php if(isset($error['name'])){
						echo $error['name'];
					} ?>
				</div>
				<div class="email">
					<label for="email" class="pemail">Email</label><br>
					<input type="text" name="email" class="pemail" placeholder="<?php echo $row['email'];?>">
					<?php if(isset($error['email'])){
						echo $error['email'];
					} ?>
				</div>
				<!-- <div class="number">
					<label for="number">Number</label>
					<input type="text" address="number1" name="number" placeholder="<?php echo $row['phone'];?>">
					<input type="text" address="number2" name="number2" placeholder="<?php echo $row['phone2'];?>">
					<?php if(isset($error['number'])){
						echo $error['number'];
					} ?>
				</div> -->
				<div class="address">
					<label for="address" class="paddress">Address</label><br>
					<input type="text" class="address1" name="address" placeholder="<?php echo $row['delevary_add'];?>">

					<input type="text" class="address2" name="address2" placeholder="<?php echo $row['delevary_add2'];?>">
					<?php if(isset($error['address2'])){
						echo $error['address2'];
					} ?>
				</div>
				<div class="pp">
					<button name="update">Save Changes</button>
				</div>
				
			</fieldset>
			<?php }; ?>
		</form>
		<!-- <form class="-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'> -->
			
		
		<table>
			<h2>your orders</h2>
			<thead>
				<tr>
				<td>product</td>
				<td>price</td>
				<!-- <td>quantity</td> -->
				<td>Status</td>
				<td>delete</td>
			</tr>
			</thead>
			<tbody>
				<?php
				include "dconnection.php";
					$order="SELECT * FROM orders where contact='".$_SESSION['phone']."'";
					$ordersql = mysqli_query($connection,$order);
					if(mysqli_num_rows($ordersql)>0){
						while($row=mysqli_fetch_assoc($ordersql)){
							$data[]=$row;
						}
						foreach ($data as $key ) {
							?>
			<tr>
					<td><?php echo $key['pname']?></td>
					<td><?php echo $key['salestotal']?></td>
					<!-- <td><?php echo $key['quantity']?></td> -->
					<td><?php echo $key['status']?></td>
					<td><a href="profile.php?orderid=<?php echo $key['orderid']?>"><button name="delete">Delete</button></a></td>
			</tr>
				<?php }
					}else{
						echo "no orders";
					}
					
					
				
					?>
			</tbody>
				
		</table>
		<!-- </form> -->
		<?php 
			if(isset($_GET['orderid'])){
				$id=$_GET['orderid'];
				echo $id;
					$delete = "DELETE FROM orders WHERE orderid='$id'";
					$delsql=(mysqli_query($connection,$delete));
						if($delsql){
							echo "done";
						}else{
							echo "fail $connection->connect_errno";
						}
				}
			
		?>
</div>
<?php include 'footer.php';
	}else{
	header('location:login.php');
}
?>