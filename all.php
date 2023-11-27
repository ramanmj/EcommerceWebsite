<?php include 'header.php';
		session_start();
	?>
	<div class="tab-content" id="tab3">	
<?php
		include "dconnection.php";
		$all="SELECT * FROM product ; ";
		$allq=mysqli_query($connection,$all);
		if(mysqli_num_rows($allq)>0){
		while ($allrow =mysqli_fetch_assoc($allq)) {
			$alldata[]=$allrow;
		}
	}
	foreach ($alldata as $allkey ) {
?>
<div class="product-container">
	<div class="product-info">
		<a href="http://localhost/4thsemproject/product.php?product_id=<?php echo $key['productid'];?>">
		<img src="images/<?php echo $allkey['image']?>" alt="image description">
		</a>
	</div>
	<div class="product-details">
		<div>
			<?php echo $allkey['name']?>
		</div>
		<div>
			<?php echo $allkey['price']?>
		</div>
	</div>
</div>
<?php }?>
</div>
<?php include 'footer.php';?>