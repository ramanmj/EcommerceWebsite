

	 <?php 

		session_start(); 
		?>

		<?php include 'header.php';?>
		<div class="main">
			<div class="slider">
				<div class="slide">
					<a href="#">
						<img src="images/slider2.jpg" alt="image description">

					</a>
					<!-- <div class="text-holder">
						<div class="container">
							<h1>Hello to AI</h1>
						</div>
					</div> -->
				</div>
				<div class="slide">
					<a href="#"><img src="images/slider2.jpg" alt="image description"></a>
				</div>
				<div class="slide">
					<a href="#"><img src="images/slider2.jpg" alt="image description"></a>
				</div>
			</div>
			<div class="categories">
				<div class="s-heading"><h2>Shop by Categores</h2></div>
				
				<div class="container-category">
					<div class="sub-category"><a href="all.php"><img src="images/cat1.jpg" alt="image description"></a>
					<h2 class="sbcsummer">Summer</h2>
					</div>
					<div class="sub-category"><a href="female.php"><img src="images/cat2.jpg" alt="image description"></a>
					<h2 class="sbcfemale">Female</h2>
					</div>
					<div class="sub-category"><a href="male.php"><img src="images/cat3.jpg" alt="image description"></a>
					<h2 class="sbcmale">Male</h2>
					</div>
			</div>
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
			<!-- <div class="latest-products">
				<div class="second-nav">
					<div class="s-heading s-h-1">
						<h2>Latest Produsts</h2>
					</div>
					<ul class="js-tabs latest-categories ">
						 <li><a class="js-tabs__title" href="#">Tab 1</a></li>
   						 <li><a class="js-tabs__title" href="#">Tab 2</a></li>
   						 <li><a class="js-tabs__title" href="#">Tab 3</a></li>
					</ul>
				</div>
				<div class="tabs">
					<div id="tab1" class="js-tabs__content tab0">
						<div class="tabcontent row">
							
								<div class="col product1">
									<div class="product-info"><img src="images/product1.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product2">
									<div class="product-info"><img src="images/product1.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product3">
									<div class="product-info"><img src="images/product1.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
							
							
								<div class="col product4">
									<div class="product-info"><img src="images/product2.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product5">
									<div class="product-info"><img src="images/product2.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product6">
									<div class="product-info"><img src="images/product3.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
							
						</div>
					</div>
					<div id="tab2" class="js-tabs__content tab0">
						<div class="tabcontent row">
								<div class="col product1">
									<div class="product-info"><img src="images/product1.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product2">
									<div class="product-info"><img src="images/product2.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product3">
									<div class="product-info"><img src="images/product3.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product4">
									<div class="product-info"><img src="images/product3.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product5">
									<div class="product-info"><img src="images/sports.jpg" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product6">
									<div class="product-info"><img src="images/sports.jpg" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
						</div>
					</div>
					
					<div id="tab3" class="js-tabs__content tab0">
						<div class="tabcontent row">
								<div class="col product1">
									<div class="product-info"><img src="images/mobile.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product2">
									<div class="product-info"><img src="images/mobile.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product3">
									<div class="product-info"><img src="images/mobile.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product4">
									<div class="product-info"><img src="images/mobile.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product5">
									<div class="product-info"><img src="images/mobile.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product6">
									<div class="product-info"><img src="images/mobile.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
						</div>
					</div>
					
					<div id="tab4" class="js-tabs__content tab0">
						<div class="tabcontent row">
								<div class="col product1">
									<div class="product-info"><img src="images/deals.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product2">
									<div class="product-info"><img src="images/deals.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product3">
									<div class="product-info"><img src="images/deals.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product4">
									<div class="product-info"><img src="images/deals.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product5">
									<div class="product-info"><img src="images/deals.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
								<div class="col product6">
									<div class="product-info"><img src="images/deals.png" alt="image description"></div>
									<div class="product-details"><span>product name<br>product price</span></div>
								</div>
						</div>
					</div>
				</div>
			</div> -->
			<div class="best-exp-container">
				<div class="best-exp">
				<h3>Find The Best Product <br> from Our Shop</h3>
				<p>Sign-up for the best experience for shopping</p>
				<div class="stackcloths"><img src="images/card-shape.png" alt="image description"></div>
				<a href="#">Sign-up</a>
				</div>
			</div>
			<div class="top-seller-container">
				<div class="top-seller">
					<div class="left-seller">
						<div class="left-shopnow">
							<h2>Best Seller of  The Month</h2>
							<p>customer's favourite</p>
							<a href="#">shop-now</a>
						</div>
						<div class="img"><img src="images/stack.png" alt="image description"></div>
					</div>
					<div class="middle-seller"><img src="images/collection2.png" alt="image description"></div>
					<div class="right-seller">
						<div class="rigt-sell">
							<div class="col-content">
								<div class="right-cap">
									<div class="mens-wint"><h4>Mens winter<br>Shirt</h4></div>
									<div class="right-img"><img src="images/collection3.png" alt="image description"></div>
								</div>
								<div class="right-cap">
									<div class="mens-wint m-01"><h4>Mens winter<br>Geans</h4></div>
									<div class="right-img"><img src="images/collection4.png" alt="image description"></div>
								</div>
								<div class="right-cap">
									<div class="mens-wint"><h4>Mens winter<br>jacket</h4></div>
									<div class="right-img"><img src="images/collection5.png" alt="image description"></div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
			<div class="new-arrivals">
				<div class="arrivals-wrapper">
					<div class="arrival-container">
						<div class="arrival">
							<div class="h-2">
								<h2>Get Our<br> Latest Offer News</h2>
								<p>Turn on Notifications</p>
							</div>
							<div class="info">
								<form class="email-submit">
									<input type="text" class="emailhere" placeholder="example@gmail.com">
									<button class="shopnow">Shop now</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="payment-secu">
				<div class="s-p">
					<div class="s-s-p">
						<i class="fas fa-box"></i>
						<h4>Free shipping methord</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta ducimus cum quam iusto, aspernatur eveniet</p>
					</div>
					<div class="s-s-p">
						<i class="fas fa-lock"></i>
						<h4>Secure payment system</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta ducimus cum quam iusto, aspernatur eveniet</p>
					</div>
					<div class="s-s-p">
						<i class="fas fa-sync-alt"></i>
						<h4>Secure payment system</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta ducimus cum quam iusto, aspernatur eveniet</p>
					</div>	
				</div>
			</div>
			<div class="leatest-trends-container">
				<div class="leatest-trends">
					<?php
						include "dconnection.php";
						$slideimg="SELECT * FROM product";
						$sliderqry=mysqli_query($connection,$slideimg);
						if($sliderqry){
							while ($row =mysqli_fetch_array($sliderqry)) {
								$data[]=$row;
								}
							
							foreach ($data as $key ) {

					
					?>
					<div class="top-items">
						<a href="http://localhost/4thsemproject/product.php?product_id=<?php echo $key['productid'];?>">
							<img src="images/<?php echo $key['image']?>" alt="image description">
						</a>
					</div>
					<?php
						}
					}else{
						echo "empty";
					}
					?>
				</div>
			</div>
			<!-- <div class="about"></div> -->
		</div>
		<?php include 'footer.php';?>
