<div class="menu">
	<div class="card">
		<div class="card-header">
			<h2>Actions</h2>
		</div>
		<div class="card-content">
			<a href="<?php echo BASE_URL . 'admin/create_post.php' ?>">Create Posts</a>
			<a href="<?php echo BASE_URL . 'admin/posts.php' ?>">Manage Posts</a>
			<?php	if ( in_array($_SESSION['user']['role'], ["Admin"])) { ?>

			<a href="<?php echo BASE_URL . 'admin/users.php' ?>">Manage Users</a>
			<?php } ?>
		</div>
	</div>
</div>