<?php 
date_default_timezone_set("africa/accra");  

function sanitize_login($text){
  	 $text = strtoupper($text);

  	 return $text;
  }

	session_start();
	include 'include/connection.php';

	$error = FALSE;

	if (isset($_POST['registerbutton'])) {

		$username = sanitize_login($_POST['username']);
		$password = $_POST['password'];
		$name = $_POST['staff_name'];
		$privilege = $_POST['privilege'];
		$date = date("l, d F Y h:i:s A");

		// form validation here
		if (empty($username)) {
			$error = TRUE;
			$username = 'this field is required';
		}else{
			$query = "SELECT * FROM staff WHERE username = '$username'";
			$result=$connection->query($query);
			// checking if username already exist
			$check = $result->fetch_array();
			if ($result->num_rows == 1) {
				$error = TRUE;
				$username_error = 'user already exist in our database';
			}
		}

		if(!$error){
			$insert = "INSERT INTO staff(username, password, staff_name, date_registered, p_id)
			VALUES('$username', '$password', '$name', '$date', '$privilege')";
			$result=$connection->query($insert);

			if ($result) {
				$success = "Staff registration success";
			}
		}	
	}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Registration page</title>
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
					<h2 style="padding: -20px;" class="heading-section">STAFF REGISTRATION</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
					<a style="margin-left: 100px;" width="10%" href="view-registered-staff.php" class="btn btn-primary">Staff List</a><br><br>
		      	<div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/gkgcm-crest.png);"></div>
		      	<h3 class="text-center mb-0">Welcome</h3>
		      	<?php if(isset($success)) { echo '<p class="text-center"><span class="text-info">'.$success.'</span></p>'; } else{ echo '<p class="text-center"><span class="text-info">Register New staff</span></p>'; }?>
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input type="text" class="form-control" placeholder="<?php if (!empty($username_error)) {
		      				echo $username_error;
		      			}else{ echo 'username: eg STAFF01'; } ?>" name="username">
		      		</div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="password" class="form-control" placeholder="Password" name="password" required>
	            </div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-pencil"></span></div>
	              <input type="text" class="form-control" placeholder="Fullname" name="staff_name" required>
	            </div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-id-badge"></span></div>
	            	<select name="privilege" id="" class="form-control" required>
	              <option style="color: black;" value="">--select your privilege--</option>

	              <?php 
	              	$sql = "SELECT * FROM privilege";
	              	$result = $connection->query($sql);
	              	while ($data = $result->fetch_array()) {
	              		$privilege = $data['privilege'];
	              		$privilege_id = $data['privilege_id'];
	                  echo '<option style="color: black;" value="'.$privilege_id.'">'.$privilege.'</option>';
	              	}
	              ?>
	              </select>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="registerbutton" class="btn form-control btn-primary rounded submit px-3">Register</button><br><br>
	            	<a style="margin-left: 120px;" width="10%" href="index.php" class="btn btn-primary">Back</a>
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

