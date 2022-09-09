<?php 
  function sanitize_login($text){
  	 $text = strtoupper($text);

  	 return $text;
  }

	session_start();
	include 'include/connection.php';

	if(!isset($_SESSION['staff_id'])){
		$error = FALSE;
	if (isset($_POST['loginbutton'])) {
		$username = sanitize_login($_POST['username']);
		$password = $_POST['password'];

		// quering data from the database to login
		$query = "SELECT staff_id, username, password, staff_name, privilege, privilege_id, p_id FROM staff inner join privilege WHERE staff.p_id = privilege.privilege_id AND username = '$username' AND password = '$password' LIMIT 1";
		$result = $connection->query($query);
		$userexist = $result->num_rows;
		if ($userexist == 1) {
			$data = $result->fetch_array();
			$staff_id = $data['staff_id'];
			$staff_name = $data['staff_name'];
			$privilege = $data['privilege'];
			$privilege_id = $data['privilege_id'];
			$p_id = $data['p_id'];

			$_SESSION['staff_id'] = $staff_id;
			$_SESSION['staff_name'] = $staff_name;
			$_SESSION['privilege'] = $privilege;
			$_SESSION['privilege_id'] = $privilege_id;
			$_SESSION['p_id'] = $p_id;

			if ($result) {
				header('Location: index.php');
			}	
			}else{
				$loginfailed='Username Or Password Is Incorrect';
			}
		}
	}else{
		header('Location: index.php');
	}



?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Login page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="fa-icon/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">STAFF LOGIN</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
		      	<div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/gkgcm-crest.png);"></div>
		      	<h3 class="text-center mb-0">Welcome</h3>
		      	<?php if(isset($loginfailed)){ echo '<p class="text-center"><span class="text-danger">'.$loginfailed.'</span></p>'; } else{ echo '<p class="text-center">Enter Your Username & Password to login</p>'; } ?>
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input type="text" class="form-control" placeholder="username" name="username" required>
		      		</div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="password" class="form-control" placeholder="Password" name="password" required>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="loginbutton" class="btn form-control btn-primary rounded submit px-3">Get Started</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
	</body>
</html>

