<?php 
// include('registration_login.php');
//  Returns all published posts
$total_pages="";
$page="";
function getPublishedPosts() {
	global $conn,$total_pages,$page;
	$results_per_page=4;
	$sql = "SELECT * FROM posts";
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
        $sql="SELECT * FROM posts LIMIT ".$start_limit.','.$results_per_page;
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > $i){
		// fetch all posts 
		$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
		return $posts;
		}
}
function getRecentPosts(){
	global $conn,$total_pages,$page;
	$results_per_page=4;
	$sql = "SELECT * FROM posts";
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
        $sql="SELECT * FROM posts ORDER BY id DESC LIMIT ".$start_limit.','.$results_per_page;
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > $i){
		// fetch all posts 
		$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
		return $posts;
		}
	// $sql = "SELECT * FROM posts ORDER BY id DESC";

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
