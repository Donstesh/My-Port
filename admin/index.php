<?php $page = "Log In"; ?>
<?php
  if(!session_start()){
      session_start();
  }
  session_regenerate_id(true);
  include("../config/database.php");
  include("../config/functions.php");

  if(isset($_SESSION['user'])) {
    header('location: dashboard.php');
    exit;
  } 
?>
<?php
if ( isset($_REQUEST['email']) && isset($_REQUEST['token']) )
{
    $valid = 1;
    // check if the token is correct and match with database.
    $statement = $conn->prepare("SELECT * FROM users WHERE email=? AND reg_token=?");
    $statement->execute(array($_REQUEST['email'],$_REQUEST['token']));
    if($statement->rowCount() != '1'){
        $valid = 0;
        $error = "The details are not matching";
    } 

    if($valid == 1)
    {
        $statement = $conn->prepare("UPDATE users SET reg_token=?, token_time=?, user_status = ? WHERE email=?");
        $run = $statement->execute(array('','','1',$_GET['email']));
        if($run){
          $success = "Your Email has been verified! You can now login"; 
        }else{
          $error = "There is some error!";
        }   
    }
}
?>
<?php 
      $statement = $conn->prepare("SELECT * FROM site_settings");
      $statement->execute();
      $result = $statement->fetch(PDO::FETCH_ASSOC);
      extract($result); 
?>
<?php
    if(isset($_POST['login'])) {
        $valid = 1;


        if(empty($_POST['username'])) {
          $errors[] = 'Username can not be empty</br>';
          $valid = 0;
        }
        if(empty($_POST['password'])) {
          $errors[] = 'Password can not be empty';
          $valid = 0;
        }
        if($valid == 1){

          $username         = clean($_POST['username']);
          $password         = clean($_POST['password']);
         
          $stmt = $conn->prepare("SELECT * FROM users WHERE BINARY user_name =? AND user_status=? LIMIT 1");
          $stmt->execute(array($username,1));
          $rows = $stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() == '1'){
            if(password_verify($password, $rows["user_password"])){

                $date = date('Y-m-d H:i:s');
                $stmt = $conn->prepare("UPDATE `users` SET `user_last_login`='$date' WHERE user_name =? LIMIT 1");
                $stmt->execute(array($username));
                unset($rows['user_password']);
                $_SESSION['success'] = "Welcome! - You are successfully logged in";
                $_SESSION['user'] = $rows;
                header('location: dashboard.php');
                exit(0);

            }else{
              $errors[] = "<strong>Error!</strong> Invalid user/password!";
            }
          }else{
            $errors[] = "<strong>Error!</strong> Invalid user/password!";
          }  
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Ready to use PHP Admin Panel for projects">
  <meta name="author" content="amiriqbalmcs">
  <meta name="keywords" content="bootstrap, bootstrap 5, admin, dashboard, php">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

  <title><?php if(isset($page)){echo clean($page) . " | Admin | Dashboard";}else{echo "Admin | Dashboard";} ?></title>

  <link href="../assets/css/app.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="../assets/plugins/toastr/toastr.min.css" rel="stylesheet">
</head>
<body>
  <main class="d-flex w-100">
    <div class="container d-flex flex-column">
      <div class="row vh-100">
        <div class="col-sm-10 col-md-8 col-lg-4 mx-auto d-table h-100">
          <div class="d-table-cell align-middle">
            <div class="text-center mt-4">
              <h1 class="h2">Welcome back</h1>
              <p class="lead">
                Sign in to your account to continue
              </p>
            </div>
            <div class="card">
              <div class="card-body">
                <?php if(isset($error)): ?>
                  <div class="alert alert-primary alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-message">
                      <?php echo $error; ?>
                    </div>
                  </div>
                <?php endif; ?>
                    
                <?php if(isset($success)): ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      <div class="alert-message">
                          <?php echo $success; ?>
                       </div>
                    </div>
                <?php endif; ?>
                <?php if(isset($_SESSION['success'])): ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-message">
                        <?php echo $_SESSION['success']; ?>
                     </div>
                  </div>
                <?php unset($_SESSION["success"]); ?>
                <?php endif; ?>
                <div class="m-sm-4">
                  <div class="text-center">
                    <img src="../storage/logo/<?php echo clean($site_logo); ?>" alt="Site Logo" class="img-fluid rounded-circle" width="132" height="132" />
                  </div>
                  <form action="" method="POST">
                    <div class="mb-3">
                      <label class="form-label">Username</label>
                      <input class="form-control form-control-lg" type="text" name="username" placeholder="Enter your username" value="<?php if(isset($username)){echo clean($username);} ?>"/>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Password</label>
                      <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
                    </div>
                    <div>
                    </div>
                    <div class="text-center mt-3">
                      <button type="submit" name="login" class="btn btn-lg btn-primary">Sign in</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/app.js"></script>
  <script src="../assets/plugins/toastr/toastr.min.js"></script>
  <?php include_once('../config/notifications.php'); ?>
</body>
</html>