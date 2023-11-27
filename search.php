<link rel="stylesheet" href="css/search.css">
	
<?php require 'header.php';?>
		<div class="products fx">
<?php
	require "dconnection.php";
	// if(isset($_GET['submit'])){
		$searchbar = $_GET['searchbar'];
		// echo var_dump($searchbar);
		// $searchbar = mysqli_real_escape_string($REQUEST['searchbar']);	
		$search="SELECT * FROM product WHERE name like '%".$searchbar."%' ";
		$result =mysqli_query($connection,$search);
		if(mysqli_num_rows($result)>0){
					while ($row =mysqli_fetch_assoc($result)) {
						$data[]=$row;
						// print_r($data);
					}
				}else{
					echo "no items";
				}
				
				foreach ($data as $key ) {

?>					
				<div class="col product1">
					<div class="product-info"><a href="http://localhost/4thsemproject/product.php?product_id=<?php echo $key['productid'];?>"><img src="images/<?php echo $key['image'];?>" alt="idescription"></a></div>
					<div class="product-details"><span><?php echo $key['name'];?><br><?php echo $key['price'];?></span></div>
				</div>
			<?php } ?>
		</div>
	<?php require 'footer.php';?>