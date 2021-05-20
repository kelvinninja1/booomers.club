<?php

// $requests_no = DB::count("SELECT * FROM `requests_tb` WHERE `from_id` = '$userid' AND `status` = 'issued' OR `to_id` = '$userid' AND `status` = 'confirmed'");
// if ($requests_no > 0) {
// $requests_tb = DB::fetch("SELECT * FROM `requests_tb` WHERE `from_id` = '$userid' AND `status` = 'issued' OR `to_id` = '$userid' AND `status` = 'confirmed'");
// }

$referals = DB::fetch("SELECT * FROM `referal_tb` WHERE `referee`='$userid' OR `referer`='$userid'");
$dbreferals = DB::query('SELECT referal_tb.referer, referal_tb.referee, referal_tb.status, users_tb.`username` FROM users_tb, referal_tb
WHERE users_tb.id = referal_tb.referer
AND referal_tb.referee = :userid
OR users_tb.id = referal_tb.referee
AND referal_tb.referer = :userid;', array(':userid'=>$userid));
// print_r($referals);
$dbUserActs = DB::query('SELECT id, activity, act_time, status FROM timeline_tb
WHERE user_id = :userid ORDER BY id DESC;', array(':userid'=>$userid));
?>
<?php
$noRequests = DB::fetch("SELECT COUNT(id) FROM requests_tb WHERE requests_tb.user_id = :userid AND requests_tb.status= 'issued' OR requests_tb.user_id = :userid AND requests_tb.status= 'pending'", array(':userid'=>$userid))[0][0];

  $totalCapital = DB::fetch("SELECT SUM(capital) FROM investments_tb WHERE investor_id = :userid AND status= 'active'", array(':userid'=>$userid))[0][0] + 0;
  $monthlyEarnings = DB::fetch("SELECT SUM(returns_monthly) FROM investments_tb WHERE investor_id = :userid AND status= 'active'", array(':userid'=>$userid))[0][0] + 0;

  $totalStake = ($totalCapital / DB::fetch("SELECT SUM(capital) FROM investments_tb WHERE status= 'active'", array(':userid'=>$userid))[0][0]) * 100;
 ?>
<?php
//echo '<script> alert("hey '.print_r($requests_tb).'")</script>';
if(isset($_POST["proof-submit"])) {
    img::upload('fileToUpload');
// $img1 = img::upload('fileToUpload');
// db_insert($img1, $code);
}

?>
