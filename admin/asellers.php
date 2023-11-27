 

			<!-- <div class="main fx">
				<div class="menu">
				<ul>
					<a href="dashboard.php"><li>Dashboard</li></a>
					<a href="acustomers.php"><li>Customers</li></a>
					<a href="reports.php"><li>Reports</li></a>
					<a href="comments.php"><li>Comments</li></a>
					<a href="orders.php"><li>Orders</li></a>
					<a href="asellers.php"><li>Sellers</li></a>
				</ul>

			</div> -->
<?php 
session_start();
if(isset($_SESSION['id'])){


?>
<?php include 'components/dashboardheader.php';?>

<div class="dashboard-main fx">
	<div class="menu">
		<?php include 'components/dashboardmenu.php';?>
	</div>
	<div class="analystic fx">
					<table>
						<thead>
						<tr>
							<th>SN</th>
							<th>Shop name</th>
							<th>Phone</th>
							<th colspan="2">action</th>
						</tr>
						</thead>
						<tbody>
							<?php
								include "../dconnection.php";
								$sql="SELECT * FROM seller WHERE active='active';";
								$result=mysqli_query($connection,$sql);
								if(mysqli_num_rows($result)>0){
									while($row =mysqli_fetch_assoc($result)){
										$data[]=$row;
									}
									foreach ($data as $key ) {
							?>
								<tr>
									<td><?php echo $key['sellerid']?></td>
									<td><?php echo $key['shopname']?></td>
									<td><?php echo $key['contactno']?></td>
									<td><a href="deleteseller.php?sellerid=<?php echo $key['sellerid']?>"><button class="btn btn-danger">Delete</button></a></td>
								</tr>
							<?php
										}
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

<?php include 'components/dashboardfooter.php';
}else{
	header("location:loginadmin.php");
}
?>