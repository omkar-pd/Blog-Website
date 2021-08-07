<div class="header">
	<div class="logo">
		<a href="<?php echo BASE_URL .'admin/dashboard.php' ?>">
			<h1>BlogSpot - Admin</h1>
		</a>
	</div>
	<div class="user-info">
		
		<span><?php $_SESSION['user'] ?> </span> &nbsp; &nbsp; <a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout-btn">logout</a>
	</div>
</div>