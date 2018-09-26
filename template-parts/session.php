<?php
session_start();
if($_SESSION["loggedin"] === false or empty($_SESSION['loggedin'])  ){
  header("location: /admin/page-login.php");
  exit;
}
