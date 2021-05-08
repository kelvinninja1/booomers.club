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
$a = 1;

while ($a < 936) {
  $refName = DB::fetch("SELECT `referer` FROM `user` WHERE `id`='$a'")[0][0];
  // print_r(DB::count("SELECT `id` FROM `user` WHERE `username`='$refName'"));
  if (DB::count("SELECT `id` FROM `user` WHERE `username`='$refName'") > 0) {
    $refId = DB::fetch("SELECT `id` FROM `user` WHERE `username`='$refName'")[0][0];
    print_r($refId);
  } else {
    $refId = 441;
  }
  $query = "UPDATE `referal_tb` SET `referer`='$refId' WHERE `referee` = '$a'";
  // code...
  DB::query($query);
  $a++;
}
echo 'Done';

?>
