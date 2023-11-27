	<?php include 'header.php';?>
	<div class="femalecontent first">	
	<?php
		include "dconnection.php";
		$female="SELECT * FROM product WHERE tag='female'; ";
		$femaleq=mysqli_query($connection,$female);
		if(mysqli_num_rows($femaleq)>0){
		while ($femrow =mysqli_fetch_assoc($femaleq)) {
			$femdata[]=$femrow;
		}
	}
	foreach ($femdata as $femkey ) {
?>
<div class="product-container">
	<div class="product-info">
		<a href="http://localhost/4thsemproject/product.php?product_id=<?php echo $key['productid'];?>">
		<img src="images/<?php echo $femkey['image']?>" alt="image description">
		</a>
	</div>
	<div class="product-details">
		<div>
			<?php echo $femkey['name']?>
		</div>
		<div>
			<?php echo $femkey['price']?>
		</div>
	</div>
</div>

<?php }?>
</div>
<?php include 'footer.php';?>