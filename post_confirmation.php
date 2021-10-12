<?php

require 'config.php';

if ( !isset($_POST['title']) || empty($_POST['title'])
	|| !isset($_POST['post-content']) || empty($_POST['post-content'])) {
	$error = "Please include a title and/or post content.";
}
else {
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit();
	}

	$date = date("Y-m-d");

	$sql = "INSERT INTO posts(author_id, date, posttext, title, author_screenname) VALUES('" . $_SESSION["user_id"] . "','" . $date . "','" . $_POST["post-content"] . "','" . $_POST["title"] . "','" . $_SESSION["screenname"] . "');";

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
	<title>Post Confirm | Warriors Fans</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5">
		<div class="row justify-content-center">
			<h1 class="col-6 mt-4">Make a Post</h1>
		</div> 
	</div> 

	<div class="container">
		<div class="row mt-2 justify-content-center">
			<div class="col-6">
				<?php if ( isset($error) && !empty($error) ) : ?>
					<div class="text-danger"><?php echo $error; ?></div>
				<?php else : ?>
					<div class="text-success">Post has been made!</div>
				<?php endif; ?>
			</div> 
		</div> 

		<div class="row mt-3 justify-content-center">
			<div class="col-6">
				<a href="index.php" role="button" class="btn btn-primary">Home</a>
				<a href="profile.php" role="button" class="btn btn-danger">Profile</a>
			</div>
		</div>
	</div>
</body>
</html>