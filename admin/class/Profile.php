<?php
include('includes/globals.php');
class Profile {
    function getUserInfo($userid) {
        global $conn;
        $sql = "SELECT * from profileinfo WHERE user_id=$userid";
        $result = mysqli_query($conn, $sql);
        $userinfo = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $userinfo;
    }
    function getUserPosts($userid) {
        global $conn, $total_pages, $page;
        $results_per_page = 4;
        $sql = "SELECT * from posts WHERE user_id=$userid";
        $result = mysqli_query($conn, $sql);
        $userposts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $i = 0;
        $num_of_rows = mysqli_num_rows($result);
        $total_pages = ceil($num_of_rows / $results_per_page);
        $start_limit = ($page - 1) * $results_per_page;
        $sql = "SELECT * from posts WHERE user_id=$userid LIMIT " . $start_limit . ',' . $results_per_page;
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > $i) {
            $userposts = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $userposts;
        }
    }
    function updateUserProfile() {
        global $conn;
        $userid = $this->esc($_POST['userid']);
        $firstName = $this->esc($_POST['fname']);
        $lastName = $this->esc($_POST['lname']);
        $address = $this->esc($_POST['address']);
        $mobno = $this->esc($_POST['mobno']);
        $desc = $this->esc($_POST['description']);
        $twitter = $this->esc($_POST['twitter']);
        $instagram = $this->esc($_POST['instagram']);
        $facebook = $this->esc($_POST['facebook']);
        if (empty($twitter)) {
            $twitter = "#";
        }
        if (empty($instagram)) {
            $instagram = "#";
        }
        if (empty($facebook)) {
            $facebook = "#";
        }
        $query = "UPDATE profileinfo SET firstName='$firstName', lastName='$lastName', address='$address', mobno=$mobno, description='$desc',twitter='$twitter',instagram='$instagram',facebook='$facebook' WHERE user_id='$userid' ";
        if (mysqli_query($conn, $query)) {
            header('location: user_profile.php?userid=' . $userid);
            exit(0);
        } else {
            echo "failed to update profile";
            echo (mysqli_error($conn));
        }
    }
    function esc(String $value) {
        global $conn;
        $val = trim($value);
        $val = mysqli_real_escape_string($conn, $value);
        return $val;
    }
}
?>