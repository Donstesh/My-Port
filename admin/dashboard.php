<?php include_once('../template/admin/header.php'); ?>

<?php include_once('../template/admin/sidebar.php'); ?>

<?php include_once('../template/admin/navbar.php'); ?>
<?php 
	  //Total Subscribers
	  $stmt = $conn->prepare("SELECT * FROM users");
	  $stmt->execute();
	  $users = $stmt->rowCount();

	  //portifolio
	  $stmt = $conn->prepare("SELECT * FROM portifolio");
	  $stmt->execute();
	  $portifolio = $stmt->rowCount();

	  //portifolio
	  $stmt = $conn->prepare("SELECT * FROM portifolio");
	  $stmt->execute();
	  $portifolio = $stmt->rowCount(); 

	  //education
	  $stmt = $conn->prepare("SELECT * FROM education");
	  $stmt->execute();
	  $education = $stmt->rowCount();
?>
<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3"> Dashboard</h1>
		<div class="row">
			<div class="col-xl-6 col-xxl-5 d-flex">
				<div class="w-100">
					<div class="row">
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Users</h5>
										</div>
										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="users"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3"><?php echo clean($users); ?></h1>
									<div class="mb-0">
										<span class="text-muted">Total Users</span>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Portifolio</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="briefcase"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3"><?php echo clean($portifolio); ?></h1>
									<div class="mb-0">
										<span class="text-success">
											<span class="text-muted">Total Portifolio </span>
									</div>
								</div>
							</div>

						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Education</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="book"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3"><?php echo clean($education); ?></h1>
									<div class="mb-0">
										<span class="text-success">
											<span class="text-muted">Total</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-xxl-7">
				<div class="card flex-fill w-100">
					<div class="card-header">

						<h5 class="card-title mb-0">Recent Movement</h5>
					</div>
					<div class="card-body py-3">
						<div class="chart chart-sm">
							<canvas id="chartjs-dashboard-line"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php include_once('../template/admin/footer.php'); ?>
<?php 
		$stmt =  $conn->prepare("SELECT count(*) as total, MONTHNAME(user_date_created) as month FROM users GROUP BY MONTH(user_date_created)");
		$stmt->execute();
	  	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
	 
	  	//print_r($users);
	  	$month = array();
	  	$total = array();
	  	foreach ($users as $key => $value) {
	  		$month[] = $value['month'];
	  		$total[] = $value['total'];
	  	}
	  	$month = "'". implode("','", $month)."'";
	  	$total = implode(', ', $total);
 ?>
<script>
	document.addEventListener("DOMContentLoaded", function () {
		"use strict";
		var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
		var gradient = ctx.createLinearGradient(0, 0, 0, 225);
		gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
		gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
		// Line chart
		new Chart(document.getElementById("chartjs-dashboard-line"), {
			type: "line",
			data: {
				labels: [ < ? php echo clean($month); ? > ],
				datasets: [{
					label: "Users",
					fill: true,
					backgroundColor: gradient,
					borderColor: window.theme.primary,
					data: [ < ? php echo clean($total); ? > ]
				}]
			},
			options: {
				maintainAspectRatio: false,
				legend: {
					display: false
				},
				tooltips: {
					intersect: false
				},
				hover: {
					intersect: true
				},
				plugins: {
					filler: {
						propagate: false
					}
				},
				scales: {
					xAxes: [{
						reverse: true,
						gridLines: {
							color: "rgba(0,0,0,0.0)"
						}
					}],
					yAxes: [{
						ticks: {
							stepSize: 1000
						},
						display: true,
						borderDash: [3, 3],
						gridLines: {
							color: "rgba(0,0,0,0.0)"
						}
					}]
				}
			}
		});
	});
</script>