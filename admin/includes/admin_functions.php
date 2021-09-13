<?php 
// Admin user variables
$admin_id = 0;
$isEditingUser = false;
$username = "";
$role = "";
$email = "";
// general variables
$errors = [];


// -  Admin users actions

// if user clicks the create admin button
if (isset($_POST['create_admin'])) {
	createAdmin($_POST);
}
// if user clicks the Edit admin button
if (isset($_GET['edit-admin'])) {
	$isEditingUser = true;
	$admin_id = $_GET['edit-admin'];
	editAdmin($admin_id);
}
// if user clicks the update admin button
if (isset($_POST['update_admin'])) {
	updateAdmin($_POST);
}
// if user clicks the Delete admin button
if (isset($_GET['delete-admin'])) {
	$admin_id = $_GET['delete-admin'];
	deleteAdmin($admin_id);
}
//  Returns all admin users and their corresponding roles
function getAdminUsers(){
	global $conn, $roles;
	// $sql = "SELECT * FROM users WHERE role IS NOT NULL";
	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);
	$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $users;
}

// * - Escapes form submitted value, hence, preventing SQL injection

// Receives a string like 'Some Sample String'
// and returns 'some-sample-string'
function makeSlug(String $string){
	$string = strtolower($string);
	$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	return $slug;
}


// * - Receives new admin data from form
// * - Create new admin user
// * - Returns all admin users with their roles 

function createAdmin($request_values){
	global $conn, $errors, $role, $username, $email;
	$username = esc($request_values['username']);
	$email = esc($request_values['email']);
	$password = esc($request_values['password']);
	$passwordConfirmation = esc($request_values['passwordConfirmation']);
	if(isset($request_values['role'])){
		$role = esc($request_values['role']);
	}
	// form validation: ensure that the form is correctly filled
	if (empty($username)) { array_push($errors, "Please enter the username"); }
	if (empty($email)) { array_push($errors, "Enter the Email"); }
	if (empty($role)) { array_push($errors, "Role is required for admin users");}
	if (empty($password)) { array_push($errors, " you forgot the password"); }
	if ($password != $passwordConfirmation) { array_push($errors, "The two passwords do not match"); }
	
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
		$password = md5($password);//encrypting the password before saving in the database
		$query = "INSERT INTO users (username, email, role, password, created_at, updated_at) 
				  VALUES('$username', '$email', '$role', '$password', now(), now())";
		mysqli_query($conn, $query);
		$_SESSION['message'] = "Admin user created successfully";
		header('location: users.php');
		exit(0);
	}
}
//  Takes admin id as parameter
//  Fetches the admin from database
//  sets admin fields on form for editing
function editAdmin($admin_id)
{
	global $conn, $username, $role, $isEditingUser, $admin_id, $email;
	$sql = "SELECT * FROM users WHERE id=$admin_id LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$admin = mysqli_fetch_assoc($result);
	// set form values ($username and $email) on the form to be updated
	$username = $admin['username'];
	$email = $admin['email'];
}
//  Receives admin request from form and updates in database
function updateAdmin($request_values){
	global $conn, $errors, $role, $username, $isEditingUser, $admin_id, $email;
	// get id of the admin to be updated
	$admin_id = $request_values['admin_id'];
	// set edit state to false
	$isEditingUser = false;
	$username = esc($request_values['username']);
	$email = esc($request_values['email']);
	// $password = esc($request_values['password']);
	// $passwordConfirmation = esc($request_values['passwordConfirmation']);
	if(isset($request_values['role'])){
		$role = $request_values['role'];
	}
	// register user if there are no errors in the form
	if (count($errors) == 0) {
		// $password = md5($password);
		$query = "UPDATE users SET username='$username', email='$email', role='$role' WHERE id=$admin_id";
		mysqli_query($conn, $query);
		$_SESSION['message'] = "Admin user updated successfully";
		header('location: users.php');
		exit(0);
	}
}
// delete admin user 
function deleteAdmin($admin_id) {
	global $conn;
	$sql = "DELETE FROM users WHERE id=$admin_id";
	if (mysqli_query($conn, $sql)) {
		$_SESSION['message'] = "User successfully deleted";
		header("location: users.php");
		exit(0);
	}
}


function getUserInfo($userid){
	global $conn;
	$sql = "SELECT * from profileinfo WHERE user_id=$userid";
	// $sql = " SELECT * from profileinfo CROSS JOIN posts WHERE posts.user_id=$userid AND profileinfo.user_id=$userid ";
	$result = mysqli_query($conn, $sql);
    $userinfo = mysqli_fetch_all($result,MYSQLI_ASSOC);
	return $userinfo;
}

function getUserPosts($userid){
	global $conn;
	$sql = "SELECT * from posts WHERE user_id=$userid";
	$result = mysqli_query($conn, $sql);
    $userposts = mysqli_fetch_all($result,MYSQLI_ASSOC);
	return $userposts;
}

if(isset($_POST['update_user_profile'])){
global $conn;
$userid = esc($_POST['userid']);
$firstName=esc($_POST['fname']);
$lastName=esc($_POST['lname']);
$address = esc($_POST['address']);
$mobno= esc($_POST['mobno']);
$desc=esc($_POST['description']);
$twitter=esc($_POST['twitter']);
$instagram=esc($_POST['instagram']);
$facebook=esc($_POST['facebook']);
if(empty($twitter)){
	$twitter="#";
}
if(empty($instagram)){
	$instagram="#";
}
if(empty($facebook)){
	$facebook="#";
}
$query = "UPDATE profileinfo SET firstName='$firstName', lastName='$lastName', address='$address', mobno=$mobno, description='$desc',twitter='$twitter',instagram='$instagram',facebook='$facebook' WHERE user_id='$userid' ";
// $query = "UPDATE profileinfo SET description='$desc' WHERE user_id='$userid' ";
            	if(mysqli_query($conn, $query)){ 
				header('location: user_profile.php?userid='.$userid);
				exit(0);
			} else {
				echo "failed to update profile";
				echo (mysqli_error($conn));
			}
			echo $userid;
// echo $firstName . $lastName . $address . $mobno . $desc . $twitter . $instagram . $facebook;
}

function esc(String $value){
	global $conn;
	// remove empty space sorrounding string
	$val = trim($value); 
	$val = mysqli_real_escape_string($conn, $value);
	return $val;
}
?>
