<?php
include 'dconnection.php'; 
$err=[];
session_start();
$pro_id = $_GET['product_id'];
$sql = "SELECT * FROM product  WHERE productid='$pro_id'";
$result = mysqli_query($connection,$sql);	
$row = mysqli_fetch_assoc($result);
include "order.php";
		if(isset($_POST['add'])){
			$sql= "INSERT INTO cart (customer_id,product_id,quantity,contact,name,price,total)VALUES('".$_SESSION['cid']."',$pro_id,1,'".$_SESSION['phone']."','".$row['name']."','".$row['price']."','".$row['price']."')";
			$result =mysqli_query($connection,$sql);
			if($result){
				echo "sucessdully inserted";
			}else{
				echo "connection fail";
			}
		}
		if(isset($_POST['submit'])){
			if(empty($_POST['comment'])){
				$err['comment']="enter your comment";
			}else{
				$cmt="INSERT INTO comments (comment,email,productid,name) VALUES ('".$_POST['comment']."','".$_SESSION['email']."',$pro_id,'".$_SESSION['name']."')";
				$cmtqry=mysqli_query($connection,$cmt);
				if($cmtqry){
					echo "comment posted sucessfully";
				}else{
					echo "failed to post comment";
				}
			}	
			
		}
		$cmt="SELECT * FROM comments WHERE productid='$pro_id'";
		$cmtsql=mysqli_query($connection,$cmt);
		

?>
	<link rel="stylesheet" href="css/product.css">

	<div class="container">
			<?php include 'header.php';?>
			<form class="-form" action="#" method="POST">
			
				<div class="frow df">
					<div class="col">
						<img src="images/<?php echo $row['image']?>" alt="image description">
					</div>
					
						<div class="descrip">
							<div class="name"><span><?php echo $row['name'];?></span></div>
							<div class="col ">
						<!-- <div class="rating"> -->
							<!-- <i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						</div> -->
							<p><?php echo $row['description']?></p>
							<div class="price">Rs. <?php echo $row['price']?></div>
						</div>
						<div class="buttons">
							<button class="btn2 buy" name="buy">Buy</button>
							<button class="btn2 add" name="add">Add to cart</button>
						</div>
					</div>
					<div class="col df">
						<div class="seller"></div>
					</div>
				</div>
				<div class="frow df">
					<form class="-form"  method="post">
						<div class="textarea">
							<h3>comment</h3>
							<textarea name="comment" class="comment" cols="30" rows="10"></textarea>
							<?php
								if(isset($err['comment'])){
									echo $err['comment'];
								}
							?>
							<button class="btn2" name="submit">submit</button>
						</div>
							<div class="sbutton">
								

							</div>
								
							<table>
							<thead>
								<tr>
									<th>name</th>
									<th>comment</th>
									<th>action</th>
								</tr>
							</thead>
							<tbody>
									<?php 

							if(mysqli_num_rows($cmtsql)>0 ){
							while($crow=mysqli_fetch_assoc($cmtsql)){
								$cdata[]=$crow;
								// echo var_dump($cdata);
							} 
							foreach ($cdata as $ckey) { ?>
							<tr>
								<td><?php echo $ckey['name']?></td>
								<td><?php echo $ckey['comment']?></td>
								<?php 
								if($_SESSION){
								if(($_SESSION['email']) == $ckey['email']){?>
								<td><a href="commentdelete.php?id=<?php echo $ckey['id']?>"><span class="delcmt">Delete</span></a></td>
								<?php } 
								?>
							</tr>
							<?php  
								// echo var_dump($ckey);	
									}}
								}
							?>
							</tbody>
							</table>
						</div>
					</form>
				</div>
			</form>
	</div>
	<?php include 'footer.php';?>