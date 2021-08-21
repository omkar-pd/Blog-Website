<?php 
// include('registration_login.php');
//  Returns all published posts
function getPublishedPosts() {
	global $conn;
	$sql = "SELECT * FROM posts";
	$result = mysqli_query($conn, $sql);
	// fetch all posts 
	$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
	return $posts;
}
function getRecentPosts(){
	global $conn;
	$sql = "SELECT * FROM posts ORDER BY id DESC";
	$result = mysqli_query($conn,$sql);
	$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
	return $posts;
}
function getPost($id){
	global $conn;
	$id = $_GET['id'];
	// $sql = "SELECT * FROM posts WHERE title='$title'";
	$sql = "SELECT * FROM posts WHERE id='$id'";
	$result = mysqli_query($conn, $sql);
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $posts;
}

// Gets the author name using id from posts table
function getName($u_id){
	global $conn;
	$sql = "SELECT username FROM users WHERE id=$u_id";
	$result = mysqli_query($conn, $sql);
	return $result;
}
