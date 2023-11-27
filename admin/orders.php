<?php
session_start();
if(isset($_SESSION['id'])){

?>
<?php include 'components/dashboardheader.php';?>

<div class="dashboard-main fx">
	<div class="menu">
		<?php include 'components/dashboardmenu.php';?>
	</div>
	<div class="analystic">
			<table>
				<thead>
				<tr>
					<th>ID</th>
					<th>Total</th>
					<th>Phone</th>
					<th>product name</th>
					<th>action</th>
				</tr>
				</thead>
				<tbody>
				<?php
				include "../dconnection.php";
				$sql="SELECT * FROM orders";
				$result=mysqli_query($connection,$sql);
				if(mysqli_num_rows($result)>0){
					while($row =mysqli_fetch_assoc($result)){
						$data[]=$row;
					}
					foreach ($data as $key ) {
						
			?>
			
				<tr>
					<td><?php echo $key['orderid']?></td>
					<td><?php echo $key['salestotal']?></td>
					<td><?php echo $key['contact']?></td>
					<td><?php echo $key['pname']?></td>
					<td><a href="deleteorders.php?orderid=<?php echo $key['orderid']?>"><button class="btn btn-danger delete">Delete</button></a></td>
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

