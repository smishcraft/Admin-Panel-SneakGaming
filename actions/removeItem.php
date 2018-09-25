<?php
include('../template-parts/session.php');
require '../config.php';
require '../functions.php';

$itemID = $_GET['itemid'];

//if(isValidCsrfToken($_GET['csrfToken'])) {
  $sql = "UPDATE user_inventory SET count = '0' WHERE id = '{$itemID}'";

  if ($link->query($sql) === TRUE) {
      echo "Item deleted";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
//}
