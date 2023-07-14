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
    <label for="email">Email</label>
    <input type="text" name="email">
  </div>
  <div>
    <label for="password">Password</label>
    <input type="password" name="password">
  </div>


  <button type="submit" name="login_btn">Login</button>
</form>