<?php

$localhost = "localhost";
$dataBase = "Carvice";
$username = "root";
$password = "";

$con = mysqli_connect($localhost, $username, $password, $dataBase, 3307);

if (!$con) {
  die('Connection failed: ' . mysqli_connect_error());
}
