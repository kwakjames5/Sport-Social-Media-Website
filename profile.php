<?php
	require 'config.php';

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit();
	}

	$sql_curr_user = "SELECT * FROM users
	WHERE username = '" . $_SESSION["username"] . "';";
	$sql_posts = "SELECT * FROM posts
	WHERE author_id = '" . $_SESSION["user_id"] . "'";
	$sql_posts = $sql_posts . " ORDER BY posts_id DESC;";

	$results = $mysqli->query($sql_curr_user);
	$posts_results = $mysqli->query($sql_posts);

	$screenname = NULL;
	$profilepic_id = NULL;
	$banner_id = NULL;
	$fan_since_id = NULL;
	$favorite_star_id = NULL;
	$description = NULL;

	if ($results->num_rows > 0) {
        while($row = $results->fetch_assoc()) {
           	$screenname = $row["screenname"]; 
            $profilepic_id = $row["profilepic_id"]; 
            $banner_id = $row["banner_id"]; 
            $fan_since_id = $row["fan_since_id"]; 
            $favorite_star_id = $row["favorite_star_id"];
            $description = $row["description"];
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta charset="UTF-8">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<link rel="stylesheet" href="style.css"/>

<title>Profile | Warriors Fans</title>
</head>
<body>
	<?php include 'nav.php'; ?>

	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col" id="profile-header<?php echo $banner_id ?>">
			</div>
		</div>
		<div class="row my-3">
			<div class="col-3">
				<div class="border rounded text-center">
					<img src="images/profile-pics/<?php echo $profilepic_id ?>.png" class="img-fluid">
				</div>
			</div>
			<div class="col-9"> <!-- col-lg-9 -->
				<div class="border rounded" id="profile-description">
					<h2 class="ml-4 mt-3"><?php echo $screenname; ?></h2>
					<div class="ml-4 mt-3"><strong>Favorite Warrior: <?php echo $favorite_star_id; ?></strong></div>
					<div class="ml-4 mt-1"><strong>Dub Nation Member Since: <?php echo $fan_since_id; ?></strong></div>
					<h3 class="ml-4 mt-3">About Me</h3>
					<p class="ml-4 mt-3"><?php echo $description; ?></p>
				</div>
			</div>
		</div>
		<div class="row border rounded" id="most-recent-posts">
			<div class="col-12 mt-4 ml-3 mb-2">
				<h2 id="recent-posts-header">Your Posts</h2>
			</div>

			<div class="col-12">
				<table class="table mt-2 ml-2">
					<thead>
						<tr>
							<th>Title</th>
							<th>Author</th>
							<th>Date</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php while($row = $posts_results->fetch_assoc()) :?>
						<tr>
							<td>
								<a href="post_details.php?posts_id=<?php echo $row['posts_id']; ?>">
									<?php echo $row['title']; ?>
								</a>
							</td>
							<td><?php echo $row['author_screenname']; ?></td>
							<td><?php echo $row['date']; ?></td>
							<td>
								<a onclick="return confirm('You are about to delete this post.');" href="delete_post.php?posts_id=<?php echo $row['posts_id']; ?>" class="btn btn-outline-danger delete-btn">
									Delete Post
								</a>
							</td>
						</tr>
					<?php endwhile;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>