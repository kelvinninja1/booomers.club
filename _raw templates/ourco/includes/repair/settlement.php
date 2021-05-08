<?php
session_start();
// $viewName = $_GET['url'];

require ('../classes/DB.php');
require ('../classes/function.php');

// DB::count($query)
// DB::query($query)
// DB::fetch("SELECT `username` FROM `users_tb` WHERE `username`='$ffid'")[0];
//$referer = DB::fetch("SELECT `id` FROM `users_tb` WHERE `username`='$refname'")[0]['id'];
// $a = 935;
$a = 900;

while ($a < 936) {
  $userRow = DB::fetch("SELECT `username`,`currency` FROM `user` WHERE `id`='$a'")[0];
  $userName = $userRow[0];
  $currency = $userRow[1];
   print_r($userRow);
  // if (DB::count("SELECT `id` FROM `user` WHERE `username`='$refName'") > 0) {
  //   $refId = DB::fetch("SELECT `id` FROM `user` WHERE `username`='$refName'")[0][0];
  //   print_r($refId);
  // } else {
  //   $refId = 441;
  // }
  $query = "UPDATE `settlement_tb` SET `wallet`='$userName', `currency`='$currency' WHERE `user_id` = '$a'";
  // code...
  DB::query($query);
  $a++;
}
// TODO: Sum Investments and Co.

echo 'Done';

?>
