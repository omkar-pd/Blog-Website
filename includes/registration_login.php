<?php 
// PHP MAILER TO SEND EMAIL
			require("./PHPMailer-master/src/PHPMailer.php");
			require("./PHPMailer-master/src/SMTP.php");
	// variable declaration
	$username = "";
	$email    = "";
	$errors = array();
	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = esc($_POST['username']);
		$email = esc($_POST['email']);
		$password_1 = esc($_POST['password_1']);
		$password_2 = esc($_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) {  array_push($errors, "Enter Your Username"); }
		if (empty($email)) { array_push($errors, "Enter Your Email"); }
		if (empty($password_1)) { array_push($errors, "You forgot the password"); }
		if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match");}

		
		// the email and usernames should be unique
		$user_check_query = "SELECT * FROM users WHERE username='$username' 
								OR email='$email' LIMIT 1";

		$result = mysqli_query($conn, $user_check_query);
		$user = mysqli_fetch_assoc($result);

		if ($user) { // if user exists
			if ($user['username'] === $username) {
			  array_push($errors, "Username already exists");
			}
			if ($user['email'] === $email) {
			  array_push($errors, "Email already exists");
			}
		}
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password, created_at, updated_at) 
					  VALUES('$username', '$email', '$password', now(), now())";
			mysqli_query($conn, $query);

			// id of created user
			$reg_user_id = mysqli_insert_id($conn); 

			// put logged in user into session array
			$_SESSION['user'] = getUserById($reg_user_id);

			// if user is admin, redirect to admin area
			if ( in_array($_SESSION['user']['role'], ["Admin", "Author"])) {
				$_SESSION['message'] = "You are now logged in";
				// redirect to admin area
				header('location: ' . BASE_URL . 'admin/dashboard.php');
				exit(0);
			} else {
				$_SESSION['message'] = "You are now logged in";
				// redirect to public area
				header('location: index.php');				
				exit(0);
			}
		}
	}

	// LOG USER IN
	if (isset($_POST['login_btn'])) {
		$username = esc($_POST['username']);
		$password = esc($_POST['password']);
		if (empty($username)) { array_push($errors, "Username required"); }
		if (empty($password)) { array_push($errors, "Password required"); }
		if (empty($errors)) {
			$password = md5($password); // encrypt password
			$sql = "SELECT * FROM users WHERE username='$username' and password='$password' LIMIT 1";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				// get id of created user
				$reg_user_id = mysqli_fetch_assoc($result)['id']; 
				// put logged in user into session array
				$_SESSION['user'] = getUserById($reg_user_id); 
				// if user is admin, redirect to admin area
				if ( in_array($_SESSION['user']['role'], ["Admin", "Author"])) {
					$_SESSION['message'] = "You are now logged in";
					// redirect to admin area
					header('location: ' . BASE_URL . '/admin/dashboard.php');
					exit(0);
				} else {
					$_SESSION['message'] = "You are now logged in";
					// redirect to public area
					header('location: index.php');				
					exit(0);
				}
			} else {
				array_push($errors, 'Wrong credentials');
			}
		}
	}

// Forgot password
if (isset($_POST['forgot_pass'])) {
global $conn;
global $newCode;
$username_new=esc($_POST['username']);
$email=esc($_POST['email']);
$sql = "SELECT * FROM users WHERE username='$username_new' 
								AND email='$email' LIMIT 1";
		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);
		if ($user) { // if user exists
			if ($user['username'] === $username_new && $user['email']===$email) {
		$vcode="";
		$real_code="";
   		$subject="Blog Website Email Verification";
   		$code = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
   		$body = "Your Verification Code is : " . $code;
		$_SESSION['code']=$code;
   		 $mail = new PHPMailer\PHPMailer\PHPMailer();
   		 $mail->IsSMTP(); // enable SMTP
   		 $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
   		 $mail->SMTPAuth = true; // authentication enabled
   		 $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    	 $mail->Host = "smtp.gmail.com";
   		 $mail->Port = 465; // or 587
    	 $mail->IsHTML(true);
    	 $mail->Username = "XXXXXX@gmail.com";
    	 $mail->Password = "XXXXXXXX";
    	 $mail->Subject = $subject;
    	 $mail->Body = $body;
    	 $mail->AddAddress($email);

     if(!$mail->Send()) {
       echo '<script type="text/JavaScript">  alert("Email Failed") . ;
     </script>'; 
     } else {
echo '<script type="text/JavaScript">  alert("Email sent successfully") . ;
     </script>';     }
   }
return $s= "true";	}else {
			return $s= "false";
	}	
}

// TO VERIFY CODE
	if(isset($_POST['verify'])){
		global $code;
		global $newCode;
		$username_new=esc($_POST['username']);
	    $email=esc($_POST['email']);
        $vcode = $_POST['code'];
        $real_code = $_SESSION['code'];
		if($real_code===$vcode) { 
			 return $v="true";
		 }else {
			 return $v="false";
		 }
   }			

// New Password
if(isset($_POST['change_pass'])){
	global $conn;
	$username_new=esc($_POST['username']);
	$email=esc($_POST['email']);
	$password_1=$_POST['new_pass'];
	$password_2=$_POST['confirm_pass'];
	if($password_1===$password_2){
		$password = md5($password_1);//encrypt the password
			$query = "UPDATE users SET password='$password', updated_at=now() WHERE username='$username_new' AND email='$email'";
			$result=mysqli_query($conn, $query);
			if ($result) { 
				echo '<script type="text/JavaScript"> alert("Given username and email does not exists in our system");</script>';
				header('location: login.php');
			}
	}else {
		array_push($errors,"Passwords do not match");
	}
} 

	// escape value from form
	function esc(String $value)
	{	
		// bring the global db connect object into function
		global $conn;
		$val = trim($value); // remove empty space sorrounding string
		$val = mysqli_real_escape_string($conn, $value);
		return $val;
	}
	// Get user info from user id
	function getUserById($id)
	{
		global $conn;
		$sql = "SELECT * FROM users WHERE id=$id LIMIT 1";
		$result = mysqli_query($conn, $sql);
		// returns user in an array 
		$user = mysqli_fetch_assoc($result);
		return $user; 
	}
?>

