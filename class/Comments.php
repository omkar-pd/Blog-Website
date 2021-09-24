<?php
class Comments {
  function getPost($id) {
    global $conn;
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $posts;
  }
  function getComments($post_id) {
    global $conn;
    $sql = "SELECT * FROM comments where post_id=$post_id";
    $result = mysqli_query($conn, $sql);
    $info = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $commentinfo = array();
    foreach ($info as $info) {
      $info['username'] = $this->getNameForComments($info['user_id']);
      array_push($commentinfo, $info);
    }
    return $commentinfo;
  }
  function getNameForComments($u_id) {
    global $conn;
    $sql = "SELECT username FROM users WHERE id=$u_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      // return username
      return mysqli_fetch_assoc($result)['username'];
    } else {
      return null;
    }
  }
  function addComment() {
    global $conn;
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['user_id'];
    $comment = $_POST['comment'];
    $sql = "INSERT into comments (comment,user_id,post_id) VALUES ('$comment',$user_id,$post_id)";
    $result = mysqli_query($conn, $sql);
    header("Location: show_post.php?id=" . $post_id . "#comments");
  }
  function removeComment() {
    global $conn;
    $comment_id = $_POST['comment_id'];
    $post_id = $_POST['post_id'];
    $sql = "DELETE FROM comments WHERE comment_id=$comment_id";
    $result = mysqli_query($conn, $sql);
    header("Location: show_post.php?id=" . $post_id . "#comments");
  }
}
