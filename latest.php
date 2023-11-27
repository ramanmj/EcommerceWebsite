<?php
	include "dconnection.php";
	$sql="SELECT * FROM product ORDER BY productid DESC";
	$result = mysqli_query($connection,$sql);
	session_start();
?>

	<link rel="stylesheet" href="css/latest.css">
	
	<div class="container">
		<?php include 'header.php';?>
				<h2>latest products</h2>
			<div class="products fx">

				<?php
					if(mysqli_num_rows($result)>0){
					while ($row =mysqli_fetch_assoc($result)) {
						$data[]=$row;
					}
				}
				foreach ($data as $key ) {
?>
			<div class="col product1">
				<div class="product-info"><img src="images/<?php echo $key['image']?>" alt="idescription"></div>
				<div class="product-details"><span><?php echo $key['description']?><br><?php echo $key['price']?></span></div>
			</div>
			<!-- <div class="col product1">
				<div class="product-info"><img src="images/product2.png" alt="idescription"></div>
				<div class="product-details"><span>product name<br>product price</span></div>
			</div>
			<div class="col product1">
				<div class="product-info"><img src="images/product3.png" alt="idescription"></div>
				<div class="product-details"><span>product name<br>product price</span></div>
			</div> -->
			<?php 	
				
					}
					?>
			</div>
		</div>
	<?php include 'footer.php';?>