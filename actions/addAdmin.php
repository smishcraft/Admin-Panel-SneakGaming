<?php
include('../template-parts/session.php');
require '../config.php';
require '../functions.php';

$username = $_GET['username'];
$password = $_GET['password'];
$password = password_hash($password, PASSWORD_DEFAULT);
$rank = $_GET['rank'];

//if(isValidCsrfToken($_GET['csrfToken'])) {
  $sql = "INSERT INTO admins (username,password,rank) VALUES  ( '{$username}' , '{$password}' , '{$rank}')";
  if($link->query($sql) === TRUE){
    header('location: /admin/manage-admins.php?action=done');
  }else{
    header('location: /admin/manage-admins.php?action=failed&sql='. $sql );
  }
//}else{
  //echo 'Invalid token';
//}
