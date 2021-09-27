
     <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand text-white" href="index.php">BlogSpot</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
      <a class="nav-link text-white" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-white" href="recent_articles.php">Recent Articles <span class="sr-only">(current)</span></a>
      </li>

      <?php if (isset($_SESSION['user']['username'])) { ?>

      <li class="nav-item active">
      <a class="nav-link text-white" href="./admin/user_profile.php?userid=<?php echo $_SESSION['user']['id'] ?>"><?php echo $_SESSION['user']['username'] ?> <span class="sr-only">(current)</span></a>
      </li>

      <?php	if ( in_array($_SESSION['user']['role'], ["Admin","Author"])) {  ?> 

      <li class="nav-item active">
      <a class="nav-link text-white" href="<?php BASE_URL ?>admin/dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>

      <?php } ?>
      <?php } ?>

      <?php if (isset($_SESSION['user']['username'])) { ?>

      <div class="logged_in_info">
		  <li class="nav-item active">
      <a class="nav-link text-white text-left"  href="logout.php">Logout <span class="sr-only">(current)</span></a>
      </li>
      
    	</div>
      <?php }else{ ?> 

      <li class="nav-item active">
      <a class="nav-link text-white" href="login.php">Login/Register <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <?php } ?>
  </div>
</nav>