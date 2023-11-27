<?php
include 'dconnection.php'; 
$sql = "SELECT * FROM product";
$result = mysqli_query($connection,$sql);	
// $url=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] =='on')?'https':'http'.'://'.$_SERVER['HTTP_HOST'];
		
?>
	<link rel="stylesheet" href="css/products.css">

	<div class="container">
			<?php include 'header.php';?>
			<div class="yp fx">
				<h2>Your products</h2>
				<a href="addimage.php"><button class="addp">add a product</button></a>
			</div>
			<div class="yourp fx">
				<?php 
				
				if(mysqli_num_rows($result)>0){
					while ($row =mysqli_fetch_assoc($result)) {
						$data[]=$row;
					}
				}
				foreach ($data as $key ) {
?>
				<div class="col product1">
					<div class="product-info"><a href="http://localhost/4thsemproject/product.php?product_id=<?php echo $key['productid'];?>"><img src="images/<?php echo $key['image'];?>" alt="idescription"></a></div>
					<div class="product-details"><span><?php echo $key['name'];?><br><?php echo $key['price'];?></span></div>
				</div>
				<?php } ?>
				<!-- <div class="col product1">
					<div class="product-info"><img src="images/product1.png" alt="idescription"></div>
					<div class="product-details"><span>product name<br>product price</span></div>
				</div>
				<div class="col product1">
					<div class="product-info"><img src="images/product1.png" alt="idescription"></div>
					<div class="product-details"><span>product name<br>product price</span></div>
				</div> -->
			</div>
	</div>
	<?php include 'footer.php';?>