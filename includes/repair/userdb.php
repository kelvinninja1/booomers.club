<?php
session_start();
// $viewName = $_GET['url'];

require ('../classes/DB.php');
require ('../classes/function.php');

// DB::count($query)
// DB::query($query)
// DB::fetch("SELECT `username` FROM `users_tb` WHERE `username`='$ffid'")[0];
//$referer = DB::fetch("SELECT `id` FROM `users_tb` WHERE `username`='$refname'")[0]['id'];
$a = 935;
// Referal_tb Done $query = "UPDATE `referal_tb` SET `id`=`referee` WHERE `referee` = '$a'";
// wallet Done $query = "UPDATE `wallet` SET `dir`=`user_id` WHERE `user_id` = '$a'";
// status_tb Done $query = "UPDATE `status_tb` SET `id`=`user_id` WHERE `user_id` = '$a'";
// Payment_acc_tb Done $query = "UPDATE `payment_acc_tb` SET `dir`=`user_id` WHERE `user_id` = '$a'";
// nok_tb Done $query = "UPDATE `nok_tb` SET `id`=`user_id` WHERE `user_id` = '$a'";
// login_tb Done $query = "UPDATE `login_tb` SET `id`=`user_id` WHERE `user_id` = '$a'";
while ($a > 0) {
  $query = "UPDATE `settlement_tb` SET `dir`=`user_id` WHERE `user_id` = '$a'";
  // code...
  DB::query($query);
  $a--;
}
echo 'Done';

?>
