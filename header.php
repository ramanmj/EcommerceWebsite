<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content='width=device-width,inital-scale=1'>
	<link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="css/profile.css">
	<!-- <link rel="stylesheet" href="css/slick-theme.css"> -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;0,800;1,400;1,500&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,700;0,800;1,500&family=Poppins:ital,wght@0,400;0,500;0,700;0,800;1,400;1,500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/vanilla-js-tabs.css" />
	<link rel="stylesheet" href="css/1.css">
	<link rel="stylesheet" href="css/new.css">
	<script src="https://kit.fontawesome.com/1e29f16d53.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/jquery-3.6.0.slim.min.js"></script>
	<script type="text/javascript" src="js/slick.min.js"></script>
	<script type="text/javascript" src="js/jquery.main.js"></script>
	<script src="js/vanilla-js-tabs.min.js"></script>
	<!-- <script type="text/javascript" src="js/slick.js"></script> -->
	<script type="text/javascript">
		// $(document).ready(function(){
		// 	$('.slider').slick();
		// });
		// $(document).ready(function(){
		// 	$('.leatest-trends').slick();
		// });

		
	</script>
</head>
<body>
	<div class="wrapper">
<header class="header">
			<div class="container">
				<div class="row">
					<div class="logo">
						<a href="#"><img src="images/logo.png" alt="image description"></a>
					</div>
					<div class="main-nav">
						<div class="nav">
							<div class="cover-container">
								<div class="cover">
								<ul class="">
									<li><a href="index.php">Home</a></li>
									<li><a href="categories.php">Catagories</a></li>
									<li><a href="sell.php">Sell</a></li>
									<li><a href="vouchers.php">Vouchres</a></li>
									<li><a href="latest.php">Latest</a></li>

								</ul>
								<div class="button-holder">
									<a href="register.php">Signin</a>
								</div>
							</div>
							</div>
						</div>
						<div class="search-container">
							
							<form class="s-form" action="search.php" method="get">
								<input type="search" placeholder="Search Products" name="searchbar">
								<button type="submit"><i class="fas fa-search"></i></button>
							</form>
						</div>
						<div class="icons-container">
							<div class=""><a href="#" class="search-icon"><i class="fas fa-search"></i></a></div>
							<div class="cart-holder">
								<a href="cart.php" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
							</div>
							<div class=""><a href="#" class="nav-opener"><i class="fas fa-bars" ></i></a></div>
						</div>
						<div class="signup-holder">

							<?php 
							// session_start();
							if(isset($_SESSION['cid'])) { ?> 
								<div class="login-content">
									<div class="usernme"><?php echo $_SESSION['name'];?>'s</div>
									<ul class="pdteails">
										<li><a href="logout.php">logout</a></li>
										<li><a href="profile.php">Profile</a></li>
									</ul>
								</div>
							 <?php }else if(isset($_SESSION['sellerid'])){?>
							 	<div class="login-content">
									<div class="usernme"><?php echo $_SESSION['shopname'];?>'s</div>
									<ul class="pdteails">
										<li><a href="logout.php">logout</a></li>
										<li><a href="sellerprofile.php">Profile</a></li>
									</ul>
								</div>
							<?php }  
							else {?>
									<a href="login.php"><button class="signup-button">Sign In</button></a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</header>