		<?php include('config.php'); ?>
		<?php include('includes/head_section.php'); ?>
		<?php include('includes/autoloader.php'); ?>
		<title>BlogSpot | Sign in </title>
		</head>
		<?php
		$users = new Users();
		if (isset($_POST['login_btn'])) {
			$users->login();
		}
		?>

		<body>

		  <div class="container col-12">
		    <!-- Navbar -->
		    <?php include(ROOT_PATH . '/includes/navbar.php'); ?>
		    <?php include('includes/banner.php') ?>
		    <div class="login_div">
		      <form method="post" action="login.php" class="d-flex flex-column align-items-center">
		        <h2>Login</h2>
		        <?php include(ROOT_PATH . '/includes/errors.php') ?>
		        <input type="text" name="username" value="<?php echo $username; ?>" value="" placeholder="Username"
		          style="width:88%;">
		        <div class="pass_field_div w-100">
		          <input class="pass_field" type="password" name="password" placeholder="Password" style="width:88%;">
		          <img src="./static/images/eye-fill.svg" class="show_pass" alt="Eye">
		        </div>
		        <button type="submit" class="btn btn-primary" name="login_btn">Login</button>
		        <p> Not yet a member? <a href="register.php">Sign up</a></p>
		        <p>Forgot Password? <a href="forgot_password.php">Forgot Password</a></p>
		      </form>
		    </div>
		  </div>

		  <!-- Footer -->
		  <?php include(ROOT_PATH . '/includes/footer.php'); ?>
		  <!-- // Footer -->