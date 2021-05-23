<?php
session_start();
// $viewName = $_GET['url'];

require ('../classes/migrationDB.php');
require ('../classes/function.php');

$start = 1;
$end = 950;

$investments =  DB::query("SELECT `wallet` FROM `investments_tb` WHERE `status`='active' AND `dir`> '$start' AND `dir`< '$end' ");

foreach ($investments as $investment) {
  $refName = $investment['wallet'];
  echo '; '.$refName.': ';
  // print_r(DB::count("SELECT `id` FROM `user` WHERE `username`='$refName'"));
  if (DB::count("SELECT * FROM `coin` WHERE `investor`='$refName' AND `status` = 'cleared'") > 0) {
    $refReturns = DB::fetch("SELECT SUM(`cur_value`) AS `capital`, SUM(`potential_return`) AS `returns` FROM `coin` WHERE `investor` ='$refName' AND `status` = 'cleared';")[0];
    $refReturn = $refReturns;
    $cur_value = $refReturns['capital'];
    $returns = $refReturns['returns'];

    print_r($refReturn);

    DB::query("INSERT INTO `returns_tb`(`investor`,`cur_value`, `returns`, `status`) VALUES ('$refName','$cur_value','$returns','cleared');");

  }

  if (DB::count("SELECT * FROM `coin` WHERE `investor`='$refName' AND `status` = 'matured'") > 0) {
    $refReturns = DB::fetch("SELECT SUM(`cur_value`) AS `capital`, SUM(`potential_return`) AS `returns` FROM `coin` WHERE `investor` ='$refName' AND `status` = 'matured';")[0];
    $refReturn = $refReturns;
    $cur_value = $refReturns['capital'];
    $returns = $refReturns['returns'];


    print_r($refReturn);
// exit;
    DB::query("INSERT INTO `returns_tb`(`investor`,`cur_value`, `returns`, `status`) VALUES ('$refName','$cur_value','$returns','matured');");

  }

  if (DB::count("SELECT * FROM `coin` WHERE `investor`='$refName' AND `status` = 'early-cashout'") > 0) {
    $refReturns = DB::fetch("SELECT SUM(`cur_value`) AS `capital`, SUM(`potential_return`) AS `returns` FROM `coin` WHERE `investor` ='$refName' AND `status` = 'early-cashout';")[0];

    $refReturn = $refReturns;
    $cur_value = $refReturns['capital'];
    $returns = $refReturns['returns'];
    print_r($refReturn);

    DB::query("INSERT INTO `returns_tb`(`investor`,`cur_value`, `returns`, `status`) VALUES ('$refName','$cur_value','$returns','early-cashout');");

  }

  //$query = "UPDATE `referal_tb` SET `referer`='$refId' WHERE `referee` = '$a'";
  // code...
  //DB::query($query);
  //$a++;
}
echo 'Done';

?>
<!-- SELECT SUM(`cur_value`) AS `capital`, SUM(`potential_return`) AS `returns` FROM `returns_tb` WHERE `investor` ='$refName' AND `status` = 'cleared';
SELECT SUM(`cur_value`) AS `capital`, SUM(`potential_return`) AS `returns` FROM `returns_tb` WHERE `investor` ='$refName' AND `status` = 'matured';
SELECT SUM(`cur_value`) AS `capital`, SUM(`potential_return`) AS `returns` FROM `returns_tb` WHERE `investor` ='$refName' AND `status` = 'early-cashout'; -->
