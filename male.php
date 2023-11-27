	<link rel="stylesheet" href="css/male.css">
<?php include 'header.php';?>
<div class="tab-content" id="tab3">
	<?php
		include "dconnection.php";
		$male="SELECT * FROM product WHERE tag='male'; ";
		$maleq=mysqli_query($connection,$male);
		if(mysqli_num_rows($maleq)>0){
		while ($mrow =mysqli_fetch_assoc($maleq)) {
			$mdata[]=$mrow;
		}
	}
	foreach ($mdata as $key ) {
?>
<div class="product-container">
	<div class="product-info">
	<a href="http://localhost/4thsemproject/product.php?product_id=<?php echo $key['productid'];?>">
		<img src="images/<?php echo $key['image']?>" alt="image description">
	</a></div>
	<div class="product-details">
		<div>
			<?php echo $key['name']?>
		</div>
		<div>
			<?php echo $key['price']?>
		</div>
	</div>
</div>
<?php }?>
</div>
<?php include 'footer.php';?>