<link rel="stylesheet" href="css/regester.css">
	
	 <?php include 'header.php';?>
	<?php
include 'dconnection.php'; 
		$error=[];
		if(isset($_POST['submit'])){
			if(empty($_POST['name'])){
				$error['name']="enter name";
			}else{
				if(strlen($_POST['name'])<8){
					$error['name']="enter more then 8 letter";
				}else{
					$name=$_POST['name'];
				}
			}
			if(empty($_POST['email'])){
				$error['email']="enter email";
			}elseif (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $_POST['email'])){
				$email=$_POST['email'];
			}else{
				$error['email']="enter pattern dosent match";
			}
			if(empty($_POST['password'])){
				$error['password']="enter password";
			} 
			if($_POST['re-password'] != $_POST['password']){
				$error['re-password']="password dosen't match";
			}else{
				$password=$_POST['password'];
			}
			if(!isset($_POST['gender'])){
				$error['gender']="select  gender";
			}else{
				$gender= $_POST['gender'];
			}
			$phn = "SELECT phone FROM customers where phone=".$_POST['phone'];
			if(empty($_POST['phone'])){
				$error['phone']="enter phone";
			}elseif(($_POST['phone'])<10){
				$error['phone']="enter 10 digits";
			// }elseif(mysql_num_rows($result)>0){
			// 	$error['phone']="number already registered";
			}else{
				$phone=$_POST['phone'];
			}

		
		if(count($error) == 0){
			$sql="INSERT INTO customers (name,email,password,gender,phone) values ('$name','$email','$password','$gender','$phone')";
			$result = mysqli_query($connection,$sql);
			if ($result){	
				header("location:index.php");
				
			} else {
				die("register failed $connection->error");
				
			}
		
			//connection close
			$connection->close();
			
		}
	}
?>

	<div class="body">
		<form class="reg-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<fieldset>	
				<div class="head"><h2>Register</h2></div>
				<div class="name">
					<label for="name">Enter name</label>
					<div class="name1"><input type="text" name="name">
						<?php if(isset($error['name'])){ ?>
							<p> <?php echo $error['name'];  ?></p>
						
						
						 <?php } ?></div>
				</div>
				<div class="email">
					<label for="email">Enter email</label>
					<div class="mail"><input type="text" name="email">
						<?php if(isset($error['email'])){
							echo $error['email'];
						}
						?></div>
				</div>
				<div class="phone">
					<label for="phone">Enter phone</label>
					<div class="phone"><input type="text" name="phone">
						<?php if(isset($error['phone'])){
							echo $error['phone'];
						}
						?></div>
				</div>
				<div class="password">
					
					<label for="password">Enter password</label>
					<div class="pass"><input type="password" name="password">
						<?php if(isset($error['password'])){
							echo $error['password'];
						}
						?></div>
				</div>
				<div class="re-password">
					<label for="re-password">Confirm password</label>
					<div class="reenter"><input type="password" name="re-password">
						<?php if(isset($error['re-password'])){
							echo $error['re-password'];
						}
						?></div>
				</div>
				<div class="gender">
					
					<label for="gender">Gender</label>
					<div class="options">
						<label for="male">Male</label>
						<input type="radio" name="gender" value="male">
						<label for="female">Female</label>
						<input type="radio" name="gender" value="female">
						<label for="other">Other</label>
						<input type="radio" name="gender" value="other">
						<?php if(isset($error['gender'])){
							echo $error['gender'];
						}
						?>
					</div>
				</div>
				<div class="s">
					<button class="submit" name="submit">Submit</button>
				</div>
				<div class="terms"><span>by creating an account, you agree to abc <a href="#">Conditions of Use </a>and <a href="#">Privacy Notice.</a></span></div>
				<div class="login">
					<span>Already regestered</span>
				<a href="login.html">login</a>
			</div>
			</fieldset>
			
		</form>
	</div>
	<!-- <footer>
		<div class="fter">
			<a href="#" class="contition">Condition of use</a>
			<a href="#" class="primary">Primary notice</a>
			<a href="#" class="help">Help</a>
		</div>
		<div class="company">©2000-2021, Abc.com, Inc. or its affiliates</div>
	</footer> -->
	<?php include 'footer.php';?>