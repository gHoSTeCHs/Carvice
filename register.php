<?php

include('includes/header.php')

?>

<?php
session_start();
if (isset($_SESSION['message'])) {
?>
  <strong>
    <?= $_SESSION['message'] ?>
  </strong>
<?php
  unset($_SESSION['message']);
}

?>


<form action="authcode/auth.php" method="POST">
  <div>
    <label for="name">Name</label>
    <input name="name" type="text">
  </div>
  <div>
    <label for="email">Email</label>
    <input type="text" name="email">
  </div>
  <div>
    <label for="password">Password</label>
    <input type="password" name="password">
  </div>
  <div>
    <label for="password">Confirm Password</label>
    <input type="password" name="cpassword">
  </div>


  <button type="submit" name="register_btn">Register</button>
</form>