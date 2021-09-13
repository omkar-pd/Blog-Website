<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/pub_functions.php') ?>

<?php require_once('includes/head_section.php') ?>
 <?php 
	if (isset($_GET['id'])) {
		$post = getPost($_GET['id']);
	} 
?> 
</head>
<body >
<div class="container col-12">
	<?php include('includes/navbar.php') ?>
	<?php include('includes/banner.php') ?>
<?php if (isset($_SESSION['user'])) { ?>
<?php foreach ( $post as $post): ?>
	<title>BlogSpot | <?php echo $post['title'] ?></title>
	<div class="show-post container-fluid w-50 ml-auto mr-auto mt-5 bg-light " >
			<?php $u_id=$post['user_id'];
			$name=getName($u_id); ?>
	<?php
		while ($row = $name->fetch_assoc()) { ?>
  	     <p class="d-flex justify-content-end">Author Name: <a href="./admin/user_profile.php?userid=<?php echo $post['user_id'] ?>"> <?php echo $row['username']." " ?> </a></p> <?php
	} ?>	
				<h1 class="text-center pt-2"><?php echo $post['title'] ?></h1>
				<div class="d-flex justify-content-center align-items-center">
				<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="img-fluid pt-2" alt="image">
				</div>
                <p class=" text-center pt-5"><?php  echo html_entity_decode($post['content'])?></p>                        
		<div class="d-flex justify-content-between pt-2"><span class="lead">Created At: <?php echo $post['created_at'] ?></span><span class="lead">Updated At: <?php echo $post['updated_at'] ?></span> </div>
				</div>
			</div>
	</div>
<?php endforeach ?>

<?php } else {?>
	<div class="d-flex flex-column justify-content-center align-items-center">
	<h2 class="p-5">Please login to read the blogs</h2>
	<button class="btn btn-info" style="max-width: 215px;"><a class="text-dark" href="./login.php">Click here to login</a></button>
	<button class="btn btn-info" style="max-width: 215px;"><a class="text-dark" href="./register.php">Click here to register</a></button>
	</div>
	<?php }?>
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
	</div>
	
</body>
