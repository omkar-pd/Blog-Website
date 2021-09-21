    <?php  include('../config.php'); ?>
	<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
    <?php require_once('../includes/autoloader.php'); ?> 
    <title>BlogSpot | User-Profile</title>
</head>
    <?php 
    $profile = new Profile();
    $userid=$_GET['userid'];
    $userinfo=$profile->getUserInfo($userid);
    $userposts=$profile->getUserPosts($userid);
    ?>
<body>
    <?php include(ROOT_PATH . '/admin/includes/navbar.php')   ?>
       <?php foreach($userinfo as $user){ ?>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center m-auto">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600"><?php echo $user['firstName']?> <?php echo $user['lastName']?></h6>
                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                            <ul class="social-link list-unstyled m-t-40 m-b-10 text-center">
                                    <li><a href="<?php echo $user['twitter'] ?>"><i class="bi bi-twitter"></i></a></li>
                                    <li><a href="<?php echo $user['instagram'] ?>"><i class="bi bi-instagram"></i></a></li>
                                    <li><a href="<?php echo $user['facebook'] ?>" ><i class="bi bi-facebook"></i></a></li>
                            </ul>
                            </div>
                        <div class="col-sm-8">
                        <div class="card-block">
                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                        <div class="row">
                        <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Address</p>
                        <h6 class="text-muted f-w-400"><?php echo $user['address'] ;?></h6>
                        </div>
                        <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Phone</p>
                        <h6 class="text-muted f-w-400"><?php echo $user['mobno'] ?></h6>
                        </div>
                        </div>
                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Description</h6>
                        <div class="row">
                        <div class="col-12">
                        <h6 class="text-muted f-w-400"><?php echo $user['description'] ?></h6>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>

        <div class="user-content">
    
        <?php
        if(!empty($userposts)) { 
        foreach($userposts as $user){?>
        <div class="user-blogs">
    	<a href="../show_post.php?id=<?php echo $user['id']; ?> " target="_blank">  <h6> <?php echo $user['title']; ?></h6></a>
	    <span><?php echo date("F j, Y ", strtotime($user["created_at"])); ?></span>
		<img src="<?php echo BASE_URL . '/static/images/' . $user['image']; ?>" class="post_image" alt="Image">
		<a href="../show_post.php?id=<?php echo $user['id']; ?>"target="_blank" > <button class="continue-reading"  >Continue Reading</button> </a>
        </div>
        <?php }?>
        </div>
        <?php  
        $prev = $page - 1;
        $next = $page + 1; 
        ?>
        <nav class="mt-5">
        <ul class="pagination justify-content-center mt-4">
        <li class="page-item <?php if($page <=1){ echo 'disabled'; } ?>">
        <a class="page-link" href="<?php if($page < 1){ echo '#'; } else { echo "user_profile.php?page=$prev&userid=$userid "; } ?>">Previous</a>
        </li>

        <?php for($i = 1; $i <= $total_pages; $i++ ): ?>
        <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
        <a class="page-link" href="user_profile.php?userid=<?php echo $userid?>&page=<?= $i; ?>"> <?= $i; ?> </a>
        </li>
        <?php endfor; ?>
        <li class="page-item <?php if($page >= $total_pages) { echo 'disabled'; } ?>">
        <a class="page-link" href="<?php if($page >= $total_pages){ echo '#'; } else {echo "user_profile.php?page=$next&userid=$userid "; } ?>">Next</a>
        </li>
        </ul>
        </nav>
        <?php }?>
        </body>

<style>
    body {
    background-color: #f9f9fa
}

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
    margin-bottom: 30px
}

.m-r-0 {
    margin-right: 0px
}

.m-l-0 {
    margin-left: 0px
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px
}

.bg-c-lite-green {
    background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263)
}

.user-profile {
    padding: 20px 0
}

.card-block {
    padding: 1.25rem
}

.m-b-25 {
    margin-bottom: 25px
}

.img-radius {
    border-radius: 5px
}

h6 {
    font-size: 14px
}

.card .card-block p {
    line-height: 25px
}

@media only screen and (min-width: 1400px) {
    p {
        font-size: 14px
    }
}

.card-block {
    padding: 1.25rem
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.m-b-20 {
    margin-bottom: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.card .card-block p {
    line-height: 25px
}

.m-b-10 {
    margin-bottom: 10px
}

.text-muted {
    color: #919aa3 !important
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.f-w-600 {
    font-weight: 600
}

.m-b-20 {
    margin-bottom: 20px
}

.m-t-40 {
    margin-top: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.m-b-10 {
    margin-bottom: 10px
}

.m-t-40 {
    margin-top: 20px
}

.user-card-full .social-link li {
    display: inline-block
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out
}
</style>