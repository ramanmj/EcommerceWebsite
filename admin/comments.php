<?php
session_start();
if (isset($_SESSION['id'])) {
	

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
						$sql="SELECT * FROM comments";
						$result=mysqli_query($connection,$sql);
						if(mysqli_num_rows($result)>0){
							while($row =mysqli_fetch_assoc($result)){
								$data[]=$row;
							}
							foreach ($data as $key ) {
								
					?>
					
						<tr>
							<td><?php echo $key['id']?></td>
							<td><?php echo $key['comment']?></td>
							<td><?php echo $key['name']?></td>
							<td><?php echo $key['productid']?></td>
							<td><a href="deletecomments.php?id=<?php echo $key['id']?>"><button class="btn btn-danger">Delete</button></a></td>
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
