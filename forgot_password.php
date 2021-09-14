      <?php  include('config.php'); ?>
      <?php  require_once('includes/registration_login.php'); ?>
      <?php require_once( ROOT_PATH . '/includes/pub_functions.php') ?>
      <?php  include('includes/head_section.php'); ?>
      <title>BlogSpot | Forgot Password </title>
      </head>
      <body>	<!-- navbar -->

      <?php include('includes/navbar.php') ?>
      <?php include('includes/banner.php') ?>

      <div class="container col-12 forgot_pass m-lg-5">
		<?php include(ROOT_PATH . '/includes/errors.php') ?>
      <form class="d-flex flex-column justify-content-center align-items-center" action="forgot_password.php" method="post">
      <input class="w-50" type="text" name="username" placeholder="Enter your username"  required value="<?php if(!empty($username_new)){echo $username_new;} ?>">
      <input class="w-50" type="email" name="email" placeholder="Enter your Email" value="<?php if(!empty($email)){ echo $email;} ?>" required>
      <button class="btn btn-primary" name="forgot_pass" style="min-width: 200px; width: fit-content;">Submit</button>
      <?php if(!empty($s)){
      if($s==="true"){ ?>
      <form action="forgot_password.php" method="post">
      <input type="text" class="w-50" name="code" placeholder="Enter the code">
      <button class="btn btn-primary" name="verify" style="min-width: 200px; width: fit-content;">Verify</button>
      </form>
      <?php }else {?>
      <p>This username and email does not exists in our system</p>
      <?php }
      }?>
      <?php  if(isset($v)){
      if($v=="true") {?>
      <form action="forgot_password.php" method="POST" >
      <div class="input-group">
      <input  class="pass_field w-50" name="new_pass" type="password" placeholder="Enter New Password" required>
      <img class="show_pass" src="./static/images/eye-fill.svg" alt="eye" style="position: absolute;right: 292px;top: 21px;">
      </div>
      <div class="input-group">
      <input  class="pass_field w-50" name="confirm_pass" type="password" placeholder="Confirm New Password" required>
      <img class="show_pass" src="./static/images/eye-fill.svg" alt="eye" style="position: absolute;right: 292px;top: 21px;">
      </div>
      <button name="change_pass" class="btn btn-info" style="min-width: 200px; width: fit-content;">Submit</button>
      </form>
      </form>
      <?php }else { ?>
      <p>Incorrect Code, Please try again with correct code</p>  
      <input type="text" class="w-50" name="code" placeholder="Enter the code">
      <button class="btn btn-primary" name="verify">Verify</button>
      <?php   }}?>
      </div>
	   <?php include( ROOT_PATH . '/includes/footer.php'); ?>
