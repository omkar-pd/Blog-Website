<?php
  if(!isset($_SESSION['user']) || !in_array($_SESSION['user']['role'], ["Admin", "Author"])) {
    echo header('location:' . BASE_URL .'index.php');
  }
?>