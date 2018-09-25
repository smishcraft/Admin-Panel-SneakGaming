<?php
session_start();
if($_SESSION["loggedin"] === false or empty($_SESSION['loggedin'])  ){
  header("location: http://145.131.6.71/admin/page-login.php");
  exit;
}
