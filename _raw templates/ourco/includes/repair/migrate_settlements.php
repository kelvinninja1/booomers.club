<?php
session_start();
// $viewName = $_GET['url'];

require ('../classes/migrationDB.php');
require ('../classes/function.php');

$start = 0;
$end = 950;

$investments =  DB::query("SELECT `wallet` FROM `settlement_tb` WHERE `details`!='awaiting' AND `dir`> '$start' AND `dir`< '$end' ");

foreach ($investments as $investment) {
  $refName = $investment['wallet'];
  // $investorID = $investment['investor_id'];
  // $refID = $investment['dir'];
  echo '; '.$refName.': ';
  // print_r(DB::count("SELECT `id` FROM `user` WHERE `username`='$refName'"));
  if (DB::count("SELECT * FROM `returns_tb` WHERE `investor`='$refName' AND `details` != 'cleared'") > 0) {
    $refReturns = DB::query("SELECT `cur_value`,`returns`,`details` FROM `returns_tb` WHERE `investor` ='$refName' AND `details` != 'cleared';");
    foreach ($refReturns as $refReturn) {
      // code...
      // $refReturn = $refReturns;
      $cur_value = $refReturn['cur_value'];
      $returns = $refReturn['returns'];
      $details = $refReturn['details']." SETTLED";

      print_r($refReturn);

      if ($details == 'matured SETTLED') {
        // code...
        DB::query("UPDATE `settlement_tb` SET `investment`=`investment`+'$cur_value',`profit`='$returns',`details`='awaiting' WHERE `wallet` = '$refName';");

        DB::query("UPDATE `returns_tb` SET `details`='$details' WHERE `investor` = '$refName';");

        echo ' if -  '.$details;
      } else {
        // code...
        DB::query("UPDATE `settlement_tb` SET `investment`=`investment`+'$cur_value',`profit_cut`='$returns',`details`='awaiting' WHERE `wallet` = '$refName';");

        DB::query("UPDATE `returns_tb` SET `details`='$details' WHERE `investor` = '$refName';");

        echo ' else -  '.$details;
      }


    }

    echo ' - Fixed.  ';
  }

}
echo 'Done';

?>
