


  <nav class="navbar navbar-expand-lg bg-dark navbar-light">
  <a class="navbar-brand text-white" href="/Blog-Website/index.php">BlogSpot</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
      <a class="nav-link text-white" href="/Blog-Website/index.php">Home <span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item active">
    <a class="nav-link text-white" href="/Blog-Website/recent_articles.php">Recent Articles <span class="sr-only">(current)</span></a>
  </li>
	  <?php if (isset($_SESSION['user'])): ?>
		
	<li class="nav-item active">
    <a class="nav-link text-white" href="user_profile.php?userid=<?php echo $_SESSION['user']['id'] ?>"><?php echo $_SESSION['user']['username'] ?> <span class="sr-only">(current)</span></a>
      </li>
  <li class="nav-item active">
    <a class="nav-link text-white" href="edit_user_profile.php?userid=<?php echo $_SESSION['user']['id'] ?>">Edit Profile <span class="sr-only">(current)</span></a>
    </li>
	<?php endif ?>
    <?php if (isset($_SESSION['user']['username'])) { ?>
    <?php	if ( in_array($_SESSION['user']['role'], ["Admin","Author"])) {  ?> 
    <li class="nav-item active">
      <a class="nav-link text-white" href="<?php BASE_URL ?>dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
    </li>
    <?php } ?>
      <?php } ?>
      <?php if (isset($_SESSION['user']['username'])) { ?>
	<div class="logged_in_info">
		<li class="nav-item active">
    <a class="nav-link text-white" href="/Blog-Website/logout.php">Logout <span class="sr-only">(current)</span></a>
    </li>
	</div>
<?php }else{ ?> 
    <li class="nav-item active">
        <a class="nav-link text-white" href="/Blog-Website/login.php">Login/Register <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <?php } ?>
  </div>
</nav>