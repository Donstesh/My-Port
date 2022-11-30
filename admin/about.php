<?php $page = "About"; ?>
<?php include_once('../template/admin/header.php'); ?>
<?php include_once('../template/admin/sidebar.php'); ?>
<?php include_once('../template/admin/navbar.php'); ?>
<?php 
	$statement = $conn->prepare("SELECT * FROM about");
	$statement->execute();
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	$a = extract($result,EXTR_PREFIX_ALL, "edit");

	if(isset($_POST['submit'])){

		$valid	= 1;
		$about_title = $_POST['about_title'];
		$about_desc = $_POST['about_desc'];
		$about_name = $_POST['about_name'];
		$about_email = $_POST['about_email'];
		$about_age = $_POST['about_age'];
		$about_address = $_POST['about_address'];
		$about_lang = $_POST['about_lang'];
		$about_exp = $_POST['about_exp'];
		$about_free = $_POST['about_free'];
		$about_skill = $_POST['about_skill'];
		$about_exp_yrs = $_POST['about_exp_yrs'];
		$about_happy = $_POST['about_happy'];
		$about_project = $_POST['about_project'];
		$about_awards = $_POST['about_awards'];
		$about_button = $_POST['about_button'];
		$about_hire = $_POST['about_hire'];
		
		if(empty($about_title)){
		    $valid    = 0;
		    $errors[] = 'Please Enter Your Info';
		}

		if($valid == 1) {

			$update = $conn->prepare("UPDATE about SET about_title = ?, about_desc = ?,	about_name = ?, about_email = ?, about_age = ?, about_address = ?, about_lang = ?, about_exp = ?, about_free = ?, about_skill = ?, about_exp_yrs = ?, about_happy = ?, about_project = ?, about_awards = ?, about_button = ?, about_hire = ?   WHERE about_id = ?");

			$update->execute(array($about_title, $about_desc, $about_name, $about_email, $about_age, $about_address, $about_lang, $about_exp, $about_free, $about_skill, $about_exp_yrs, $about_happy, $about_project, $about_awards, $about_button, $about_hire,1));

			$_SESSION['success'] = 'Personal Info has been updated successfully!';
			header('location: about.php');
			exit(0);
		}
	}

	// //Upload Front Image
	if(isset($_POST['photo'])){

		$valid	= 1;
		
		$about_file     = $_FILES['about_file']['name'];
		$about_file_tmp = $_FILES['about_file']['tmp_name'];

	  	if($about_file!='') {
	    	$about_file_ext = pathinfo( $about_file, PATHINFO_EXTENSION );
	    	$file_name = basename( $about_file, '.' . $about_file_ext );
	    	if( $about_file_ext!='jpg' && $about_file_ext!='png' && $about_file_ext!='jpeg' && $about_file_ext!='gif' ) {
	      	$valid = 0;
	      	$errors[]= 'You must have to upload jpg, jpeg, gif or png file<br>';
		   }
		}

		if($valid == 1) {

			if($about_file!='') {
			    $about_final_file = 'about-file-'.time().'.'.$about_file_ext;
			    move_uploaded_file( $about_file_tmp, '../storage/home/'.$about_final_file );
			    unlink('../storage/home/'.$edit_about_photo);
			}else{
				$about_final_file = $edit_about_photo;
			}

			$update = $conn->prepare("UPDATE about SET about_photo = ? WHERE about_id = ?");

			$update->execute(array($about_final_file,1));

			$_SESSION['success'] = 'Front Image has been updated successfully!';
			header('location: about.php');
			exit(0);
		}
	}

?>
<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3"><strong>About</strong> Info</h1>
		<div class="row">
			<div class="col-md-3 col-xl-3">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">About</h5>
					</div>
					<div class="list-group list-group-flush" role="tablist">
						<a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#aboutinfo"
							role="tab" aria-selected="false">
							Personal Info
						</a>

						<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#photo" role="tab"
							aria-selected="false">
							Front Image
						</a>

					</div>
				</div>
			</div>
			<div class="col-md-9 col-xl-9">
				<div class="tab-content">
					<div class="tab-pane fade active show" id="aboutinfo" role="tabpanel">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title mb-0">Personal info</h5>
							</div>
							<div class="card-body">
								<form action="" method="POST">
									<div class="row">
										<div class="col-md-12">
											<div class="mb-3">
												<label class="form-label" for="inputabouttitle">Title</label>
												<input type="text" class="form-control" id="inputabouttitle"
													placeholder="Enter Your Title"
													value="<?php echo clean($edit_about_title); ?>" name="about_title">
											</div>
											<div class="mb-3">
												<label class="form-label" for="inputdescription">Description</label>
												<input type="text" class="form-control" id="inputdescription"
													placeholder="Enter Your Description"
													value="<?php echo clean($edit_about_desc); ?>" name="about_desc">
											</div>
										</div>
										<div class="col-6">
											<div class="mb-3">
												<label class="form-label" for="inputaboutname">Your Name</label>
												<input type="text" class="form-control" id="inputaboutname"
													placeholder="Enter Your Name"
													value="<?php echo clean($edit_about_name); ?>" name="about_name">
											</div>
											<div class="mb-3">
												<label class="form-label" for="inputaddress">Your Address</label>
												<input type="text" class="form-control" id="inputaddress"
													placeholder="Enter Your  Address"
													value="<?php echo clean($edit_about_address); ?>"
													name="about_address">
											</div>
											<div class="mb-3">
												<label class="form-label" for="inputage">Your Age</label>
												<input type="text" class="form-control" id="inputage"
													placeholder="Enter Your  Age"
													value="<?php echo clean($edit_about_age); ?>" name="about_age">
											</div>
											<div class="mb-3">
												<label class="form-label" for="inputexp">Your Experience</label>
												<input type="text" class="form-control" id="inputexp"
													placeholder="Enter Your  Experience"
													value="<?php echo clean($edit_about_exp); ?>" name="about_exp">
											</div>
											<div class="mb-3">
												<label class="form-label" for="inputaboutexp">Years Of
													Experience</label>
												<input type="text" class="form-control" id="inputaboutexp"
													placeholder="Enter Experience Years"
													value="<?php echo clean($edit_about_exp_yrs); ?>"
													name="about_exp_yrs">
											</div>
											<div class="mb-3">
												<label class="form-label" for="inputproject">Project Completed</label>
												<input type="text" class="form-control" id="inputproject"
													placeholder="Enter Completed Project"
													value="<?php echo clean($edit_about_project); ?>"
													name="about_project">
											</div>
											<div class="mb-3">
												<label class="form-label" for="inputcv">CV Link</label>
												<input type="text" class="form-control" id="inputcv"
													placeholder="Enter CV URL"
													value="<?php echo clean($edit_about_button); ?>"
													name="about_button">
											</div>
										</div>
										<div class="col-6">
											<div class="mb-3">
												<label class="form-label" for="inputemail">Your Email Address</label>
												<input type="email" class="form-control" id="inputemail"
													placeholder="Enter Your Email Address"
													value="<?php echo clean($edit_about_email); ?>" name="about_email">
											</div>
											<div class="mb-3">
												<label class="form-label" for="inputskill">Your Skill</label>
												<input type="text" class="form-control" id="inputskill"
													placeholder="Enter Your Skill"
													value="<?php echo clean($edit_about_skill); ?>" name="about_skill">
											</div>
											<div class="mb-3">
												<label class="form-label" for="inputfree">Freelance Status</label>
												<input type="text" class="form-control" id="inputfree"
													placeholder="Enter Your Freelance Status"
													value="<?php echo clean($edit_about_free); ?>" name="about_free">
											</div>
											<div class="mb-3">
												<label class="form-label" for="inputlang">Language</label>
												<input type="text" class="form-control" id="inputlang"
													placeholder="Enter Your Language"
													value="<?php echo clean($edit_about_lang); ?>" name="about_lang">
											</div>
											<div class="mb-3">
												<label class="form-label" for="inputabouhappy">Happy Clients</label>
												<input type="text" class="form-control" id="inputabouthappy"
													placeholder="Enter Happy Clients"
													value="<?php echo clean($edit_about_happy); ?>" name="about_happy">
											</div>
											<div class="mb-3">
												<label class="form-label" for="inputawards">Awards Won</label>
												<input type="text" class="form-control" id="inputawards"
													placeholder="Enter Awards Won"
													value="<?php echo clean($edit_about_awards); ?>"
													name="about_awards">
											</div>
											<div class="mb-3">
												<label class="form-label" for="inputhire">Hire Me Phone Number</label>
												<input type="text" class="form-control" id="inputhire"
													placeholder="Enter Hire Link"
													value="<?php echo clean($edit_about_hire); ?>" name="about_hire">
											</div>
										</div>
									</div>
									<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
								</form>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="photo" role="tabpanel">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title mb-0">Image</h5>
							</div>
							<div class="card-body">
								<h5 class="card-title">Front Image</h5>
								<div class="col-md-12">
									<div class="text-center">
										<img alt="Front Image"
											src="../storage/home/<?php echo clean($edit_about_photo); ?>"
											class="rounded mx-auto d-block" width="200" height="200" id="aboutImg">
										<form action="" method="POST" enctype="multipart/form-data">
											<div class="mt-2">
												<button type="button" class="btn btn-success">Choose Image
													<input type="file" class="file-upload" value="Upload"
														name="about_file" onchange="previewFile(this);"
														accept="image/*">
												</button>
												<br><br>
												<input type="submit" name="photo" class="btn btn-primary"
													value="Save Changes">
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</main>
<?php include_once('../template/admin/footer.php'); ?>