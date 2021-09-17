	<?php  include('config.php'); ?>
	<?php include('includes/head_section.php'); ?>
	<?php require_once('class/Users.php'); ?>
	<title>BlogSpot | Sign up </title>
	</head>
	<body>
		<!-- Navbar -->
		<?php include( ROOT_PATH . '/includes/navbar.php'); ?>
		<!-- // Navbar -->
		<?php include('includes/banner.php') ?>

		<div class="container col-12">
			<div class="register_div" >
			<form method="post" action="register.php" >
			<h2>Register on BlogSpot</h2>
			<?php include(ROOT_PATH . '/includes/errors.php') ?>
			
			<input  type="text" name="username" value="<?php echo $username; ?>"  placeholder="Username" style="width:100%;">
			<input type="email" name="email" value="<?php echo $email ?>" placeholder="Email" style="width:100%;">
			<div class="form-group">
			<div class="input-group">
			<input class="pass_field" class="form-control" type="password" name="password_1" placeholder="Password" 
			style="width:100%;">
			<img class="show_pass" src="./static/images/eye-fill.svg" alt="eye" style="position: absolute;right: 15px;top: 20px;">
			<input class="pass_field"  class="form-control" type="password" name="password_2" placeholder="Password confirmation" style="width:100%;">
			<img class="show_pass" src="./static/images/eye-fill.svg" alt="eye" style="position: absolute;right: 15px;top: 90px;">
			<button type="submit" class="btn btn-primary w-100" name="reg_user">Register</button>
			<p>	Already a member? <a href="login.php">Sign in</a>
			</p>
			</div>
			</form>
			</div>
		</div>
		<!-- // container -->
		<!-- Footer -->
		<?php include( ROOT_PATH . '/includes/footer.php'); ?>
		<!-- // Footer -->
		</html>