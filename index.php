<?php
	require 'config.php';

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if( $mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit();
	}

	$mysqli->set_charset('utf8');

	$sql = "SELECT * FROM `posts` WHERE 1
	ORDER BY posts_id DESC";

	$results = $mysqli->query($sql);

	if(!$results) {
		echo $mysqli->error;
		exit();
	}

	$mysqli->close();
?>

<!-- printf("Screenname: %s, Profile Pic ID: %s, Banner ID: %d, Theme ID: %d, Star ID: %s <br />", 
		                $_SESSION["screenname"], 
		                $_SESSION["profilepic_id"], 
		                $_SESSION["banner_id"],
		                $_SESSION["theme_id"],
		            	$_SESSION["favorite_star_id"],);  -->

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta charset="UTF-8">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<style>
	th {
		padding: 6000px;
	}

	/* iPad settings start */
	@media (min-width: 768px) {
		th {
			padding-right: 550px;
		}
	}

	/* Desktop settings start */
	@media (min-width: 992px) {
		th {
			padding-right: 750px;
		}
	}
</style>
<link rel="stylesheet" href="style.css"/>

<title>Home | Warriors Fans</title>
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col" id="main-header">
				<div class="header-bg">
					<p class="header-name"><strong>Golden State Warriors Fans</strong></p>
					<p id="welcome-text"><strong>Welcome Dub Nation!</strong></p>
				</div>
			</div>
		</div>
		
		<div class="row border rounded" id="most-recent-posts">
			<div class="col-12">
				<?php if ( !isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"] ) : ?>
		        	<div class="my-3 ml-3"><h2>Forum</h2></div>
				<?php elseif($_SESSION["logged_in"] == true) : ?>
					<div class="my-3 ml-3"><h2>Forum</h2></div>
					<div class="my-3 ml-3"><a href="post_form.php"><button>Make a Post</button></a></div>
				<?php endif; ?>
			</div>

			<div class="col-12">
				<table class="table mt-2 ml-2">
					<thead>
						<tr>
							<th>Title</th>
							<th>Author</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
					<?php while($row = $results->fetch_assoc()) :?>
						<tr>
							<td>
								<a href="post_details.php?posts_id=<?php echo $row['posts_id']; ?>">
									<?php echo $row['title']; ?>
								</a>
							</td>
							<td><?php echo $row['author_screenname']; ?></td>
							<td><?php echo $row['date']; ?></td>
						</tr>
					<?php endwhile;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>

<!-- <table class="table mt-2 ml-2">
	<thead>
		<tr>
			<th>Title</th>
			<th>Author</th>
			<th>Date</th>
		</tr>
	</thead>
	<tbody>
	<?php while($row = $results->fetch_assoc()) :?>
		<tr>
			<td>
				<a href="post_details.php?posts_id=<?php echo $row['posts_id']; ?>">
					<?php echo $row['title']; ?>
				</a>
			</td>
			<td><?php echo $row['author_screenname']; ?></td>
			<td><?php echo $row['date']; ?></td>
		</tr>
	<?php endwhile;?>
	</tbody>
</table> -->