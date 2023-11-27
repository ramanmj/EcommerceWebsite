<?php
session_start();
	if(isset($_SESSION['id'])){
?>
<?php include 'components/dashboardheader.php';?>

<div class="dashboard-main fx">
	<div class="menu">
		<?php include 'components/dashboardmenu.php';?>
	</div>
	<div class="analystic ">
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Customers</th>
					<th>Phone</th>
					<th>action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include "../dconnection.php";
				$sql="SELECT * FROM customers WHERE active='active';";
				$result=mysqli_query($connection,$sql);
				if(mysqli_num_rows($result)>0){
					while($row =mysqli_fetch_assoc($result)){
						$data[]=$row;
					}
					foreach ($data as $key ) {
						
			?>
			
				<tr>
					<td><?php echo $key['cid']?></td>
					<td><?php echo $key['name']?></td>
					<td><?php echo $key['phone']?></td>
					<td><a href="deletecustomer.php?customerid=<?php echo $key['cid'];?>"><button class="btn btn-danger">Delete</button></a></td>
				</tr>
			<?php
						}
				}
			?>
			</tbody>
		</table>
	</div>
</div>
		
	<?php include 'components/dashboardfooter.php';
}else{
	header("location:loginadmin.php");
}
	?>
