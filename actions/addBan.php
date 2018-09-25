<?php
include('../template-parts/session.php');
require '../config.php';
require '../functions.php';

$steamid = $_GET['steamid'];
$reason = ($_GET['reason'] == '' ? 'No reason specified' : $_GET['reason']);
$license = $_GET['license'];
$username = $_GET['username'];
$timestamp = strtotime('now');
$byadmin = $_GET['bannedby'];
$reason = $reason . ' ( Nickname: '.$username.' ), Banned by: '  . $byadmin;

//if(isValidCsrfToken($_GET['csrfToken'])) {
  $timestap = strtotime("now");
  $checkSql = "SELECT identifier, steam FROM ea_bans WHERE identifier = '{$license}' OR steam = '{$steamid}'";
  $resultCheck = $link->query($checkSql);
  $resultCheckCount = $resultCheck->num_rows;

  if(!empty($_GET['actionbyuser'])){
    if(!empty($_GET['expires'])){
      $expireselect = $_GET['expires'];
      if($expireselect == '1d'){
        $bantime = strtotime("+1 days");
      }elseif($expireselect == '2d'){
        $bantime = strtotime("+2 days");
      }elseif($expireselect == '3d'){
        $bantime = strtotime("+3 days");
      }elseif($expireselect == '1w'){
        $bantime = strtotime("+7 days");
      }elseif($expireselect == '2w'){
        $bantime = strtotime("+14 days");
      }elseif($expireselect == '3w'){
        $bantime = strtotime("+21 days");
      }elseif($expireselect == '1m'){
        $bantime = strtotime("+31 days");
      }elseif($expireselect == '2m'){
        $bantime = strtotime("+62 days");
      }elseif($expireselect == '3m'){
        $bantime = strtotime("+90 days");
      }elseif($expireselect == '6m'){
        $bantime = strtotime("+184 days");
      }elseif($expireselect == '1y'){
        $bantime = strtotime("+365 days");
      }elseif($expireselect == 'perma'){
        $bantime = strtotime("+865 days");
      }else{
        $bantime = strtotime("+865 days");
      }
    }else{
      $bantime = strtotime("+765 days");
    }
  }else{
    $bantime = strtotime("+765 days");
  }

  if($resultCheckCount > 0){
    echo 'User already banned';
    if(!empty($_GET['userid'])){
      header('location: /admin/view-user.php?userid='.$_GET['userid'].'&action=error1');
    }
  }else{
    $userid = $_GET['userid'];
    $sql = "INSERT INTO ea_bans (expire, identifier, steam, reason, steamname) VALUES ( '{$bantime}', '{$license}', '{$steamid}' , '{$reason}', '{$username}'  )";
    $sql3 = "INSERT INTO received_bans (reason, byadmin, ban_expires, banned_on, userid) VALUES ( '{$reason}', '{$byadmin}', '{$bantime}' , '{$timestamp}', '{$userid}'  )";

    if ($link->query($sql) === TRUE && $link->query($sql3) === TRUE) {
        echo "New ban record created successfully";
        if( isUserOnline($steamid) == true ){
        $sql2 = "INSERT INTO kicks (steamid,reason,kicked) VALUES  ( '{$steamid}' , '{$reason}' , '0')";
          if ($link->query($sql2) === TRUE) {
              echo "New kick record created successfully";
          }
        }
        if(!empty($_GET['userid'])){
          header('location: /admin/view-user.php?userid='.$_GET['userid'].'&action=done');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        if(!empty($_GET['userid'])){
          header('location: /admin/view-user.php?userid='.$_GET['userid'].'&action=error');
        }
    }

  }
// }else{
//   header('location: /admin/view-user.php?userid='.$_GET['userid'].'&action=invalid');
// }
