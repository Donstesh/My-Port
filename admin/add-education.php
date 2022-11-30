<?php $page = "Add Education"; ?>
<?php include_once('../template/admin/header.php'); ?>
<?php include_once('../template/admin/sidebar.php'); ?>
<?php include_once('../template/admin/navbar.php'); ?>
<?php 
	if(isset($_POST['submit'])){
		$valid 				= 1;
		$education_title 	= clean($_POST['education_title']);
		$education_desc 			= clean($_POST['education_desc']);
		$education_year 			= clean($_POST['education_year']);

		if(isset($_POST['education_status'])){
			$education_status 		= clean($_POST['education_status']);

			if($education_status == 'on'){
				$education_status = 1;
			}else{
				$education_status = 0;
			}
		}else{
			$education_status = 0;
		}

		$statement = $conn->prepare('SELECT  * FROM education WHERE education_title = ?');
	  	$statement->execute(array($education_title));
	  	$total = $statement->rowCount();
	  	if( $total > 0 ) {
	    	$valid    = 0;
	    	$errors[] = 'This Education title is already registered.';
	  	}
		//check if fields empty - code starts
		if(empty($education_title)){
		    $valid    = 0;
		    $errors[] = 'Please Enter Education Name';
		}
		if(empty($education_desc)){
		    $valid    = 0;
		    $errors[] = 'Please Enter Education Description';
		}
        if(empty($education_year)){
		    $valid    = 0;
		    $errors[] = 'Please Enter Education Year';
		}

	  //If everthing is OK - code starts
  	  if($valid == 1) {

		//insert the data
		$insert = $conn->prepare("INSERT INTO education (education_title, education_year, education_status, education_desc ) VALUES(?,?,?,?)");

		$insert->execute(array($education_title, $education_year, $education_status, $education_desc));

		//insert the data - code ends
		$_SESSION['success'] = 'education has been added successfully!';
	    header('location: education.php');
	    exit(0);
  	  }
	}
 ?>
<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3"><strong>Add</strong> Education</h1>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title mb-0">Education info</h5>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label" for="inputTitle">Education Title</label>
										<input type="text" class="form-control" id="inputTitle"
											placeholder="Enter Education Title" name="education_title">
									</div>
									<div class="mb-3">
										<label class="form-label" for="education_desc">Service Description</label>
										<textarea type="text" rows="4" class="form-control" id="education_desc"
											placeholder="Enter Education Description" name="education_desc"></textarea>
									</div>
									<div class="mb-3">
										<label class="form-label" for="inputurl">Education Year</label>
										<input type="text" class="form-control" id="inputurl"
											placeholder="Enter Education Years" name="education_year">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title mb-0">Education Status</h5>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="mt-4">
										<label for="flexSwitchCheckChecked">Enable / Disable</label>
										<div class="form-check form-switch mt-2">
											<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
												checked="" name="education_status">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</main>
<?php include_once('../template/admin/footer.php'); ?>