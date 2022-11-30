<?php $page = "Portifolio"; ?>
<?php include_once('../template/admin/header.php'); ?>
<?php include_once('../template/admin/sidebar.php'); ?>
<?php include_once('../template/admin/navbar.php'); ?>
<?php
	if(isset($_GET['delete']) AND is_numeric($_GET['delete'])) {
	// Check the portifolio id is valid or not
	  $statement = $conn->prepare("SELECT * FROM portifolio WHERE portifolio_id=?");
	  $statement->execute(array($_GET['delete']));
	  $total = $statement->rowCount();
	  if( $total == 0  OR $_GET['delete'] == 1) {
	    header('location: portifolio.php');
	    exit;
	  }else{

	  	$result = $statement->fetch(PDO::FETCH_ASSOC);
	  	if($result['portifolio_photo'] != '' AND $result['portifolio_photo'] != 'default.png') {
	      unlink('storage/portifolio/'.$result['portifolio_photo']); 
	    }	
	    // Delete from portifolio Table
	    $statement = $conn->prepare("DELETE FROM portifolio WHERE portifolio_id=?");
	    $statement->execute(array($_GET['delete']));
	    $_SESSION['success'] = 'Portifolio has been deleted';
	    header('location: portifolio.php');
	    exit(0);
	  }
	}
?>
<main class="content">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-md-6">
				<h1 class="h3 mb-3"><strong>All</strong> Portifolio</h1>
			</div>
			<div class="col-md-6 text-md-end">
				<a href="add-portifolio.php" class="btn btn-pill btn-primary float-right"><i class="align-middle"
						data-feather="plus"></i> Add Portifolio</a>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<table class="table dataTable table-striped table-hover">
					<thead>
						<tr>
							<th>Portifolio Image</th>
							<th>Portifolio Title</th>
							<th>Portifolio Description</th>
							<th>Status</th>
							<th>Date Created</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
			                $i=1;
			                $statement = $conn->prepare('SELECT * FROM portifolio ORDER BY portifolio_id DESC');
			                $statement->execute();
			                $portifolio = $statement->fetchAll(PDO::FETCH_ASSOC);
			                $sNo  = 1;
			                foreach ($portifolio as $portifolio) {
			                ?>
						<tr>
							<td>
								<img src="../storage/portifolio/<?php echo clean($portifolio['portifolio_photo']); ?>"
									width="100" height="100" class="rounded mx-auto d-block" alt="Avatar">
							</td>
							<td><?php echo clean($portifolio['portifolio_title']); ?></td>
							<td class="col-2 text-truncate" style="max-width: 150px;">
								<?php echo clean($portifolio['portifolio_desc']); ?></td>


							<td><?php echo ($portifolio['portifolio_status'] == 1) ? "<span class='badge bg-primary me-1 my-1'>Active</span>" : "<span class='badge bg-danger me-1 my-1'>Disabled <span>"; ?>
							</td>
							<td><?php echo date("M d, Y", strtotime($portifolio['p_created'])); ?></td>
							<td>
								<a href="edit-portifolio.php?edit=<?php echo clean($portifolio['portifolio_id']); ?>"><i
										class="align-middle" data-feather="edit-2"></i></a>
								<?php if($portifolio['portifolio_id'] != 1){ ?>
								<a href="#"
									data-href="portifolio.php?delete=<?php echo clean($portifolio['portifolio_id']); ?>"
									data-bs-toggle="modal" data-bs-target="#confirm-delete"><i class="align-middle"
										data-feather="trash"></i></a>
								<?php } ?>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<!-- BEGIN primary modal -->
			<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Delete Portifolio</h5>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						<div class="modal-body m-3">
							<p class="mb-0">Are you sure to delete this Portifolio?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<a class="btn btn-primary">Delete Portifolio</a>
						</div>
					</div>
				</div>
			</div>
			<!-- END primary modal -->
		</div>
</main>
<?php include_once('../template/admin/footer.php'); ?>