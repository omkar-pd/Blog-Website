<?php 
        $admin_id = 0;
        $isEditingUser = false;
        $username = "";
        $role = "";
        $email = "";
        // general variables
        $errors = [];
        $total_pages="";
        $page="";

class Admin {

    function getAdminUsers(){
        global $conn, $roles,$total_pages,$page;
	    $results_per_page=6;
	    $sql = "SELECT * FROM users";
	    $result = mysqli_query($conn, $sql);
	    if(!isset($_GET['page'])){
        $page=1;
        }else{
        $page=$_GET['page'];
        }
	    $i=0;
	    $num_of_rows = mysqli_num_rows($result);
	    $total_pages=ceil($num_of_rows/$results_per_page);
	    $start_limit=($page-1)*$results_per_page;
        $sql="SELECT * FROM users LIMIT ".$start_limit.','.$results_per_page;
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > $i){
	    $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
	    return $users;
	    }
    }

    function createAdmin(){
	    global $conn, $errors, $role, $username, $email;
	    $username = $this->esc($_POST['username']);
	    $email = $this->esc($_POST['email']);
	    $password = $this->esc($_POST['password']);
	    $passwordConfirmation = $this->esc($_POST['passwordConfirmation']);
	    if(isset($_POST['role'])){
		$role = $this->esc($_POST['role']);
	    }
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

	    if (count($errors) == 0) {
		$password = md5($password);
		$query = "INSERT INTO users (username, email, role, password, created_at, updated_at) 
				  VALUES('$username', '$email', '$role', '$password', now(), now())";
		mysqli_query($conn, $query);
		$_SESSION['message'] = "Admin user created successfully";
		header('location: users.php');
		exit(0);
	    }
    }

    function editAdmin($admin_id) {
	    global $conn, $username, $role, $isEditingUser, $admin_id, $email;
	    $sql = "SELECT * FROM users WHERE id=$admin_id LIMIT 1";
	    $result = mysqli_query($conn, $sql);
	    $admin = mysqli_fetch_assoc($result);
	    $username = $admin['username'];
	    $email = $admin['email'];
    }

    function updateAdmin($request_values){
	    global $conn, $errors, $role, $username, $isEditingUser, $admin_id, $email;
	    $admin_id = $request_values['admin_id'];
	    $isEditingUser = false;
	    $username = $this->esc($request_values['username']);
	    $email = $this->esc($request_values['email']);
	    if(isset($request_values['role'])){
		$role = $request_values['role'];
	    }
	    if (count($errors) == 0) {
		$query = "UPDATE users SET username='$username', email='$email', role='$role' WHERE id=$admin_id";
		mysqli_query($conn, $query);
		$_SESSION['message'] = "Admin user updated successfully";
		header('location: users.php');
		exit(0);
	    }
    }

    function deleteAdmin($admin_id) {
	    global $conn;
	    $sql = "DELETE FROM users WHERE id=$admin_id";
	    if (mysqli_query($conn, $sql)) {
		$_SESSION['message'] = "User successfully deleted";
		header("location: users.php");
		exit(0);
	    }
    }

    function esc(String $value){
		global $conn;
		$val = trim($value); 
		$val = mysqli_real_escape_string($conn, $value);
		return $val;
	}
}

        $admin= new Admin();

        if (isset($_POST['create_admin'])) {
	    $admin->createAdmin();
}
        if (isset($_GET['edit-admin'])) {
	    $isEditingUser = true;
	    $admin_id = $_GET['edit-admin'];
	    $admin->editAdmin($admin_id);
}

        if (isset($_POST['update_admin'])) {
	    $admin->updateAdmin($_POST);
        }

        if (isset($_GET['delete-admin'])) {
	    $admin_id = $_GET['delete-admin'];
	    $admin->deleteAdmin($admin_id);
}
?>