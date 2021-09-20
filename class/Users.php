<?php
require_once ('config.php');
$username = "";
$email = "";
$errors = array();
class Users {
    function register() {
        global $conn, $errors;
        $username = $this->esc($_POST['username']);
        $email = $this->esc($_POST['email']);
        $password_1 = $this->esc($_POST['password_1']);
        $password_2 = $this->esc($_POST['password_2']);
        if (empty($username)) {
            array_push($errors, "Enter Your Username");
        }
        if (empty($email)) {
            array_push($errors, "Enter Your Email");
        }
        if (empty($password_1)) {
            array_push($errors, "You forgot the password");
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }
        $user_check_query = "SELECT * FROM users WHERE username='$username' 
								OR email='$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            if ($user['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($user['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }
        if (count($errors) == 0) {
            $password = md5($password_1);
            $query = "INSERT INTO users (username, email, password, created_at, updated_at) 
						VALUES('$username', '$email', '$password', now(), now())";
            mysqli_query($conn, $query);
            $reg_user_id = mysqli_insert_id($conn);
            $query2 = "INSERT INTO profileinfo (user_id) VALUES ($reg_user_id)";
            mysqli_query($conn, $query2);
            $_SESSION['user_id'] = $reg_user_id;
            $_SESSION['user'] = $this->getUserById($reg_user_id);
            if (in_array($_SESSION['user']['role'], ["Admin", "Author"])) {
                $_SESSION['message'] = "You are now logged in";
                header('location: ' . BASE_URL . 'admin/dashboard.php');
                exit(0);
            } else {
                $_SESSION['message'] = "You are now logged in";
                header('location: index.php');
                exit(0);
            }
        }
    }
    function login() {
        global $conn, $errors;
        $username = $this->esc($_POST['username']);
        $password = $this->esc($_POST['password']);
        if (empty($username)) {
            array_push($errors, "Username required");
        }
        if (empty($password)) {
            array_push($errors, "Password required");
        }
        if (empty($errors)) {
            $password = md5($password);
            $sql = "SELECT * FROM users WHERE username='$username' and password='$password' LIMIT 1";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $reg_user_id = mysqli_fetch_assoc($result) ['id'];
                $_SESSION['user_id'] = $reg_user_id;
                $_SESSION['user'] = $this->getUserById($reg_user_id);
                if (in_array($_SESSION['user']['role'], ["Admin", "Author"])) {
                    $_SESSION['message'] = "You are now logged in";
                    header('location: ' . BASE_URL . '/admin/dashboard.php');
                    exit(0);
                } else {
                    $_SESSION['message'] = "You are now logged in";
                    header('location: index.php');
                    exit(0);
                }
            } else {
                array_push($errors, 'Wrong credentials');
            }
        }
    }
    function esc(String $value) {
        global $conn;
        $val = trim($value);
        $val = mysqli_real_escape_string($conn, $value);
        return $val;
    }
    function getUserById($id) {
        global $conn;
        $sql = "SELECT * FROM users WHERE id=$id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }
}
?>