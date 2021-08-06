<?php if (isset($_SESSION['user']['username'])) { ?>
	<div class="logged_in_info">
		<span class="p-2">Welcome <?php echo $_SESSION['user']['username'] ?></span>
		|
		<span><a href="logout.php">Logout</a></span>
	</div>
<?php }else{ ?>
	<div class="banner ">
		<div class="welcome_msg">
			<h1 class="text-light">Welcome to the BlogSpot</h1>
			<p class="text-light"> 
			    One day your life <br> 
			    will flash before your eyes. <br> 
			    Make sure it's worth watching. <br>
				
			</p>
			<a href="register.php" class="btn btn-primary">Join us!</a>
		</div>

		<div class="login_div">
			<form action="<?php echo BASE_URL . 'index.php'; ?>" method="post" >
				<h2 class="text-light">Login</h2>
				<div style="width: 60%; margin: 0px auto;">
					<?php include(ROOT_PATH . '/includes/errors.php') ?>
				</div>
				<input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
				<input type="password" name="password"  placeholder="Password"> 
				<button class="btn btn-primary" type="submit" name="login_btn">Sign in</button>
			</form>
		</div>
	</div>
<?php } ?>