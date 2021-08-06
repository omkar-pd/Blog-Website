<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/pub_functions.php') ?>

<?php 
	if (isset($_GET['title'])) {
		$posts = getPost($_GET['title']);
	}
	
?>
<?php require_once('includes/head_section.php') ?>

 <!-- $posts = getPublishedPosts();   -->
<?php 
	if (isset($_GET['title'])) {
		$post = getPost($_GET['title']);
	} 
	
?>
	<title>BlogSpot|  </title>
</head>
<?php require_once('includes/navbar.php') ?>
<?php foreach ($posts as $post): ?>
	<div class="show-post container-fluid w-50 ml-auto mr-auto mt-3" style="margin-left: 0px;">
			<?php $u_id=$post['user_id'];
		$name=getName($u_id); ?>
	 <?php
		while ($row = $name->fetch_assoc()) { ?>
  	     <p class="lead d-flex justify-content-end">Author Name: <?php echo $row['username']." " ?> </p> <?php
	} ?>
				<h1 class="text-center pt-2"><?php echo $post['title'] ?></h1>
				<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="img-fluid pt-2" alt="image">
                <p class=" text-center pt-5"><?php echo $post['content']?></p>                        
		<div class="d-flex justify-content-between pt-2"><span class="lead">Created At: <?php echo $post['created_at'] ?></span><span class="lead">Updated At: <?php echo $post['updated_at'] ?></span> </div>
				</div>
			</div>
		 
	</div>
<?php endforeach ?>