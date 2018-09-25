<?php
require '../config.php';
require '../functions.php';

if($_GET['key'] != KEY){
  echo 'Access denied';
  exit;
}

$antiCheatSql = " SELECT * FROM ".USERS_TABLE."";
$resultACS = $link->query($antiCheatSql);
while($userData = mysqli_fetch_object($resultACS)){
  $userId = $userData->id;
  $steamname = $userData->name;
  $money = $userData->money;
  $bank = $userData->bank;
  $steamid = $userData->identifier;
  $license = $userData->license;
  $timePlayed = ($userData->timeplayed != null ? $userData->timeplayed  : 0 );

  if($timePlayed > 131400){
    $maxMoney = MAXIMUM_MONEY_3M;
  }elseif($timePlayed > 43800){
    $maxMoney = MAXIMUM_MONEY_1M;
  }elseif($timePlayed > 10080){
    $maxMoney = MAXIMUM_MONEY_1W;
  }elseif($timePlayed > 4320){
    $maxMoney = MAXIMUM_MONEY_3D;
  }elseif($timePlayed > 1440){
    $maxMoney = MAXIMUM_MONEY_24H;
  }else{
    $maxMoney = MAXIMUM_MONEY_NEWPLAYER;
  }

  if(checkIfBanned($steamid) == false){

    if($money > $maxMoney or $bank > $maxMoney){
      $CHEATING = true;
    }else{
      $CHEATING = false;
    }

    if($CHEATING == true){

      $reason = 'Cheating/Exploiding ( Nickname: '.$steamname.' ), Banned by: SneakyAntiCheat';
      $isonlineSql = "INSERT kicks (steamid, kicked, reason) VALUES ('".$steamid."','0', '".$steamid."');";
      $updateSql = "INSERT ea_bans (expire, identifier, steam, reason,steamname) VALUES ('1612633133','".$license."', '".$steamid."', '".$reason."', '".$steamname."');";
      $link->query($updateSql);

      if(checkIfOnline($steamid)){
        $link->query($isonlineSql);
      }
    }

  }


}
