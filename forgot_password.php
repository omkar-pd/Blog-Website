<?php  include('config.php'); ?>
<?php  include('includes/registration_login.php'); ?>
<?php require_once( ROOT_PATH . '/includes/pub_functions.php') ?>
<?php  include('includes/head_section.php'); ?>
<title>BlogSpot | Forgot Password </title>
</head>
<body>
    <div class="container forgot_pass">
		<!-- navbar -->
		<?php include('includes/navbar.php') ?>
        <?php include(ROOT_PATH . '/includes/errors.php') ?>
        <form class="d-flex flex-column justify-content-center align-items-center" action="forgot_password.php" method="post">
            <input class="w-50" type="text" name="username" placeholder="Enter your username"  required value="<?php if(!empty($username_new)){echo $username_new;} ?>">
            <input class="w-50" type="email" name="email" placeholder="Enter your Email" value="<?php if(!empty($email)){ echo $email;} ?>" required>
            <button class="btn btn-primary" name="forgot_pass">Submit</button>
            <?php if(!empty($s)){
                if($s==="true"){ ?>
                <form action="forgot_password.php" method="POST" >
                <input  class="pass_field w-50" name="new_pass" type="password" placeholder="Enter New Password" required>
                <input  class="pass_field w-50" name="confirm_pass" type="password" placeholder="Confirm New Password" required>
                <button name="change_pass" class="btn btn-info" >Submit</button>
                
 </form>
</form>
               <?php }else {
                echo '<script type="text/JavaScript">  alert("Given username and email does not exists in our system");
     </script>';
               }
                }?>
    </div>
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
