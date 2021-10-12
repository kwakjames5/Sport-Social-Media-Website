<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<nav class="navbar navbar-expand-md navbar-dark navbar-custom-color">
	<div class="container-fluid navbar-custom-color">
		<a class="navbar-brand brand-name" id="logo" href="index.php"><strong>Warriors Fans</strong></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  	<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav ml-auto">
		        <?php if ( !isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"] ) : ?>
		        	<li class="nav-item">
			          <a class="nav-link text-white" href="index.php">Home</a>
			        </li>
					<li class="nav-item">
				      <a class="nav-link text-white" href="login.php">Login</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link text-white" href="register.php">Register</a>
				    </li>
				<?php elseif($_SESSION["logged_in"] == true) : ?>
					<li class="nav-item">
				      <div class="nav-link text-white">Welcome <?php echo $_SESSION['username']; ?>!</div>
				    </li>
					<li class="nav-item">
			          <a class="nav-link text-white" href="index.php">Home</a>
			        </li>
					<li class="nav-item">
				      <a class="nav-link text-white" href="profile.php">Profile</a>
				    </li>
				    <li class="nav-item">
				      	<a class="nav-link text-white" href="settings.php">Settings</a>
				    </li>
				    <li class="nav-item">
				      	<a class="nav-link text-white" href="logout.php">Logout</a>
				    </li>
				<?php endif; ?>
		    </ul>
		</div>
	</div>
</nav>