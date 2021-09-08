    <?php  include('../config.php'); ?>
	<?php include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
	<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
    <title>Admin | Dashboard</title>
    <?php 
    $userid=$_GET['userid'];
    $userinfo=getUserInfo($userid);
    $userposts=getUserPosts($userid);
    ?>
</head>
<body>
    <?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
    <div class="profile-wrapper">
<?php 
foreach($userinfo as $user){?>
<img src="<?php echo BASE_URL . '/static/profile/' . $user['profileimage']; ?>" class="profile-image" alt="Image">
<div class="profile-name">
    <p><?php echo $user['firstName'] ?></p>
    <p><?php echo $user['lastName'] ?></p>
</div>
<p><?php echo $user['mobno'] ?></p>
<p><?php echo $user['address'] ?></p>
<p> <?php echo $user['desc'] ?></p>
<?php }?>
</div>
<h1>User Posts</h1>
<div class="user-content">
    
<?php 
foreach($userposts as $user){?>
<div class="user-blogs">
	<a href="../show_post.php?id=<?php echo $user['id']; ?> " target="_blank">  <h3> <?php echo $user['title']; ?></h3></a>
	<span><?php echo date("F j, Y ", strtotime($user["created_at"])); ?></span>
		<img src="<?php echo BASE_URL . '/static/images/' . $user['image']; ?>" class="post_image" alt="Image">
		<a href="../show_post.php?id=<?php echo $user['id']; ?>"target="_blank" > <button class="continue-reading"  >Continue Reading</button> </a>
</div>

 <?php } ?>
</div>
</body>