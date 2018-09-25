<?php
include('../template-parts/session.php');
require '../config.php';
require '../functions.php';

$id = $_GET['adminid'];

$sql = "DELETE FROM admins WHERE id = '{$id}' ";

//if(isValidCsrfToken($_GET['csrfToken'])) {
  if ($link->query($sql) === TRUE) {
      echo "Admin deleted";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
//}
