<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css --> 
  <link rel="stylesheet" href="<?= 'css/style.css?key='.date('dymhis')?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
<?php 
	require ('connection.php');
	session_start();
?>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100 mx-auto">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
			
			<?php
			
      $db_con = getDB();
      unset($_SESSION['name']);
      unset($_SESSION['username']);
      // $_SESSION['name'] = $check[0]['name'];
			// 		$_SESSION['username']
			if(isset($_POST['login'])){
				
				$username = $_POST['username']; 
				$password = $_POST['password']; 
				
				$hash_password = trim(hash('sha256', $password)); 
				$status = 'D';
				$query = "SELECT * FROM `admin` WHERE username =:uname AND password =:pwd AND status != :status";
				$stmt = $db_con->prepare($query);
				$stmt->bindValue(':uname', $username); 
				$stmt->bindValue(':pwd', $hash_password); 
				$stmt->bindValue(':status', $status); 
				$stmt->execute();
				$count = $stmt->rowCount();
				// $stmt->debugDumpParams();  
				if ($count > 0){ 
					$check = $stmt->fetchAll(PDO::FETCH_ASSOC);
					//print_r($check);
					// $check[0]['name'];
					$_SESSION['name'] = $check[0]['admin_name'];
          $_SESSION['username'] = $check[0]['username'];
          // $_SESSION['logo'] = $check[0]['logo'];
					?> 
					<!--Success-->
					<div class="alert alert-fill-success" role="alert">
						<i class="mdi mdi-checkbox-marked-circle"></i>
						Login completed successfully, Please Wait...
					</div>
					<script>
						setTimeout(function(){ window.location = "pages/home.php"; }, 2000);
					</script>
					<?php 
				}else{
					?>
					<!--Error-->
					<div class="alert alert-fill-warning" role="alert">
						<i class="mdi mdi-alert-circle"></i>
						Oops, Invalid username or password, please try again.
					</div> 
					<?php
				}
			} 
			?>
				
              <form action="" method="POST">
                <div class="form-group">
				<span class="lead text-primary font-weight-bold" >Admin</span><br>
               <span class="text-capitalize text-primary font-weight-bold">   </span>
			   <hr>
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="mdi mdi-account-circle"></i></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="*********" name="password">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="mdi mdi-lock"></i></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" value="Login" name="login" class="btn btn-primary submit-btn btn-block"/>
                </div>
                <div class="form-group d-flex justify-content-between">
                  <!--<button class="btn btn-outline-success  btn-block" onclick="showSwal('basic')">Forget password!</button>-->
                      </div>
				</form>
            </div>
            <ul class="auth-footer">
              <li><a href="#">Conditions</a></li>
              <li><a href="#">Help</a></li>
              <li><a href="#">Terms</a></li>
            </ul>
            <p class="footer-text text-center">copyright © 2018 Urbanui. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/template.js"></script>
  <script src="js/alerts.js"></script>
  <script src="js/avgrund.js"></script>
  <!-- endinject -->
</body> 
</html>
