<?php
// Post variables
$total_pages = "";
$page = "";
$sql = "";
class AdminPosts {
    function getAllPosts() {
        global $conn, $total_pages, $page, $sql;
        $results_per_page = 6;
        if ($_SESSION['user']['role'] == "Admin") {
            $sql = "SELECT * FROM posts";
        } elseif ($_SESSION['user']['role'] == "Author") {
            $user_id = $_SESSION['user']['id'];
            $sql = "SELECT * FROM posts WHERE user_id=$user_id";
        }
        $result = mysqli_query($conn, $sql);
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $i = 0;
        $num_of_rows = mysqli_num_rows($result);
        $total_pages = ceil($num_of_rows / $results_per_page);
        $start_limit = ($page - 1) * $results_per_page;
        if ($_SESSION['user']['role'] == "Admin") {
            $sql = $sql = "SELECT * FROM posts LIMIT " . $start_limit . ',' . $results_per_page;
        } elseif ($_SESSION['user']['role'] == "Author") {
            $user_id = $_SESSION['user']['id'];
            $sql = "SELECT * FROM posts WHERE user_id=$user_id LIMIT " . $start_limit . ',' . $results_per_page;
        }
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > $i) {
            $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $final_posts = array();
            foreach ($posts as $post) {
                $post['author'] = $this->getPostAuthorById($post['user_id']);
                array_push($final_posts, $post);
            }
            return $final_posts;
        }
    }
    function getPostAuthorById($user_id) {
        global $conn;
        $sql = "SELECT username FROM users WHERE id=$user_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // return username
            return mysqli_fetch_assoc($result) ['username'];
        } else {
            return null;
        }
    }
}
?>