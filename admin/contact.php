<?php $page = "Contact"; ?>
<?php include_once('../template/admin/header.php'); ?>
<?php include_once('../template/admin/sidebar.php'); ?>
<?php include_once('../template/admin/navbar.php'); ?>
<?php 
	$statement = $conn->prepare("SELECT * FROM contact");
	$statement->execute();
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	$a = extract($result,EXTR_PREFIX_ALL, "edit");

	if(isset($_POST['submit'])){

		$valid	= 1;
		$contact_info = $_POST['contact_info'];
		$contact_address = $_POST['contact_address'];
		
		if(empty($contact_info)){
		    $valid    = 0;
		    $errors[] = 'Please Enter Your Info';
		}

		if($valid == 1) {

			$update = $conn->prepare("UPDATE contact SET contact_info = ?, contact_address = ?  WHERE contact_id = ?");

			$update->execute(array($contact_info, $contact_address,1));

			$_SESSION['success'] = 'Contact Info has been updated successfully!';
			header('location: contact.php');
			exit(0);
		}
	}

	if(isset($_POST['email'])){

		$valid	= 1;
		$contact_email 		= $_POST['contact_email'];
		$contact_phone 	= $_POST['contact_phone'];
		
		if(empty($contact_email)){
		    $valid    = 0;
		    $errors[] = 'Please Enter Email From';
		}
		if(empty($contact_phone)){
		    $valid    = 0;
		    $errors[] = 'Please Enter Phone Number';
		}

		if($valid == 1) {

			$update = $conn->prepare("UPDATE contact SET contact_email = ?, contact_phone = ?  WHERE contact_id = ?");

			$update->execute(array($contact_email, $contact_phone,1));

			$_SESSION['success'] = 'Email & Phone Settings has been updated successfully!';
			header('location: contact.php');
			exit(0);
		}
	}

	if(isset($_POST['social'])){

		$valid	= 1;
		$contact_fb 		= $_POST['contact_fb'];
		$contact_tw 			= $_POST['contact_tw'];
		$contact_insta 	= $_POST['contact_insta'];
	 $contact_wts 	= $_POST['contact_wts'];
		

		if($valid == 1) {

			$update = $conn->prepare("UPDATE contact SET contact_fb = ?, contact_tw = ?, contact_insta = ?, contact_wts = ? WHERE contact_id = ?");

			$update->execute(array($contact_fb, $contact_tw, $contact_insta, $contact_wts,1));

			$_SESSION['success'] = 'Social Links has been updated successfully!';
			header('location: contact.php');
			exit(0);
		}
	}
?>
<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3"><strong>Contact</strong> Info</h1>
		<div class="row">
			<div class="col-md-3 col-xl-3">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Contact</h5>
					</div>
					<div class="list-group list-group-flush" role="tablist">
						<a class="list-group-item list-group-item-action active" data-bs-toggle="list"
							href="#contactinfo" role="tab" aria-selected="false">
							Contact Info
						</a>

						<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#email" role="tab"
							aria-selected="false">
							Email & Phone
						</a>

						<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#social"
							role="tab" aria-selected="false">
							Social Link
						</a>

					</div>
				</div>
			</div>
			<div class="col-md-9 col-xl-9">
				<div class="tab-content">
					<div class="tab-pane fade active show" id="contactinfo" role="tabpanel">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title mb-0">Contact info</h5>
							</div>
							<div class="card-body">
								<form action="" method="POST">
									<div class="row">
										<div class="col-md-12">
											<div class="mb-3">
												<label class="form-label" for="inputcontactinfo">Contact Info</label>
												<input type="text" class="form-control" id="inputcontactinfo"
													placeholder="Enter Contact Info"
													value="<?php echo clean($edit_contact_info); ?>"
													name="contact_info">
											</div>
											<div class="mb-3">
												<label class="form-label" for="inputaddress">Address</label>
												<input type="text" class="form-control" id="inputcontactaddress"
													placeholder="Enter Your Address"
													value="<?php echo clean($edit_contact_address); ?>"
													name="contact_address">
											</div>
										</div>
									</div>
									<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
								</form>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="email" role="tabpanel">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title mb-0">Email & Phone</h5>
							</div>
							<div class="card-body">
								<form action="" method="POST">
									<div class="row">
										<div class="col-md-12">
											<div class="mb-3">
												<label class="form-label" for="contact_email">Email</label>
												<input type="email" class="form-control" id="contact_email"
													placeholder="Enter Your Email"
													value="<?php echo clean($edit_contact_email); ?>"
													name="contact_email">
											</div>
											<div class="mb-3">
												<label class="form-label" for="contact_phone">Phone Number</label>
												<input type="text" class="form-control" id="contact_phone"
													placeholder="Enter Your Phone Number"
													value="<?php echo clean($edit_contact_phone); ?>"
													name="contact_phone">
											</div>
										</div>
									</div>
									<button type="submit" name="email" class="btn btn-primary">Save changes</button>
								</form>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="social" role="tabpanel">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title mb-0">Social Links</h5>
							</div>
							<div class="card-body">
								<form action="" method="POST">
									<div class="row">
										<div class="col-6">
											<div class="mb-3">
												<label class="form-label" for="contact_fb">Facebook Username</label>
												<input type="text" class="form-control" id="contact_fb"
													placeholder="Enter Your Facebook Username"
													value="<?php echo clean($edit_contact_fb); ?>" name="contact_fb">
											</div>
											<div class="mb-3">
												<label class="form-label" for="contact_tw">Twitter Username</label>
												<input type="text" class="form-control" id="contact_tw"
													placeholder="Enter Your Twitter Username"
													value="<?php echo clean($edit_contact_tw); ?>" name="contact_tw">
											</div>
										</div>

										<div class="col-6">
											<div class="mb-3">
												<label class="form-label" for="contact_insta">Instagram Username</label>
												<input type="text" class="form-control" id="contact_insta"
													placeholder="Enter Your Instagram Username"
													value="<?php echo clean($edit_contact_insta); ?>"
													name="contact_insta">
											</div>
											<div class="mb-3">
												<label class="form-label" for="contact_wts">Whatsapp Number (Start With
													255)</label>
												<input type="text" class="form-control" id="contact_wts"
													placeholder="Enter Your Whatsapp Number "
													value="<?php echo clean($edit_contact_wts); ?>" name="contact_wts">
											</div>
										</div>
									</div>
									<button type="submit" name="social" class="btn btn-primary">Save changes</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</main>
<?php include_once('../template/admin/footer.php'); ?>