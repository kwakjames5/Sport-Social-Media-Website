<?php
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css"/>
	<title>Logout | Warriors Fans</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container">
		<div class="row mt-5 justify-content-center">
			<h1 class="col-6 mt-5">Logout</h1>
		</div>
		<div class="row justify-content-center">
			<div class="col-6 mt-3">You are now logged out.</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-6 mt-3">You can go to <a href="index.php">home page</a> or <a href="login.php">log in</a> again.</div>
		</div>
	</div>
</body>
</html>