<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css"/>

	<style>

	#description-id {
		width: 300px;
	}

	/* iPad settings start */
	@media (min-width: 768px) {
		#description-id {
			width: 270px;
		}
	}

	/* Desktop settings start */
	@media (min-width: 992px) {
		#description-id {
			width: 445px;
		}
	}
	</style>	

	<title>Settings | Warriors Fans</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-5 mb-3 offset-md-2">Profile Settings</h1>
			<div class="col-12 mb-3 offset-md-2 text-danger"><strong>* DISCLAIMER: Settings will be set to default after update if not set! *</strong></div>
		</div>
	</div> 

	<div class="container">
		<form action="settings_confirmation.php" method="POST">
			<div class="form-group row">
				<label for="banner-id" class="col-sm-3 col-form-label text-sm-right">Banner:</label>
				<div class="col-sm-9 col-md-5">
					<select name="banner" id="banner-id" class="form-control">
						<option value="" selected>Select / Default</option>
						<option value="1">Hampton 5</option>
						<option value="2">Team Victory</option>
						<option value="3">Rebound!</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="profile-picture-id" class="col-sm-3 col-form-label text-sm-right">Profile Picture:</label>
				<div class="col-sm-9 col-md-5">
					<select name="profile-picture" id="profile-picture-id" class="form-control">
						<option value="" selected>Select / Default</option>
						<option value="steph-prof">Steph Curry</option>
						<option value="klay-prof">Klay Thompson</option>
						<option value="draymond-prof">Draymond Green</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="favorite-warrior-id" class="col-sm-3 col-form-label text-sm-right">Favorite Warrior:</label>
				<div class="col-sm-9 col-md-5">
					<select name="favorite-warrior" id="favorite-warrior-id" class="form-control">
						<option value="" selected>Select / Default</option>
						<option value="Steph Curry">Steph Curry</option>
						<option value="Klay Thompson">Klay Thompson</option>
						<option value="Draymond Green">Draymond Green</option>
						<option value="Andre Iguodala">Andre Iguodala</option>
						<option value="Kevin Durant">Kevin Durant</option>
						<option value="Rick Barry">Rick Barry</option>
						<option value="Wilt Chamberlain">Wilt Chamberlain</option>
						<option value="Chris Mullin">Chris Mullin</option>
						<option value="Tim Hardaway">Tim Hardaway</option>
						<option value="Mitch Richmond">Mitch Richmond</option>
						<option value="Baron Davis">Baron Davis</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="theme-id" class="col-sm-3 col-form-label text-sm-right">Been a fan since:</label>
				<div class="col-sm-9 col-md-5">
					<input type="text" class="form-control" id="fan-since-id" name="fansince" value="2021">
				</div>
			</div>
			<div class="form-group row">
				<label for="description-id" class="col-sm-3 col-form-label text-sm-right">Description:</label>
				<div class="col-sm-9 col-md-6">
					<textarea id="description-id" name="description" required maxlength="400">This is about me!</textarea>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-2">
					<button type="submit" class="btn btn-primary">Update Settings</button>
					<button type="reset" class="btn btn-light">Reset</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>