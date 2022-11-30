<?php $page = "Users"; ?>
<?php include_once('../template/admin/header.php'); ?>
<?php include_once('../template/admin/sidebar.php'); ?>
<?php include_once('../template/admin/navbar.php'); ?>
<?php
	if(isset($_GET['delete']) AND is_numeric($_GET['delete'])) {
	// Check the id is valid or not
	  $statement = $conn->prepare("SELECT * FROM users WHERE user_id=?");
	  $statement->execute(array($_GET['delete']));
	  $total = $statement->rowCount();
	  if( $total == 0  OR $_GET['delete'] == 1) {
	    header('location: logout.php');
	    exit;
	  }else{

	  	$result = $statement->fetch(PDO::FETCH_ASSOC);
	  	if($result['user_photo'] != '' AND $result['user_photo'] != 'default.png') {
	      unlink('../storage/profile/'.$result['user_photo']); 
	    }	
	    // Delete from Users Table
	    $statement = $conn->prepare("DELETE FROM users WHERE user_id=?");
	    $statement->execute(array($_GET['delete']));
	    $_SESSION['success'] = 'User has been deleted';
	    header('location: users.php');
	    exit(0);
	  }
	}
?>
<main class="content">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-md-6">
				<h1 class="h3 mb-3"><strong>All</strong> Users</h1>
			</div>
			<div class="col-md-6 text-md-end">
				<a href="add-user.php" class="btn btn-pill btn-primary float-right"><i class="align-middle"
						data-feather="user-plus"></i> Add User</a>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<table class="table dataTable table-striped table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Username</th>
							<th>Email</th>
							<th>Status</th>
							<th>Date Created</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
			                $i=1;
			                $statement = $conn->prepare('SELECT * FROM users ORDER BY user_id DESC');
			                $statement->execute();
			                $users = $statement->fetchAll(PDO::FETCH_ASSOC);
			                $sNo  = 1;
			                foreach ($users as $user) {
			                ?>
						<tr>
							<td>
								<img src="../storage/profile/<?php echo clean($user['user_photo']); ?>" width="48"
									height="48" class="rounded-circle me-2" alt="Avatar">
								<?php echo clean($user['user_full_name']); ?>
							</td>
							<td><?php echo clean($user['user_name']); ?></td>
							<td><?php echo clean($user['email']); ?></td>
							<td><?php echo ($user['user_status'] == 1) ? "<span class='badge bg-primary me-1 my-1'>Active</span>" : "<span class='badge bg-danger me-1 my-1'>Disabled <span>"; ?>
							</td>
							<td><?php echo date("M d, Y", strtotime($user['user_date_created'])); ?></td>
							<td>
								<a href="edit-user.php?edit=<?php echo clean($user['user_id']); ?>"><i
										class="align-middle" data-feather="edit-2"></i></a>
								<?php if($user['user_id'] != 1){ ?>
								<a href="#" data-href="users.php?delete=<?php echo clean($user['user_id']); ?>"
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
							<h5 class="modal-title">Delete User</h5>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						<div class="modal-body m-3">
							<p class="mb-0">Are you sure to delete this user?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<a class="btn btn-primary">Delete User</a>
						</div>
					</div>
				</div>
			</div>
			<!-- END primary modal -->
		</div>
</main>
<?php include_once('../template/admin/footer.php'); ?>