<?php
session_start();
include('./includes/header.php')

?>


<?php

if (isset($_SESSION['message'])) {
?>
  <strong>
    <?= $_SESSION['message'] ?>
  </strong>
<?php
  unset($_SESSION['message']);
}

?>

<ul>
  <li>home</li>
  <li>about</li>
  <?php
  if (isset($_SESSION['auth'])) {
  ?>
    <li><a href="./profile"><?= $_SESSION['auth_user']['name']; ?></a></li>
    <li>
      <a href="./logout.php">Logout</a>
    </li>
  <?php


  } else {
  ?>
    <li>
      <a href="./register.php">Register</a>
    </li>
    <li>
      <a href="./login.php">Login</a>
    </li>
  <?php
  }
  ?>

</ul>
</body>

</html>