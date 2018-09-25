<?php
require '../config.php';
if($_GET['key'] != KEY){
  echo 'Access denied';
  exit;
}

$userSql = " SELECT * FROM ".USERS_TABLE." WHERE ".USERS_TABLE.".".USERS_TABLE_COLUM_ONLINE." = 1";
$resultUser = $link->query($userSql);
while($user = mysqli_fetch_object($resultUser)){
  $timePlayed = $user->timeplayed + 1;
  $updateSql = " UPDATE ".USERS_TABLE." SET ".USERS_TABLE.".".USERS_TABLE_COLUM_TIMEPLAYED." = '{$timePlayed}' WHERE ".USERS_TABLE.".".USERS_TABLE_COLUM_ONLINE." = 1 AND ".USERS_TABLE.".".USERS_TABLE_COLUM_ID." = '{$user->id}' ";
  $link->query($updateSql);
}
