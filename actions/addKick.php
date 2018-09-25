<?php
include('../template-parts/session.php');
require '../config.php';
require '../functions.php';

$steamid = $_GET['steamid'];
$reason = $_GET['reason'];

//if(isValidCsrfToken($_GET['csrfToken'])) {
  $sql = "INSERT INTO ".KICKS_TABLE." (".KICKS_COLUMN_STEAMID.",".KICKS_COLUMN_REASON.",".KICKS_COLUMN_KICKED.") VALUES  ( '{$steamid}' , '{$reason}' , '0')";
  if($link->query($sql) === TRUE){
    echo 'done';
  }else{
    echo 'failed';
  }
//}else{
  //echo 'Invalid token';
//}
