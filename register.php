<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta charset="UTF-8">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<link rel="stylesheet" href="style.css"/>

<title>Register | Warriors Fans</title>
</head>
<body>
	<?php include 'nav.php'; ?>	
	<div class="container-fluid">

		<form action="register_confirm.php" method="POST">

			<div class="row">	
				<div class="col-6 offset-3" id="sign-up-form" class="login-page-forms">
					<h1 class="mt-5 mb-3">Register</h1>

					<h6 class="my-2">Username <span class="text-danger">*</span></h6>
					<div class="form-row">
						<div class="col-12">
							<label for="signup-username" class="sr-only">Username:</label>
							<input type="text" name="username" class="form-control" id="signup-username-id">
						</div>
					</div>

					<h6 class="my-2">Screenname </h6>
					<div class="form-row">
						<div class="col-12">
							<label for="signup-screenname" class="sr-only">Screenname:</label>
							<input type="text" name="screenname" class="form-control" id="signup-screenname-id">
						</div>
					</div>

					<h6 class="my-2">Email <span class="text-danger">*</span></h6>
					<div class="form-row">
						<div class="col-12">
							<label for="signup-email" class="sr-only">Email:</label>
							<input type="text" name="email" class="form-control" id="signup-email-id">
						</div>
					</div>

					<h6 class="my-2">Password <span class="text-danger">*</span></h6>
					<div class="form-row">
						<div class="col-12">
							<label for="signup-password" class="sr-only">Password:</label>
							<input type="text" name="password" class="form-control" id="signup-password-id">
						</div>
					</div>

					<h6 class="my-2">Confirm Password <span class="text-danger">*</span></h6>
					<div class="form-row">
						<div class="col-12">
							<label for="signup-password-confirm" class="sr-only">PasswordConfirm:</label>
							<input type="text" name="passwordconfirm" class="form-control" id="signup-password-confirm-id">
						</div>
					</div>
				  	
				  	<div class="mt-3 mb-5 col-12">
		                <button type="submit" class="btn btn-danger btn-block login-page-buttons">Create Account</button>
	                </div>
				</div>
			</div>
		</form>
	</div>
	<script>
		document.querySelector('form').onsubmit = function(){
			if ( document.querySelector('#signup-username-id').value.trim().length == 0 ) {
				document.querySelector('#signup-username-id').classList.add('is-invalid');
			} else {
				document.querySelector('#signup-username-id').classList.remove('is-invalid');
			}
			
			if ( document.querySelector('#signup-screenname-id').value.trim().length == 0 ) {
				document.querySelector('#signup-screenname-id').value = document.querySelector('#signup-username-id').value;
			}

			if ( document.querySelector('#signup-password-id').value.trim().length == 0 ) {
				document.querySelector('#signup-password-id').classList.add('is-invalid');
			} else {
				document.querySelector('#signup-password-id').classList.remove('is-invalid');
			}

			if ( document.querySelector('#signup-email-id').value.trim().length == 0 ) {
				document.querySelector('#signup-email-id').classList.add('is-invalid');
			} else {
				document.querySelector('#signup-email-id').classList.remove('is-invalid');
			}

			if ( document.querySelector('#signup-password-confirm-id').value.trim().length == 0 || 
				document.querySelector('#signup-password-id').value != document.querySelector('#signup-password-confirm-id').value) {
				document.querySelector('#signup-password-confirm-id').classList.add('is-invalid');
			} else {
				document.querySelector('#signup-password-confirm-id').classList.remove('is-invalid');
			}

			return ( !document.querySelectorAll('.is-invalid').length > 0 );
		}
	</script>
</body>
</html>