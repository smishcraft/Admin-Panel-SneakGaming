<?php
include('../template-parts/session.php');
require '../config.php';
require '../functions.php';

$weaponId = $_GET['weaponid'];
$userid = $_GET['steamid'];

//if(isValidCsrfToken($_GET['csrfToken'])) {
  $sql = "SELECT loadout,id FROM users WHERE id = '{$userid}'";
  $result = $link->query($sql);

  while($user = mysqli_fetch_object($result)){
    $loadout = $user->loadout;
  }

  $loadout = json_decode($loadout, true);
  unset($loadout[$weaponId]);
  $loadout = json_encode( $loadout ,true);


  $sqlRemove = "UPDATE users SET loadout = '{$loadout}' WHERE id = '{$userid}'";
  if ($link->query($sqlRemove) === TRUE) {
      echo "Loadout updated";
      echo $loadout;
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
// }else{
//   echo 'invalid token: '. $_GET['csrfToken'];
// }
