<?php $page = "Add User"; ?>
<?php include_once('../template/admin/header.php'); ?>
<?php include_once('../template/admin/sidebar.php'); ?>
<?php include_once('../template/admin/navbar.php'); ?>
<?php 

	if(isset($_POST['submit'])){
		$valid 				= 1;
		$user_full_name 	= clean($_POST['user_full_name']);
		$username 			= clean($_POST['username']);
		$email 				= clean($_POST['email']);
		$password 			= clean($_POST['password']);
		$verify_password 	= clean($_POST['verify_password']);
		$password_hash    	= password_hash($password, PASSWORD_DEFAULT);

		$date_created       = date('Y-m-d H:i:s');
		if(isset($_POST['status'])){
			$status 		= clean($_POST['status']);

			if($status == 'on'){
				$status = 1;
			}else{
				$status = 0;
			}
		}else{
			$status = 0;
		}

		$statement = $conn->prepare('SELECT  * FROM users WHERE user_name = ? OR email = ?');
	  	$statement->execute(array($username, $email));
	  	$total = $statement->rowCount();
	  	if( $total > 0 ) {
	    	$valid    = 0;
	    	$errors[] = 'This user is already registered.';
	  	}
		//check if fields empty - code starts
		if(empty($user_full_name)){
		    $valid    = 0;
		    $errors[] = 'Please Enter User Full Name';
		}
		if(empty($username)){
		    $valid    = 0;
		    $errors[] = 'Please Enter Username';
		}
		if(empty($email)){
	      	$valid    = 0;
	      	$errors[] = 'Please Enter Email';
		}
		if(empty($password)){
	      	$valid    = 0;
	      	$errors[] = 'Please Enter Password';
		}else if(!empty($password)){
	        if(strlen($password) < 4){
		          $valid    = 0;
		          $errors[] = "Password must be atleast 4 characters";
		    }
		}
		if(empty($verify_password)){
	        $valid    = 0;
	        $errors[] = 'Please Enter Verify Password';
		}
		if($password != $verify_password){
	        $valid    = 0;
	        $errors[] = 'Password and Verify Password are not same';
		}

		//check if fields empty - code ends

		//check User Photo - code starts
	  	$user_photo     = $_FILES['profile_image']['name'];
	  	$user_photo_tmp = $_FILES['profile_image']['tmp_name'];

	  	if($user_photo!='') {
	    	$user_photo_ext = pathinfo( $user_photo, PATHINFO_EXTENSION );
	    	$file_name = basename( $user_photo, '.' . $user_photo_ext );
	    	if( $user_photo_ext!='jpg' && $user_photo_ext!='png' && $user_photo_ext!='jpeg' && $user_photo_ext!='gif' ) {
	      	$valid = 0;
	      	$errors[]= 'You must have to upload jpg, jpeg, gif or png file<br>';
	    }
	  }
	  //check User Photo - code ends

	  //If everthing is OK - code starts
  	  if($valid == 1) {

  	  	//Upload user Photo if available
    	if($user_photo!='') {
		    $user_photo_file = 'admin-photo-'.time().'.'.$user_photo_ext;
		    move_uploaded_file( $user_photo_tmp, '../storage/profile/'.$user_photo_file );
		}else{
			$user_photo_file = "default.png";
		}

		//insert the data
		$insert = $conn->prepare("INSERT INTO users (user_full_name, email, user_name, user_password, user_photo, user_status, user_date_created ) VALUES(?,?,?,?,?,?,?)");

		$insert->execute(array($user_full_name, $email, $username, $password_hash, $user_photo_file, $status, $date_created));

		//insert the data - code ends
		$_SESSION['success'] = 'User has been added successfully!';
	    header('location: users.php');
	    exit(0);
  	  }
	}
 ?>
<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3"><strong>Add</strong> User</h1>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-12 col-lg-4 d-flex">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title mb-0">Public info</h5>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">

									<div class="mb-3">
										<label class="form-label" for="inputUsername">User Full Name</label>
										<input type="text" class="form-control" id="inputUsername"
											placeholder="Enter User Full Name" name="user_full_name">
									</div>
									<div class="mb-3">
										<label class="form-label" for="inputUsername">Username</label>
										<input type="text" class="form-control" id="inputUsername"
											placeholder="Enter Username" name="username">
									</div>
									<div class="mb-3">
										<label class="form-label" for="inputEmail">Email</label>
										<input type="email" class="form-control" id="inputEmail"
											placeholder="Enter Email" name="email">
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4 d-flex">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title mb-0">Password & Status</h5>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label" for="inputPasswordNew">Password</label>
										<input type="password" class="form-control" id="inputPasswordNew"
											placeholder="Enter password" name="password">
									</div>
									<div class="mb-3">
										<label class="form-label" for="inputPasswordNew2">Verify password</label>
										<input type="password" class="form-control" id="inputPasswordNew2"
											placeholder="Enter Verify password" name="verify_password">
									</div>
									<div class="mt-4">
										<label for="flexSwitchCheckChecked">Enable / Disable</label>
										<div class="form-check form-switch mt-2">
											<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
												checked="" name="status">
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4 d-flex">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title mb-0">Profile Image</h5>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="text-center">
										<img alt="Profile Image" src="../assets/img/avatars/avatar.jpg"
											class="rounded-circle img-responsive mt-2" width="100" height="100"
											id="profileImg">
										<div class="mt-2">
											<button type="button" class="btn btn-primary">Choose Image
												<input type="file" class="file-upload" value="Upload"
													name="profile_image" onchange="previewFile(this);" accept="image/*">
											</button>
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