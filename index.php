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
		<h2 class="content-title">Articles</h2>
			<hr>
		<div class="content row flex-row  mt-2">
			

<?php foreach ($posts as $post): ?>
	<div class=" post col-lg-6 pt-2" >
		<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="Image">
		
			<div class="post_info">
				<a href="show_post.php?id=<?php echo $post['id']; ?>">  <h1> <?php echo $post['title']; ?></h1></a>
				<div class="d-flex justify-content-between m-1">
					<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
					<a href="show_post.php?id=<?php echo $post['id']; ?>"> <span class="read_more">Read more...</span> </a>
                    </div>
				</div>
			</div>
			
		
<?php endforeach ?>
	</div>
	<?php  $prev = $page - 1;
  		$next = $page + 1; 
 	 ?>
  <nav aria-label="Page navigation example mt-5">
            <ul class="pagination justify-content-center mt-4">
                <li class="page-item <?php if($page <=1){ echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page < 1){ echo '#'; } else { echo "index.php?page=".$prev; } ?>">Previous</a>
                </li>

                <?php for($i = 1; $i <= $total_pages; $i++ ): ?>
                <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                    <a class="page-link" href="index.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                </li>
                <?php endfor; ?>

                <li class="page-item <?php if($page >= $total_pages) { echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page >= $total_pages){ echo '#'; } else {echo "index.php?page=".$next; } ?>">Next</a>
                </li>
            </ul>
        </nav>
		</div>
		<!-- // Page content -->

		<!-- footer -->
		<?php include('includes/footer.php') ?>