<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/registration_login.php') ?>
<?php require_once('includes/head_section.php') ?>
<?php require_once( ROOT_PATH . '/includes/pub_functions.php') ?>

<!-- Retrieve all posts from database  -->
<?php $posts = getPublishedPosts(); ?>
	<title>BlogSpot | Home </title>
</head>
<body>
	<!-- container - wraps whole page -->
	<div class="container">
		<!-- navbar -->
		<?php include('includes/navbar.php') ?>
        <?php include('includes/banner.php') ?>
		<!-- Page content -->
		<h2 class="content-title">Recent Articles</h2>
			<hr>
		<div class="content row  ">
			
<!-- more content still to come here ... -->

<!-- Add this ... -->
<?php foreach ($posts as $post): ?>
	
	<div class=" post col-lg-6" style="margin-left: 0px;">
		<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="Image">
		
			<div class="post_info">
				
                 <a href="show_post.php?title=<?php echo $post['title']; ?>">  <h1> <?php echo $post['title']; ?></h1></a>
					<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
					<a href="show_post.php?title=<?php echo $post['title']; ?>"> <span class="read_more">Read more...</span> </a>
                    
				</div>
			</div>
			
		<? echo $post['content']; ?>
<?php endforeach ?>
	</div>

		</div>
		<!-- // Page content -->

		<!-- footer -->
		<?php include('includes/footer.php') ?>