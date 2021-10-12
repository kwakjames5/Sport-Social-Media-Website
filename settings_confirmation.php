<?php
require "config.php";

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset('utf8');
if( $mysqli->connect_errno) {
	echo $mysqli->connect_error;
	exit();
}

$banner = 1;
$profilepicture =  "klay-prof";
$favoritewarrior =  "Steph Curry";
$fansince =  2021;
$description = "";

if(isset($_POST["banner"]) && !empty($_POST["banner"])) {
	$banner = $_POST["banner"];
}
if(isset($_POST["profile-picture"]) && !empty($_POST["profile-picture"])) {
	$profilepicture = $_POST["profile-picture"];
}
if(isset($_POST["favorite-warrior"]) && !empty($_POST["favorite-warrior"])) {
	$favoritewarrior = $_POST["favorite-warrior"];
}
if(isset($_POST["fansince"]) && !empty($_POST["fansince"])) {
	$fansince = $_POST["fansince"];
}
if(isset($_POST["description"]) && !empty($_POST["description"])) {
	$description = $_POST["description"];
}

$sql = $mysqli->prepare("UPDATE users SET banner_id = ?, profilepic_id = ?, favorite_star_id = ? , fan_since_id = ?, description = ? WHERE username = ?");

$sql->bind_param("ississ", $banner, $profilepicture, $favoritewarrior, $fansince, $description, $_SESSION["username"]);

$executed_sql = $sql->execute();

if(!$executed_sql) {
	echo $mysqli->error;
	exit();
}

$sql->close();
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css"/>
	<title>Settings Updated | Warriors Fans</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container">
		<div class="row mt-5 justify-content-center">
			<h1 class="col-6 mt-4">Update Profile Settings</h1>
		</div> 
	</div> 
	<div class="container">
		<div class="row justify-content-center mt-2">
			<div class="col-6">
				<div class="text-success"><span class="font-italic">Settings were successfully edited.</span></div>
			</div> 
		</div> 
		<div class="row justify-content-center mt-3">
			<div class="col-6">
				<a href="settings.php" role="button" class="btn btn-primary">Back to Settings</a>
				<a href="profile.php" role="button" class="btn btn-primary">View Profile</a>
			</div> 
		</div> 
	</div> 
</body>
</html>