<?php  include('config.php'); ?>
<?php  include('includes/registration_login.php'); ?>
<?php include('includes/head_section.php'); ?>

<title>BlogSpot | Sign up </title>
</head>
<body>
<div class="container">
	<!-- Navbar -->
		<?php include( ROOT_PATH . '/includes/navbar.php'); ?>
	<!-- // Navbar -->

	<div style="width: 40%; margin: 20px auto;">
		<form method="post" action="register.php" >
			<h2>Register on BlogSpot</h2>
			<?php include(ROOT_PATH . '/includes/errors.php') ?>
			<input  type="text" name="username" value="<?php echo $username; ?>"  placeholder="Username" style="width:100%;">
			<input type="email" name="email" value="<?php echo $email ?>" placeholder="Email" style="width:100%;">
			<input type="password" name="password_1" placeholder="Password" style="width:100%;">
			<input type="password" name="password_2" placeholder="Password confirmation" style="width:100%;">
			<button type="submit" class="btn btn-primary w-100" name="reg_user">Register</button>
			<p>
				Already a member? <a href="login.php">Sign in</a>
			</p>
		</form>
	</div>
</div>
<!-- // container -->
<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->