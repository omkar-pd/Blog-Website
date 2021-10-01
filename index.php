	<?php require_once ('config.php'); ?>
	<?php require_once('includes/head_section.php') ?>
	<?php require_once('includes/autoloader.php'); ?>

	<?php 
	$classPosts= new Posts();
	$posts = $classPosts->getPublishedPosts(); ?>
	<title>BlogSpot | Home </title>
	</head>

	<body>
	  <!-- container - wraps whole page -->
	  <div class="container col-12">
	    <!-- navbar -->
	    <?php include('includes/navbar.php') ?>
	    <?php include('includes/banner.php') ?>
	    <!-- Page content -->
	    <h2 class="content-title m-5">Articles</h2>
	    <hr>
	    <div class="content mt-2">

	      <!-- Print post details -->
	      <?php foreach ($posts as $post): ?>
	      <?php $u_id=$post['user_id'];
							$name=$classPosts->getName($u_id); 
				?>

	      <div class=" post p-3 pt-2">
	        <a href="show_post.php?id=<?php echo $post['id']; ?>">
	          <h3> <?php echo $post['title']; ?></h3>
	        </a>
	        <div class="d-flex justify-content-between align-items-center p-1" style="background-color: whitesmoke;">

	          <?php while ($row = $name->fetch_assoc()) { ?>
	          <span class="p-2">Author Name: <?php echo $row['username']." " ?> </span> <?php	} ?>
	          <span class="p-2"><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
	        </div>
	        <img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="Image">
	        <a href="show_post.php?id=<?php echo $post['id']; ?>"> <button class="continue-reading ">Continue
	            Reading</button> </a>
	      </div>
	      <?php endforeach ?>
	    </div>
	  </div>

	  <!-- Pagination -->
	  <?php 
	$prev = $page - 1;
	$next = $page + 1; 
	?>
	  <nav class="mt-5">
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
	  <!-- // Page content -->

	  <!-- footer -->
	  <?php include('includes/footer.php') ?>