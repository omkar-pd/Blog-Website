<?php
require_once('includes/globals.php');
class Posts {
  function getPublishedPosts() {
    global $conn, $total_pages, $page;
    $results_per_page = 6;
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($conn, $sql);
    if (!isset($_GET['page'])) {
      $page = 1;
    } else {
      $page = $_GET['page'];
    }
    $i = 0;
    $num_of_rows = mysqli_num_rows($result);
    $total_pages = ceil($num_of_rows / $results_per_page);
    $start_limit = ($page - 1) * $results_per_page;
    $sql = "SELECT * FROM posts LIMIT " . $start_limit . ',' . $results_per_page;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > $i) {
      // fetch all posts
      $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
      return $posts;
    }
  }
  function getRecentPosts() {
    global $conn, $total_pages, $page;
    $results_per_page = 6;
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($conn, $sql);
    if (!isset($_GET['page'])) {
      $page = 1;
    } else {
      $page = $_GET['page'];
    }
    $i = 0;
    $num_of_rows = mysqli_num_rows($result);
    $total_pages = ceil($num_of_rows / $results_per_page);
    $start_limit = ($page - 1) * $results_per_page;
    $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT " . $start_limit . ',' . $results_per_page;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > $i) {
      // fetch all posts
      $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
      return $posts;
    }
  }
  function getName($u_id) {
    global $conn;
    $sql = "SELECT username FROM users WHERE id=$u_id";
    $result = mysqli_query($conn, $sql);
    return $result;
  }
}
