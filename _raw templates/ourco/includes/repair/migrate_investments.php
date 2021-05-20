<?php
session_start();
// $viewName = $_GET['url'];

require ('../classes/migrationDB.php');
require ('../classes/function.php');

$start = 1;
$end = 950;

$investments =  DB::query("SELECT `wallet`,`dir`,`investor_id` FROM `investments_tb` WHERE `status`='active' AND `dir`> '$start' AND `dir`< '$end' ");

foreach ($investments as $investment) {
  $refName = $investment['wallet'];
  $investorID = $investment['investor_id'];
  $refID = $investment['dir'];
  echo '; '.$refName.': ';
  // print_r(DB::count("SELECT `id` FROM `user` WHERE `username`='$refName'"));
  if (DB::count("SELECT * FROM `returns_tb` WHERE `investor`='$refName' AND `status` != 'awaiting'") > 0) {
    $refReturns = DB::fetch("SELECT SUM(`cur_value`) AS `capital`, SUM(`returns`) AS `returns` FROM `returns_tb` WHERE `investor` ='$refName' AND `status` != 'awaiting';")[0];
    $refReturn = $refReturns;
    $cur_value = $refReturns['capital'];
    $returns = $refReturns['returns'];

    print_r($refReturn);

    DB::query("UPDATE `investments_tb` SET `capital`='$cur_value',`returns_monthly`='$returns',`status`='completed' WHERE `wallet` = '$refName';");

    DB::query("UPDATE `returns_tb` SET `investor_id`='$investorID',`investment_id`='$refID',`status`='awaiting' WHERE `investor` = '$refName';");

    echo ' - Fixed.  ';
  }

}
echo 'Done';

?>
