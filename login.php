
	<link rel="stylesheet" href="css/login.css">
	<?php include 'header.php';?>
	<?php 
	// echo var_dump($_POST);

	session_start();
	// echo var_dump($_SESSION);
	include 'dconnection.php';
		$err =[];
		if(isset($_POST['login'])){
			if(empty($_POST['email']) || empty($_POST['password'] )){
				$err['email']="enter email and password";
			}else{
				$sql = "SELECT * from customers where email ='".$_POST['email']."' AND password = '".$_POST['password']."'"  ;
				$result = mysqli_query($connection,$sql);
				$row = mysqli_fetch_array($result);
				if(is_array($row)){
					if($row['active'] == 'active'){
						$_SESSION['cid']=$row['cid'];
						$_SESSION['email']=$row['email'];
						$_SESSION['phone']=$row['phone'];
						$_SESSION['name']=$row['name'];

					header("location:index.php");
					}else{
						$err['email']='user suspended';
					}
				}else{
					$err['email']="invalid email or password";
				}
			}
		}
	?> 
	<div class="body">
		<form class="a-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<fieldset>
				<h2>Sign In</h2>
				
				<label for="email">E-mail:</label>
				<div class="login1"><input type="text" name="email">
					<?php if(isset($err['email'])){
							echo $err['email'];
						}?>
				</div>
				<label for="password">Password</label>
				<div class="apassword"><input type="password" name="password"></div>
				<div class="button"><button  name="login" >Log-in	</button></div>

				<div class="terms"><span>Sign-in if you continue <a href="#">terms and conditions</a></span></div>
				<div class="forgot"><a href="#">Forgot your password?</a></div>

			</fieldset>
		</form>
		<div class="new"><span>Create new account</span></div>
		<div class="login2"><a href="register.php"><button>Sign-up</button></a></div>
	</div>
	<footer>
		<div class="help"><a href="#"><p class="helpa">Help</p></a></div>
		<div class="copyright"> <span>@company 2021,abc industries</span></div>
	</footer>
	<?php include 'footer.php';?>