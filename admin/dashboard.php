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
		<div class="dbc users">
			<h4>Users</h4>
		<?php
			include "totalusers.php";
			echo $totalu[0];
			
			
		?>
		</div>
		<div class="dbc sellers">
			<h4>sellers</h4>
		<?php
			include "totalsellers.php";
			echo $totals[0];

		?>
		</div>
		<div class="dbc totalproducts">
			<h4>total products</h4>
			<?php
			include "toatlpoducts.php";
			echo $totalp[0];

		?>
		</div>
		<div class="dbc orders">
			<h4>orders</h4>
			<?php
			include "totalorders.php";
			echo $totalo[0];

		?>
		</div>
		<div class="dbc sessionsinuse">
			<h4>Sessions in use</h4>
		</div>
	</div>
</div>

	<?php include 'components/dashboardfooter.php';
}else{
	header("location:loginadmin.php");
}
	?>
