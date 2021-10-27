<?php
require_once('includes/globals.php');
require("./PHPMailer-master/src/PHPMailer.php");
require("./PHPMailer-master/src/SMTP.php");

class Password
{
  function forgotPassword()
  {
    global $conn, $newCode, $username_new, $email;
    $username_new = $this->esc($_POST['username']);
    $email = $this->esc($_POST['email']);
    $sql = "SELECT * FROM users WHERE username='$username_new' 		
								AND email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    if ($user) { // if user exists
      if ($user['username'] === $username_new && $user['email'] === $email) {
        $vcode = "";
        $real_code = "";
        $subject = "Blog Website Email Verification";
        $code = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
        $body = "Your Verification Code is : " . $code;
        $_SESSION['code'] = $code;
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "XXXXXX@gmail.com";
        $mail->Password = "XXXXXX";
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email);
        if ($mail->Send()) {
          return $s = "true";
        } else {
          return $s = "false";
        }
      }
    }
  }
  function verifyCode()
  {
    global $conn, $newCode, $username_new, $email;
    $username_new = $this->esc($_POST['username']);
    $email = $this->esc($_POST['email']);
    $vcode = $_POST['code'];
    $real_code = $_SESSION['code'];
    if ($real_code == $vcode) {
      return $v = "true";
    } else {
      return $v = "false";
    }
  }
  function changePassword()
  {
    global $conn, $username_new, $email;
    $username_new = $this->esc($_POST['username']);
    $email = $this->esc($_POST['email']);
    $password_1 = $_POST['new_pass'];
    $password_2 = $_POST['confirm_pass'];
    if ($password_1 === $password_2) {
      $password = md5($password_1); //encrypt the password
      $query = "UPDATE users SET password='$password', updated_at=now() WHERE username='$username_new' AND email='$email'";
      $result = mysqli_query($conn, $query);
      if ($result) {
        header('location: login.php');
      }
    } else {
      array_push($errors, "Passwords do not match");
    }
  }
  function esc(String $value)
  {
    global $conn;
    $val = trim($value);
    $val = mysqli_real_escape_string($conn, $value);
    return $val;
  }
}