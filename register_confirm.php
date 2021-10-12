<?php

require 'config.php';

if ( !isset($_POST['username']) || empty($_POST['username'])
	|| !isset($_POST['password']) || empty($_POST['password'])
	|| !isset($_POST['passwordconfirm']) || empty($_POST['passwordconfirm']) 
	|| ($_POST['passwordconfirm'] != $_POST['password'])
	|| !isset($_POST['email']) || empty($_POST['email'])) {
	$error = "Please fill out all required fields.";
}
else {
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit();
	}

	$sql_registered = "SELECT * FROM users
	WHERE username = '" . $_POST["username"] . "' OR email ='" . $_POST["email"] . "';";

	$results_registered = $mysqli->query($sql_registered);
	if(!$results_registered) {
		echo $mysqli->error;
		exit();
	}

	if($results_registered->num_rows > 0) {
		$error = "Username or email already exists.";
	}
	else {
		if(empty($_POST["screenname"])) {
			$_POST["screenname"] = $_POST["username"];
		}
		$password = hash("sha256", $_POST["password"]);

		$sql = "INSERT INTO users(username, screenname, password, email) VALUES('" . $_POST["username"] . "','" . $_POST["screenname"] . "','" . $password . "','" . $_POST["email"] . "');";

		$results = $mysqli->query($sql);

		if(!$results) {
			echo $mysqli->error;
			exit();
		}
	}
	
	$mysqli->close();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css"/>
	<title>Registration Confirm | Warriors Fans</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5">
		<div class="row justify-content-center">
			<h1 class="col-6 mt-4">User Registration</h1>
		</div> 
	</div> 

	<div class="container">
		<div class="row mt-2 justify-content-center">
			<div class="col-6">
				<?php if ( isset($error) && !empty($error) ) : ?>
					<div class="text-danger"><?php echo $error; ?></div>
				<?php else : ?>
					<div class="text-success"><?php echo $_POST['username']; ?> was successfully registered.</div>
				<?php endif; ?>
			</div> 
		</div> 

		<div class="row mt-3 justify-content-center">
			<div class="col-6">
				<a href="login.php" role="button" class="btn btn-primary">Login</a>
				<a href="login.php" role="button" class="btn btn-warning">Settings</a>
				<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-light">Back</a>
			</div>
		</div>
	</div>
</body>
</html>