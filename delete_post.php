<?php
require "config.php";

if(!isset($_GET['posts_id']) || empty($_GET['posts_id'])) {
	$error = "Invalid Post";
} else {
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$mysqli->set_charset('utf8');
	if( $mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit();
	}

	$sql = $mysqli->prepare("DELETE FROM posts WHERE posts_id = ?");

	$sql->bind_param("i", $_GET["posts_id"]);

	$executed_sql = $sql->execute();

	if(!$executed_sql) {
		echo $mysqli->error;
		exit();
	}

	$sql->close();
	$mysqli->close();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete Post | Warrior Fans</title>
	<link rel="stylesheet" href="style.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<?php include 'nav.php'; ?>

	<div class="container mt-5">
		<div class="row justify-content-center">
			<h1 class="col-6 my-4">Delete Post</h1>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-6 mt-2">
				<?php if(isset($error) && !empty($error)): ?>
					<div class="text-danger">
						<?php echo $error; ?>
					</div>
				<?php else: ?>
					<div class="text-success">
						Post was successfully deleted.
					</div>
				<?php endif; ?>
			</div> 
		</div> 

		<div class="row mt-3 justify-content-center">
			<div class="col-6">
				<a href="profile.php" role="button" class="btn btn-primary">Profile</a>
				<a href="index.php" role="button" class="btn btn-warning">Home</a>
			</div>
		</div>
	</div> 
</body>
</html>