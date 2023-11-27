	<?php 
			session_start();
			include 'header.php';
				
			?>
	<div class="container">
			
			<div class="latest-products">
				<div class="second-nav">
					<div class="s-heading s-h-1">
						<!-- <h2>Latest Produsts</h2> -->
						<form class="-form" action="#" method="POST">
							<select name="value" id="">
								<option value="ASC" >featured</option>
								<option value="ASC" selected>low price to high</option>
								<option value="DESC">high price to low</option>
							</select>
							<button name="submit"><i class="fas fa-play"></i></button>
						</form>
						<?php
								$ascdesc="ASC";
								if(isset($_POST['submit'])){

								 	$ascdesc=$_POST['value'];
								}

						?>
					</div>
					<div class="js-tabs" id="tabs">

			  <ul class="js-tabs__header">
			  	<h2 class="lp">Latest products</h2>
			    <li><a class="js-tabs__title active" href="#tab1" >ALL</a></li>
			    <li><a class="js-tabs__title" href="#tab2">Mens</a></li>
			    <li><a class="js-tabs__title" href="#tab3">Womens</a></li>
			  </ul>
			  <div class="js-tabs__content">
			  	<div class="tab-content" id="tab1">
			  		<?php
			  		include "dconnection.php";
			  		$all="SELECT * FROM product ORDER BY price $ascdesc; ";
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
								<a href="http://localhost/4thsemproject/product.php?product_id=<?php echo $allkey['productid'];?>"><img src="images/<?php echo $allkey['image'];?>" alt="idescription"></a>
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
			  	<div class="tab-content" id="tab2"> 
			  		<?php
			  		include "dconnection.php";
			  		$male="SELECT * FROM product WHERE tag='male' ORDER BY price $ascdesc; ";
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
								<a href="http://localhost/4thsemproject/product.php?product_id=<?php echo $key['productid'];?>"><img src="images/<?php echo $key['image'];?>" alt="idescription"></a>
						</div>
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
			  	<div class="tab-content" id="tab3">
			  		<?php
			  		include "dconnection.php";
			  		$female="SELECT * FROM product WHERE tag='female' ORDER BY price $ascdesc; ";
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
								<a href="http://localhost/4thsemproject/product.php?product_id=<?php echo $femkey['productid'];?>"><img src="images/<?php echo $femkey['image'];?>" alt="idescription"></a>
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
			</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php include 'footer.php';
	?>