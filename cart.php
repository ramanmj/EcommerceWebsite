<?php
	session_start();
	if(isset($_SESSION['cid'])){
?>
<?php
	include "dconnection.php";
	$sql="SELECT * from cart WHERE customer_id='".$_SESSION['cid']."'";
	$result=mysqli_query($connection,$sql);

?>

<link rel="stylesheet" href="css/cart.css">
<?php include 'header.php';?>
<div class="container">
	<!-- <div class="image">
		<img src="images/cart.jpg" alt="image description">
	</div> -->
	<div class="cartlist">
		<table>
			<thead>
				<tr>
				<th>product</th>
				<th>price</th>
				<th>quantity</th>
				<th>total</th>
				<th>action</th>
			</tr>
			</thead>
			<tbody>
				<?php if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_assoc($result)){
						$data[]=$row;
					}
				}
				foreach ($data as $key ) {
					// $key['customer_id'];
				
				?>
			<tr>
				<td><?php echo $key['name']?></td>
				<td><?php echo $key['price']?></td>
				<td><?php echo $key['quantity']?></td>
				<td><?php echo $key['total']?></td>
				<td><a href="cart.php?cartid=<?php echo $key['cartid']?>"><button class="btn1 btn-danger">Delete</button></a></td>
			</tr>
			</tbody>
			<?php }
				if(isset($_GET['cartid'])){
					$id=$_GET['cartid'];
					$delcart="DELETE FROM cart WHERE cartid='$id'";
					$gelcartsql=mysqli_query($connection,$delcart);
				}
			?>
		</table>
	</div>
	<div class="buttons">
		<button class="update">Update</button>
		<button class="coupen">Use coupen</button>
	</div>
</div>
<?php include 'footer.php';
}else{
	header("location:login.php");
}
?>