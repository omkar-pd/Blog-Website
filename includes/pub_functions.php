<?php 

//  Returns all published posts

function getPublishedPosts() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts";
	$result = mysqli_query($conn, $sql);

	// fetch all posts 
	$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $posts;
}
function getPost($title){
	global $conn;
	// Get single post slug
	$title = $_GET['title'];
	$sql = "SELECT * FROM posts WHERE title='$title'";
	$result = mysqli_query($conn, $sql);
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $posts;
}


function getName($u_id){
	global $conn;
	$sql = "SELECT username FROM users WHERE id=$u_id";
	$result = mysqli_query($conn, $sql);
	return $result;
}