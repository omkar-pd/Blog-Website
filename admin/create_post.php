	<?php  include('../config.php'); ?>
	<?php require_once(ROOT_PATH . '/admin/class/PostActions.php'); ?>
	<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
	<title>Admin | Create Post</title>
	</head>
	<?php 
	$postAction= new PostActions();
	if (isset($_POST['create_post'])) { 
    $postAction->createPost(); 
	}
	if (isset($_GET['edit-post'])) {
	$isEditingPost = true;
	$post_id = $_GET['edit-post'];
	$postAction->editPost($post_id);
	}
	if (isset($_POST['update_post'])) {
	$postAction->updatePost($_POST);
	}
	if (isset($_GET['delete-post'])) {
	$post_id = $_GET['delete-post'];
	$postAction->deletePost($post_id);
	}
	?>
	<body>
	<!-- admin navbar -->
	<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>

	<div class="container content">
		<!-- Left side menu -->
	<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>

		<!-- Middle form - to create and edit  -->
	<div class="action create-post-div">
		<h1 class="page-title">Create/Edit Post</h1>
		<form method="post" enctype="multipart/form-data" action="<?php echo BASE_URL . 'admin/create_post.php'; ?>" >
		<!-- validation errors for the form -->
		<?php include(ROOT_PATH . '/includes/errors.php') ?>
		<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
		<input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title">
		<label style="float: left; margin: 5px auto 5px;">Featured image</label>
		<input type="file" name="featured_image">
		<textarea name="body" id="body" cols="30" rows="10"><?php echo $body; ?></textarea>
		<?php if ($isEditingPost === true): ?> 
		<button type="submit" class="btn" name="update_post">UPDATE</button>
		<?php else: ?>
		<button type="submit" class="btn" name="create_post">Save Post</button>
		<?php endif ?>
		</form>
		</div>
	</div>
	</body>
	</html>

	<script>
	CKEDITOR.replace('body');
	</script>