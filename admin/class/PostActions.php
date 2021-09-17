<?php 
    // Post variables
	$post_id = 0;
	$isEditingPost = false;
	$img;
	$published = 0;
	$title = "";
	$body = "";
	$featured_image = "";
	$total_pages="";
	$page="";
	$sql="";
    $errors = array();

    class PostActions {
            function createPost()
			{
			global $conn, $errors, $title, $featured_image, $topic_id, $body, $published;
			$user_id = $_SESSION['user']['id'];
			$title = $this->esc($_POST['title']);
			$body = htmlentities($this->esc($_POST['body']));
			// validate form
			if (empty($title)) { array_push($errors, "Post title is required"); }
			if (empty($body)) { array_push($errors, "Post body is required"); }
			// Get image name
	  		$featured_image = $_FILES['featured_image']['name'];
	  		if (empty($featured_image)) { array_push($errors, "Featured image is required"); }
	  		// image file directory
	  		$target = "../static/images/" . basename($featured_image);
	  		if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
	  		array_push($errors, "Failed to upload image. Please check file settings for your server");
	  		}
			
			if (count($errors) == 0) {
			$query = "INSERT INTO posts (user_id, title, image, content,created_at, updated_at) VALUES('$user_id', '$title', '$featured_image', '$body', now(), now())";
			if(mysqli_query($conn, $query)){ 
			$inserted_post_id = mysqli_insert_id($conn);
			$_SESSION['message'] = "Post created successfully";
			header('location: posts.php');
			exit(0);
			}
		}
	}

		function editPost($role_id)
		{
			global $conn, $title, $body, $published, $isEditingPost, $post_id,$img;
			$sql = "SELECT * FROM posts WHERE id=$role_id LIMIT 1";
			$result = mysqli_query($conn, $sql);
			$post = mysqli_fetch_assoc($result);
			// set form values on the form to be updated
			$title = $post['title'];
			$img= $post['image'];
			$body = $post['content'];
		}

		function updatePost($request_values)
			{
     		global $conn, $errors, $title, $featured_image, $topic_id, $body, $published;
			$title = $this->esc($request_values['title']);
			$body = htmlentities($this->esc($request_values['body']));
			$post_id = $this->esc($request_values['post_id']);
		
			if (empty($title)) { array_push($errors, "Post title is required"); }
			if (empty($body)) { array_push($errors, "Post body is required"); }
			
	  		$featured_image = $_FILES['featured_image']['name'];
	  		if (empty($featured_image)) { array_push($errors, "Featured image is required"); }
	  		
	  		$target = "../static/images/" . basename($featured_image);
	  		if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
	  		array_push($errors, "Failed to upload image. Please check file settings for your server");
	  		}
			
			if (count($errors) == 0) {
			$query = "UPDATE posts SET title='$title', views=0, image='$featured_image', content='$body', updated_at=now() WHERE id='$post_id' ";
            if(mysqli_query($conn, $query)){ 
				$inserted_post_id = mysqli_insert_id($conn);
				$_SESSION['message'] = "Post Updated successfully";
				header('location: posts.php');
				exit(0);
			}
		}
	}
		function deletePost($post_id)
		{
			global $conn;
			$sql = "DELETE FROM posts WHERE id=$post_id";
			if (mysqli_query($conn, $sql)) {
			$_SESSION['message'] = "Post successfully deleted";
			header("location: posts.php");
			exit(0);
		}
	}
        function esc(String $value) {	
		    global $conn;
		    $val = trim($value);
		    $val = mysqli_real_escape_string($conn, $value);
		    return $val;
	   	 }
}
    		$postAction= new PostActions();
			
    		if (isset($_POST['create_post'])) { 
        	$postAction->createPost(); 
  	 		}

			if (isset($_GET['edit-post'])) {
			$isEditingPost = true;
			$post_id = $_GET['edit-post'];
			$postAction->editPost($post_id);
			}

			if (isset($_POST['update_post'])) {
			$postAction->updatePost($_POST);
			}

			if (isset($_GET['delete-post'])) {
			$post_id = $_GET['delete-post'];
			$postAction->deletePost($post_id);
			}

?>