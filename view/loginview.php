
	<?php
	require_once('../controller/usercontroller.php');

	$user = new usercontroller();
	$m = $user->login();
	$err =$user->Register();
// 	session_start();
// var_dump($_SESSION);

	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy4Ck1C8wEg8jMz1g1dLd89LSZ5EniFJ1" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-UoMbP1tFEGg5Vo7QqD6DZNPxja06NrUfaFmPYHoXrY1zqMUj5DAFgp7oXyJme5Fg" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy4Ck1C8wEg8jMz1g1dLd89LSZ5EniFJ1" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../assets/css/login.css">
		<title>Document</title>
	</head>
	<body>

	<div class="container" id="container">
	<div class="form-container sign-up-container">
    <form action="" method="post" id="signupForm">
        <?php if (!empty($err)) : ?>
            <?php echo $err; ?>
        <?php endif; ?>

        <h1>Create Account</h1>

        <span>or use your email for registration</span>
        <input type="text" name="prenom" id="validateFirstNameInput" placeholder="First Name" />
        <small></small>
        <input type="text" name="nom" id="validateLastNameInput" placeholder="Last Name" />
        <small></small>
        <input type="email" name="email" id="validateEmailInput" placeholder="Email" />
        <small></small>
        <input type="password" name="pass" id="validatePasswordInput" placeholder="Password" />
        <small></small>
        <button type="submit" name="submit">Sign Up</button>
    </form>
</div>

		<div class="form-container sign-in-container">
	
								
								<form action="" method="post">
							<?php if (!empty($m)) : ?>
								
										<?php echo $m; ?>
								
								<?php endif; ?>
		
				<h1>Sign in</h1>
				
				<span>or use your account</span>
				<input type="email" placeholder="Email"name="email"  />
				<input type="password" placeholder="Password" name="pass" />
			
				<button type="submit"name="submit_login">Sign In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button  class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>


		
	<script src="../assets/js/login.js"></script>
	</body>
	</html>