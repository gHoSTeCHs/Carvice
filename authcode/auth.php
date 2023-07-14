<?php
session_start();

include("../config/config.php");

if (isset($_POST['register_btn'])) {

  $name = mysqli_real_escape_string($con, $_POST['name']);

  $email = mysqli_real_escape_string($con, $_POST['email']);

  $password = mysqli_real_escape_string($con, $_POST['password']);

  $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

  $db_insert_query = "INSERT INTO `users`(`id`, `name`, `email`, `password`) VALUES ('[value-1]','$name','$email','$password')";

  //Check if email exists in Db
  //
  $check_email_query = "SELECT email from `users` WHERE `email` = '$email'";
  $check_email_query_run = mysqli_query($con, $check_email_query);

  if (mysqli_num_rows($check_email_query_run) > 0) {
    //
    $_SESSION['message'] = 'Email already in use';
    header('Location: ../index.php');
  } else {
    //
    if ($password == $cpassword) {
      $db_insert_query_run = mysqli_query($con, $db_insert_query);

      //
      if ($db_insert_query_run) {
        $_SESSION['message'] = 'Registered Sucessfully';
        header('Location: ../login.php');
        //
      } else {
        $_SESSION['message'] = 'Something went wrong';
        header('Location: ../register.php');
      }
      //
    } else {
      $_SESSION['message'] = 'Passwords do not match';
      header('Location: ../register.php');
    }

    // 
  }
  //


} else if (isset($_POST['login_btn'])) {
  $email = mysqli_real_escape_string($con, $_POST['email']);

  $password = mysqli_real_escape_string($con, $_POST['password']);

  $login_query = "SELECT * from users WHERE email='$email' AND password='$password'";
  $login_query_run = mysqli_query($con, $login_query);

  if (mysqli_num_rows($login_query_run) > 0) {
    $_SESSION['auth'] = true;

    $userData = mysqli_fetch_array($login_query_run);

    $username = $userdata['name'];
    $useremail = $userdata['email'];

    $_SESSION['auth_user'] = [
      'name' => $username,
      'email' => $useremail
    ];

    echo $username;

    $_SESSION['message'] = 'Logged in successfully';
    header('Location: ../index.php');
  } else {
    $_SESSION['message'] = 'Invalid Credentials';
    header('Location: ../login.php');
  }
}
