<?php
require 'config.php';

if( !isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"] ) {
	if ( isset($_POST['username']) && isset($_POST['password']) ) {
		if ( empty($_POST['username']) || empty($_POST['password']) ) {
			$error = "Please enter username and password.";
		}
		else {
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

			if($mysqli->connect_errno) {
				echo $mysqli->connect_error;
				exit();
			}
			$password = hash("sha256", $_POST["password"]);

			$sql = "SELECT * FROM users
						WHERE username = '" . $_POST['username'] . "' AND password = '" . $password . "';";
			
			$results = $mysqli->query($sql);

			if(!$results) {
				echo $mysqli->error;
				exit();
			}

			if($results->num_rows > 0) {
				$_SESSION["username"] = $_POST["username"];
				$_SESSION["logged_in"] = true;

				if ($results->num_rows > 0) {
		            while($row = $results->fetch_assoc()) {
		            	$_SESSION["screenname"] = $row["screenname"]; 
		            	$_SESSION["profilepic_id"] = $row["profilepic_id"]; 
		            	$_SESSION["banner_id"] = $row["banner_id"]; 
		            	$_SESSION["theme_id"] = $row["theme_id"]; 
		            	$_SESSION["favorite_star_id"] = $row["favorite_star_id"];
		            	$_SESSION["user_id"] = $row["id"];   

		            	// printf("Screenname: %s, Profile Pic ID: %d, Banner ID: %d, Theme ID: %d, Star ID: %d <br />", 
		             //    $_SESSION["screenname"], 
		             //    $_SESSION["profilepic_id"], 
		             //    $_SESSION["banner_id"],
		             //    $_SESSION["theme_id"],
		            	// $_SESSION["favorite_star_id"],);           
		            }
		        }
				header("Location: index.php");
			}
			else {
				$error = "Invalid username or password.";
			}
		} 
	}
}
else {
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css"/>
	<title>Login | Warriors Fans</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-5 mb-3 offset-md-2">Login</h1>
		</div>
	</div>

	<div class="container">
		<form action="login.php" method="POST">
			<div class="row mb-3">
				<div class="font-italic text-danger col-sm-9 ml-sm-auto">
					<?php
						if ( isset($error) && !empty($error) ) {
							echo $error;
						}
					?>
				</div>
			</div>
			<div class="form-group row">
				<label for="username-id" class="col-sm-3 col-form-label text-sm-right">Username:</label>
				<div class="col-sm-9 col-md-5">
					<input type="text" class="form-control" id="username-id" name="username">
				</div>
			</div>
			<div class="form-group row">
				<label for="password-id" class="col-sm-3 col-form-label text-sm-right">Password:</label>
				<div class="col-sm-9 col-md-5">
					<input type="password" class="form-control" id="password-id" name="password">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-2">
					<button type="submit" class="btn btn-warning">Login</button>
					<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-light">Cancel</a>
				</div>
			</div>
		</form>
		<div class="row">
			<div class="col-sm-9 ml-auto">
				<a href="register.php">Create an account</a>
			</div>
		</div>
	</div>
</body>
</html>