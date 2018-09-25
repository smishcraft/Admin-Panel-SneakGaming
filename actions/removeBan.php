<?php
include('../template-parts/session.php');
require '../config.php';
require '../functions.php';

$banid = $_GET['banid'];

$sql = "DELETE FROM ".USERS_BANNED_TABLE." WHERE ".USERS_BANNED_ID_COLUMN." = '{$banid}' ";

//if(isValidCsrfToken($_GET['csrfToken'])) {
  if ($link->query($sql) === TRUE) {
      echo "Ban removed";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
//}else{
  //echo 'token invalid: ' . $_GET['csrfToken'];
//}
