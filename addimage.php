<?php 
session_start();
	if(isset($_SESSION['sellerid'])){
		?>
		<?php
	require "dconnection.php";
	$err=[];
	if(isset($_POST['add'])){
		if(empty($_POST['pname'])){
			$err['pname']="enter name of the product";
		}else{
			$pname=$_POST['pname'];
		}
		if(empty($_POST['description'])){
			$err['description']="enter description of the product";
		}else{
			$description=$_POST['description'];
		}
		if(empty($_POST['price'])){
			$err['price']="enter price of the product";
		}else{
			$price=$_POST['price'];
		}
		if(empty($_POST['model'])){
			$err['model']="enter model of the product";
		}else{
			$model=$_POST['model'];
		}
		if(empty($_POST['gender'])){
			$err['gender']= "Select tag";
		}else{
			$tag=$_POST['gender'];
		}
		$filename =$_FILES["uploadfile"]["name"];
		$tempname =$_FILES["uploadfile"]["tmp_name"];
		$folder ="images/".$filename;
		move_uploaded_file($tempname,$folder);
			


		if(count($err)==0){
			$sql=" INSERT INTO product(name,description,price,productmodel,image,contact,sellerid,active,tag) VALUES ('$pname','$description','$price','$model','".$filename."','".$_SESSION['contactno']."','".$_SESSION['sellerid']."','active','$tag');";
			$result=mysqli_query($connection,$sql);
			if($result){
				echo "product added sucessfully";
			}else{
				echo "failedd to add product";
			}
		}
	}
?>

	<link rel="stylesheet" href="css/addimage.css">
	<?php include 'header.php';?>
	<form class="form addimage-form" action="#" method="POST" enctype="multipart/form-data">
		<fieldset>
		<div class="name">
			<label for="name">Product name</label><br>
			<input type="text" name="pname">
			<?php
				if(isset($err['pname'])){
					echo $err['pname'];
				}
			?>

		</div>
		<div class="desc">
			<label for="description">Product description</label><br>
			<input type="text" name="description">
			<?php
				if(isset($err['description'])){
					echo $err['description'];
				}
			?>
		</div>
		<div class="price">
			<label for="price">Product price</label><br>
			<input type="text" name="price">
			<?php
				if(isset($err['price'])){
					echo $err['price'];
				}
			?>
		</div>
		<div class="model">
			<label for="model">Product model</label><br>
			<input type="text" name="model">
			<?php
				if(isset($err['model'])){
					echo $err['model'];
				}
			?>
		</div>
		<div class="image">
			<label for="image">Product image</label><br>
			<input type="file" name="uploadfile" value="">
			<?php
				if(isset($err['uploadfile'])){
					echo $err['uploadfile'];
				}
			?>
		</div>
		<div class="gender">
			<label for="gender">Tag</label><br>
			Male<input type="radio" name="gender" value="male">
			Female<input type="radio" name="gender" value="female">
			<?php
				if(isset($err['gender'])){
					echo $err['gender'];
				}
			?>
		</div>
		<button name="add" class="btn2">Add Product</button>
		</fieldset>
	</form>
	<?php include 'footer.php';

	}else{
		header('location:sellerlogin.php');
	}
?>