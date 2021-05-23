<?php
session_start();
// $viewName = $_GET['url'];

require ('../classes/migrationDB.php');
require ('../classes/function.php');

$start = 0;
$end = 950;

$wallets =  DB::query("SELECT `wallet` FROM `settlement_tb` WHERE `details`!='ready' AND `dir`> '$start' AND `dir`< '$end' ");

foreach ($wallets as $wallet) {
  $refName = $wallet['wallet'];
  // $investorID = $investment['investor_id'];
  // $refID = $investment['dir'];
  echo '; '.$refName.': ';
  // print_r(DB::count("SELECT `id` FROM `user` WHERE `username`='$refName'"));
  if (DB::count("SELECT * FROM `wallet` WHERE `wallet`='$refName' AND `details` != 'SETTLED'") > 0) {
    $refReturns = DB::query("SELECT `available`,`coin` FROM `wallet` WHERE `wallet` ='$refName' AND `details` != 'SETTLED';");
    foreach ($refReturns as $refReturn) {
      // code...
      // $refReturn = $refReturns;
      $available = $refReturn['available'];
      $coin = $refReturn['coin'];
      // $details = $refReturn['details']." SETTLED";

      print_r($refReturn);
      echo ' - H3r';
        // code...
        DB::query("UPDATE `settlement_tb` SET `wallet_balance`='$available',`reserved`='$coin',`details`='ready' WHERE `wallet` = '$refName';");

        DB::query("UPDATE `wallet` SET `details`='SETTLED' WHERE `wallet` = '$refName';");


    }

    echo ' - Fixed.  ';
  }

}
echo 'Done';

?>
