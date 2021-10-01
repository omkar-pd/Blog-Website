	<?php include('../config.php'); ?>
	<?php include('./includes/validate.php') ?>
	<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
	<?php require_once('../includes/autoloader.php'); ?>
	<title>Manage Posts</title>
	</head>
	<?php 
	$adminPosts = new AdminPosts();
	$posts=$adminPosts -> getAllPosts(); 
	?>

	<body>
	  <!-- admin navbar -->
	  <?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
	  <?php include(ROOT_PATH . '/includes/banner.php') ?>
	  <div class="container content row ml-auto mr-auto">
	    <?php include(ROOT_PATH . '/admin/includes/menu.php') ?>
	    <div class="table-div col-lg-10 col-md-12">
	      <?php include(ROOT_PATH . '/admin/includes/messages.php') ?>
	      <?php if (empty($posts)): ?>
	      <h1 style="text-align: center; margin-top: 20px;">No posts in the database.</h1>
	      <?php else: ?>
	      <table class="table" style="width: 100%;">
	        <thead>
	          <th>No</th>
	          <th>Author</th>
	          <th>Title</th>
	          <th><small>Edit</small></th>
	          <th><small>Delete</small></th>
	        </thead>
	        <tbody>
	          <?php foreach ($posts as $key => $post): ?>
	          <tr>
	            <td><?php echo $key + 1; ?></td>
	            <td><a href="user_profile.php?userid=<?php echo $post['user_id'] ?>"> <?php echo $post['author']; ?> </a>
	            </td>
	            <td>
	              <a target="_blank" href="../show_post.php?id=<?php echo $post['id']; ?>">
	                <?php echo $post['title']; ?></a>
	            </td>
	            <td>
	              <a class="fa fa-pencil btn edit" href="create_post.php?edit-post=<?php echo $post['id'] ?>"></a>
	            </td>
	            <td>
	              <a class="fa fa-trash btn delete" href="create_post.php?delete-post=<?php echo $post['id'] ?>"></a>
	            </td>
	          </tr>
	          <?php endforeach ?>
	        </tbody>
	      </table>
	      <?php endif ?>
	      <?php 
	$prev = $page - 1;
	$next = $page + 1; 
	?>
	      <nav class="mt-5">
	        <ul class="pagination justify-content-center mt-4">
	          <li class="page-item <?php if($page <=1){ echo 'disabled'; } ?>">
	            <a class="page-link"
	              href="<?php if($page < 1){ echo '#'; } else { echo "posts.php?page=".$prev; } ?>">Previous</a>
	          </li>

	          <?php for($i = 1; $i <= $total_pages; $i++ ): ?>
	          <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
	            <a class="page-link" href="posts.php?page=<?= $i; ?>"> <?= $i; ?> </a>
	          </li>
	          <?php endfor; ?>
	          <li class="page-item <?php if($page >= $total_pages) { echo 'disabled'; } ?>">
	            <a class="page-link"
	              href="<?php if($page >= $total_pages){ echo '#'; } else {echo "posts.php?page=".$next; } ?>">Next</a>
	          </li>
	        </ul>
	      </nav>
	    </div>
	  </div>
	  </div>
	</body>

	</html>