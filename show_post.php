<?php require_once('config.php'); ?>
<?php require_once('includes/head_section.php') ?>
<?php require_once('includes/autoloader.php'); ?>
<?php
global $id;
$posts = new Posts();
$comments = new Comments();
$id = $_GET['id'];
if (isset($_GET['id'])) {
  $post = $comments->getPost($_GET['id']);
}
if (isset($_POST['add_comment'])) {
  $comments->addComment();
}
if (isset($_POST['remove_comment'])) {
  $comments->removeComment();
}
$commentinfo = $comments->getComments($_GET['id']);
?>
</head>

<body>

  <div class="container col-12">

    <?php include('includes/navbar.php') ?>
    <?php include('includes/banner.php') ?>

    <?php if (isset($_SESSION['user'])) { ?>
      <?php foreach ($post as $post) : ?>

        <title>BlogSpot | <?php echo $post['title'] ?></title>

        <div class="show-post container-fluid w-50 ml-auto mr-auto mt-5 bg-light ">
          <?php $u_id = $post['user_id'];
          $name = $posts->getName($u_id); ?>

          <?php while ($row = $name->fetch_assoc()) { ?>

            <p class="d-flex justify-content-end">Author Name: <a href="./admin/user_profile.php?userid=<?php echo $post['user_id'] ?>"> <?php echo $row['username'] . " " ?> </a></p>
          <?php } ?>
          <h1 class="text-center pt-2"><?php echo $post['title'] ?></h1>
          <div class="d-flex justify-content-center align-items-center">
            <img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="img-fluid pt-2" alt="image">
          </div>
          <p class=" text-center pt-5"><?php echo html_entity_decode($post['content']) ?></p>
          <div class="d-flex justify-content-between pt-2"><span class="lead">Created At: <?php echo $post['created_at'] ?></span><span class="lead">Updated At: <?php echo $post['updated_at'] ?></span> </div>
        </div>
  </div>
  </div>
<?php endforeach ?>
<div class="container mt-5" id="comments">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <div class="headings d-flex justify-content-between align-items-center mb-3">
        <h5>Comments</h5>
      </div>
    </div>
  </div>
</div>
<?php foreach ($commentinfo as $info) { ?>
  <div class="container mt-2">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8">
        <div class="card p-3">
          <div class="d-flex justify-content-between align-items-center">
            <div class="user d-flex flex-row align-items-center"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" width="30" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary"><a href="./admin/user_profile.php?userid=<?php echo $info['user_id'] ?>"> <?php echo $info['username'] ?> </a></small> <small class="font-weight-bold ml-2"><?php echo $info['comment'] ?></small></span> </div>
            <?php if ($_SESSION['user_id'] == $info['user_id']) { ?>
              <form action="show_post.php" method="POST">
                <input type="text" value="<?php echo $id ?>" name="post_id" hidden>
                <input type="text" value="<?php echo $info['comment_id'] ?>" name="comment_id" hidden>
                <button class="remove_comment" name="remove_comment"> <small>Remove</small> </button>
              </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<div class="container mt-5">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <div class="headings d-flex justify-content-between align-items-center mb-3">
        <h5>Add Comment</h5>
      </div>
      <div class="card p-3">
        <div class="d-flex w-100 align-items-center">
          <form method="POST" action="show_post.php" class="w-100">
            <div class="d-flex flex-row justify-content-between align-items-center mt-4 mb-4">
              <input type="text" value="<?php echo $id ?>" name="post_id" hidden>
              <input type="text" class="form-control mr-3" name="comment" placeholder="Add comment" required>
              <button class="btn btn-primary" name="add_comment" style="width: 150px;">Comment</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } else { ?>
  <div class="d-flex flex-column justify-content-center align-items-center">
    <h2 class="p-5">Please login to read the blogs</h2>
    <button class="btn btn-info" style="max-width: 215px;"><a class="text-dark" href="./login.php">Click here to login</a></button>
    <button class="btn btn-info" style="max-width: 215px;"><a class="text-dark" href="./register.php">Click here to register</a></button>
  </div>
<?php } ?>
<?php include(ROOT_PATH . '/includes/footer.php'); ?>
</div>
</body>