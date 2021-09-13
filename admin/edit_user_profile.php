<?php  include('../config.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
 <?php 
    $userid=$_GET['userid'];
    $userinfo=getUserInfo($userid);
   ?>
<title>BlogSpot | Edit-User-Profile</title>
</head>
<body>
    <?php include(ROOT_PATH . '/admin/includes/navbar.php')   ?>
    <?php foreach($userinfo as $user) ?>
   <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>Update Profile</h3>
            <div class="card">
                <form class="form-card" method="POST" action="edit_user_profile.php">
                    <input type="text"  value="<?php echo $userid; ?>" name="userid" hidden>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">First name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name" value="<?php echo $user['firstName'] ?>" required> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Last name<span class="text-danger"> *</span></label> <input type="text" id="lname" name="lname" placeholder="Enter your last name" value="<?php echo $user['lastName'] ?>" required> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Address<span class="text-danger"> *</span></label> <textarea name="address" id="address" cols="10" rows="1" required><?php echo $user['address']?></textarea> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Phone number<span class="text-danger"> *</span></label> <input type="text" id="mobno" name="mobno" placeholder="Mobile Number" value="<?php echo $user['mobno'] ?>" required> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group  flex-column d-flex"> <label class="form-control-label px-3">Description<span class="text-danger"> *</span></label> <textarea name="description" id="description" cols="70" rows="5"   required><?php echo $user['description'] ?></textarea> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Social Links</label> 
                        <input type="text" id="twitter" name="twitter" placeholder="Twitter" value="<?php echo $user['twitter'] ?>">
                        <input type="text" id="instagram" name="instagram" placeholder="Instagram"value="<?php echo $user['instagram'] ?>"> 
                        <input type="text" id="facebook" name="facebook" placeholder="Facebook" value="<?php echo $user['facebook'] ?>">
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <button type="submit" name="update_user_profile" class="btn-block btn-primary">Update Profile</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
}

.card {
    padding: 20px;
    margin-top: 60px;
    margin-bottom: 60px;
    border: none !important;
    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
}

.blue-text {
    color: #00BCD4
}

.form-control-label {
    margin-bottom: 0
}

input,
textarea,
button {
    padding: 8px 15px;
    border-radius: 5px !important;
    margin: 5px 0px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    font-size: 18px !important;
    font-weight: 300
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #00BCD4;
    outline-width: 0;
    font-weight: 400
}

.btn-block {
    text-transform: uppercase;
    font-size: 15px !important;
    font-weight: 400;
    height: 43px;
    cursor: pointer
}

.btn-block:hover {
    color: #fff !important
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}
</style>