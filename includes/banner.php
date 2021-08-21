<?php if (isset($_SESSION['user']['username'])) { ?>
	<div class="logged_in_info">
		<span class="p-2">Welcome <?php echo $_SESSION['user']['username'] ?></span>
		|
		<span><a href="logout.php">Logout</a></span>
	</div>
<?php }else{ ?>
	<div class="row banner">
		<div class="col-lg-6 "><h1 class="text-light p-2 a">Welcome to the BlogSpot</h1>
		<h1 class="text-light p-2 a"> 
			    In A World <br> Where You Can Be Anything <br> Be Kind☺
		</h1>
			<a href="register.php" class="btn btn-primary ml-auto mr-auto p-2 mt-lg-5">Join us!</a>
	</div>
		<div class="col-lg-6 ">
			<form action="<?php echo BASE_URL . 'index.php'; ?>" method="post" >
			<h2 class="text-light">Login</h2>
				<div style="width: 60%; margin: 0px auto;">
					<?php include(ROOT_PATH . '/includes/errors.php') ?>
				</div>
				<input class="mt-lg-4" type="text" name="username" value="<?php echo $username; ?>" placeholder="Username" style="width: 83%;
">				<div class="pass_field_div w-100">
				<input class="mt-lg-4 pass_field" type="password" name="password"  placeholder="Password" style="width: 83%;"> 
				<img src="../blog/static/images/eye-fill.svg" class="show_pass" alt="Eye">
				</div>
				<button class="btn btn-primary ml-auto mr-auto mt-lg-5" type="submit" name="login_btn" >Sign in</button>
			</form>
		</div>
</div>
<?php } ?>