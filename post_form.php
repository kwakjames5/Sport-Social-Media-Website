<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css"/>
	<title>Make a Post | Warriors Fans</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-5 mb-3 offset-md-2">Make a Post</h1>
		</div> 
	</div> 

	<div class="container">
		<form action="post_confirmation.php" method="POST">
			<div class="form-group row">
				<label for="title-id" class="col-sm-3 col-form-label text-sm-right">Title:</label>
				<div class="col-sm-9 col-md-4">
					<input type="text" class="form-control" id="title-id" name="title">
				</div>
			</div> 
			<div class="form-group row">
				<label for="post-content-id" class="col-sm-3 col-form-label text-sm-right">Post Content:</label>
				<div class="col-sm-9 col-md-6">
					<textarea id="post-content-id" name="post-content" rows="6" cols="47" required maxlength="450"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-2">
					<button type="submit" class="btn btn-primary">Post</button>
					<button type="reset" class="btn btn-light">Reset</button>
				</div>
			</div>
		</form>
	</div> 
	<script>
		document.querySelector('form').onsubmit = function(){
			if ( document.querySelector('#title-id').value.trim().length == 0 ) {
				document.querySelector('#title-id').classList.add('is-invalid');
			} else {
				document.querySelector('#title-id').classList.remove('is-invalid');
			}

			if ( document.querySelector('#post-content-id').value.trim().length == 0 ) {
				document.querySelector('#post-content-id').classList.add('is-invalid');
			} else {
				document.querySelector('#post-content-id').classList.remove('is-invalid');
			}

			return ( !document.querySelectorAll('.is-invalid').length > 0 );
		}
	</script>
</body>
</html>