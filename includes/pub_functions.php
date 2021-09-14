<?php 
// include('registration_login.php');

		$total_pages="";
		$page="";
		$id="";
		//  Returns all published posts
		function getPublishedPosts() {
		global $conn,$total_pages,$page;
		$results_per_page=6;
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
		$results_per_page=6;
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

		function getComments($post_id){
		global $conn;
		$sql = "SELECT * FROM comments where post_id=$post_id";
		$result= mysqli_query($conn,$sql);
		$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
		$commentinfo = array();
		foreach($info as $info){
		$info['username']=getNameForComments($info['user_id']);
		array_push($commentinfo,$info);
	}
		return $commentinfo;
}

		// Gets the author name using id from posts table
		function getName($u_id){
		global $conn;
		$sql = "SELECT username FROM users WHERE id=$u_id";
		$result = mysqli_query($conn, $sql);
		return $result;
		}

		function getNameForComments($u_id){
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

		if (isset($_POST['add_comment'])) {
		global $conn;
		$post_id=$_POST['post_id'];
		$user_id=$_SESSION['user_id'];
		$comment=$_POST['comment'];
		$sql="INSERT into comments (comment,user_id,post_id) VALUES ('$comment',$user_id,$post_id)";
		$result=mysqli_query($conn,$sql);
		header("Location: show_post.php?id=".$post_id."#comments");
}

		if (isset($_POST['remove_comment'])) { 
		global $conn;
		$comment_id=$_POST['comment_id'];
		$post_id=$_POST['post_id'];
		$sql="DELETE FROM comments WHERE comment_id=$comment_id";
		$result=mysqli_query($conn,$sql);
		header("Location: show_post.php?id=".$post_id."#comments");
}