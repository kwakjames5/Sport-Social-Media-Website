<?php
require "config.php";

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset('utf8');
if( $mysqli->connect_errno) {
	echo $mysqli->connect_error;
	exit();
}

$sql = $mysqli->prepare("SELECT * FROM posts
				WHERE posts_id = ?");

$sql->bind_param("i", $_GET['posts_id']);

$executed_sql = $sql->execute();

if(!$executed_sql) {
	echo $mysqli->error;
	exit();
} else {
	$row = ($sql->get_result())->fetch_assoc();
}

// printf("Posts ID: %d, Author ID: %d, Post Text: %s, Title: %s, Author Screenname: %s <br />", 
//     $_GET['posts_id'], 
//     $row["author_id"], 
//     $row["posttext"],
//     $row["title"],
// 	$row["author_screenname"]);   

$sql->close();
$mysqli->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css"/>

	<style>

	#comment-id {
		width: 300px;
	}

	/* iPad settings start */
	@media (min-width: 768px) {
		#comment-id {
			width: 270px;
		}
	}

	/* Desktop settings start */
	@media (min-width: 992px) {
		#comment-id {
			width: 445px;
		}
	}
	</style>

	<title>Post Details | Warrior Fans</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container">
		<div class="row">
			<h4 class="col-12 mt-5">Post Details</h4>
			<h1 class="col-12 mt-2"><?php echo $row['title']; ?></h1>
			<h5 class="col-12 mt-2">Posted by: <?php echo $row["author_screenname"]; ?></h5>
		</div>
	</div>

	<div class="container">
		<div class="row mt-4">
			<div class="col-12">
				<?php echo $row['posttext']; ?>
			</div>
		</div>
		<div class="row mt-4 mb-2">
			<?php if ( !isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"] ) : ?>
				
			<?php elseif($_SESSION["logged_in"] == true) : ?>
				<form class="col-12" action="comment_confirmation.php?posts_id=<?php echo $_GET['posts_id']; ?>" method="POST">
					<div class="form-group row">
						<div class="col-sm-9 col-md-6">
							<textarea id="comment-id" name="comment" required maxlength="400"></textarea>
						</div>
					</div>
					<div class="mt-3 mb-2 col-4 col-md-2">
		                <button type="submit" class="btn btn-success btn-block">Post Comment</button>
	                </div>
				</form>
			<?php endif; ?>
		</div> 
		<div class="row">
			<h5 class="col-12">
				Comments (Coming Soon!):
			</h5>
		</div>
		<!-- ADD A ROW PER COMMENT UNDER POST -->
	</div> 
</body>
</html>