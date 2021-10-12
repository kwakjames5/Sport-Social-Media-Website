<?php

require 'config.php';

if ( !isset($_POST['comment']) || empty($_POST['comment'])) {
	$error = "Please write a comment first.";
}
else {
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit();
	}

	$date = date("Y-m-d");

	$sql = "INSERT INTO comments(post_id, username, commenttext, date) VALUES('" . $_GET['posts_id'] . "','" . $_SESSION["screenname"] . "','" . $_POST["comment"] . "','" . $date . "');";

	$results = $mysqli->query($sql);

	if(!$results) {
		echo $mysqli->error;
		exit();
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
	<title>Comment Confirm | Warriors Fans</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5">
		<div class="row justify-content-center">
			<h1 class="col-6 mt-4">Comment Confirmation</h1>
		</div> 
	</div> 

	<div class="container">
		<div class="row mt-2 justify-content-center">
			<div class="col-6">
				<?php if ( isset($error) && !empty($error) ) : ?>
					<div class="text-danger"><?php echo $error; ?></div>
				<?php else : ?>
					<div class="text-success">Comment has been made!</div>
				<?php endif; ?>
			</div> 
		</div> 

		<div class="row mt-3 justify-content-center">
			<div class="col-6">
				<a href="index.php" role="button" class="btn btn-primary">Home</a>
				<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-warning">Back to Post</a>
			</div>
		</div>
	</div>
</body>
</html>