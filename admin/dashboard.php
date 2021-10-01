	<?php  include('../config.php'); ?>
	<?php include('./includes/validate.php') ?>
	<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
	<title>Admin | Dashboard</title>
	</head>

	<body>
	  <?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>

	  <?php include(ROOT_PATH . '/includes/banner.php') ?>
	  <?php	if ( in_array($_SESSION['user']['role'], ["Admin"])) { 
	$_SESSION['message'] = "You are now logged in";
	?>
	  <div class="container dashboard">
	    <h1>Welcome</h1>
	    <div class="stats d-flex flex-md-row flex-column align-items-center justify-content-center mt-2">
	      <a href="users.php" class="first ">
	        <i class="bi bi-people"></i>
	        <span>Users</span>
	      </a>
	      <a href="posts.php">
	        <i class="bi bi-file-earmark-richtext-fill"></i>
	        <span>Posts</span>
	      </a>
	    </div>
	    <br><br><br>
	    <div class="buttons d-flex flex-md-row flex-column align-items-center justify-content-center">
	      <a href="users.php"><i class="bi bi-people"></i> Add Users</a>
	      <a href="posts.php"><i class="bi bi-file-earmark-richtext-fill"></i> Add Posts</a>
	    </div>
	  </div>
	  <?php	} ?>
	  <!-- If users role is author user wont see admin functions -->
	  <?php	if ( in_array($_SESSION['user']['role'], ["Author"])) { 
	$_SESSION['message'] = "You are now logged in";
	?>
	  <div class="container dashboard">
	    <h1>Welcome</h1>
	    <div class="justify-content-center">
	      <div class="buttons d-flex flex-row justify-content-center">
	        <a href="posts.php">Add/Manage Posts</a>
	      </div>
	    </div>
	    <?php	} ?>
	</body>

	</html>