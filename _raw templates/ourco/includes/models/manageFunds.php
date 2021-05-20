<?php
$page = 1;
// TODO: Makke State Dynamic by admin settings
$promoObserveState = "off";
$promoRate = 10;

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


$fundStats = array();
$fundStats['total'] = DB::count("SELECT * FROM `requests_tb` WHERE `request` = 'fund'");
$fundStats['proccessed'] = DB::count("SELECT * FROM `requests_tb` WHERE `status` = 'success' AND `request` = 'fund'");
$fundStats['active'] = DB::count("SELECT * FROM `requests_tb` WHERE `status` = 'pending' AND `request` = 'fund'");
$fundStats['failed'] = DB::count("SELECT * FROM `requests_tb` WHERE `status` = 'failed' AND `request` = 'fund'");

$dbAssets = DB::query("SELECT requests_tb.ref, requests_tb.amount, requests_tb.init_date, requests_tb.exp_date, requests_tb.id, users_tb.username  FROM `requests_tb`, `users_tb` WHERE requests_tb.request = 'fund'
AND  `status` = 'pending'
AND users_tb.id = requests_tb.user_id");

$dbReturns = DB::query('select * from `returns_tb` where investor_id = :userid order by id desc', array(':userid'=>$userid));
?>

<?php

if (isset($_REQUEST['action'])) {
  // code...
  $action = $_REQUEST['action'];
  $requestID = $_REQUEST['Fund'];


  // TODO: Check if Request is still valid
  if (DB::count("SELECT * FROM `requests_tb` WHERE `id` = :requestID AND `status` = 'pending' AND `request` = 'fund'", array(':requestID'=>$requestID)) > 0) {
    // code...
    // TODO: Get Data from request_tb with requestID
    $requestData = DB::fetch("SELECT * FROM `requests_tb` WHERE `id` = :requestID AND `status` = 'pending' AND `request` = 'fund'", array(':requestID'=>$requestID))[0];
    // TODO: From Data get Amount, userID, request
    $requestAmount = $requestData['amount'];
    $requestUser = $requestData['user_id'];
    $requestAction = $requestData['request'];


    if ($action == "approve") {
      // code...

      // TODO: if Promo is on generate promo% as points rounded to the nearest ourco
      if ($promoObserveState == "on") {
        // code...
        $pointsMax = round(($requestAmount/100) * $promoRate);
        $promoPoints = rand(1,$pointsMax);
      }

      // TODO: check if fund exist if not insert into funds_tb
      if (DB::count("SELECT * FROM `funds_tb` WHERE `request_id` = :requestID", array(':requestID'=>$requestID)) < 1) {
        // code...
        DB::query("INSERT INTO `funds_tb`(`request_id`, `user_id`, `amount`, `action`, `status`) VALUES (:requestID,:requestUser,:requestAmount,:requestAction,'success')", array(':requestID'=>$requestID, ':requestUser'=>$requestUser, ':requestAmount'=>$requestAmount,':requestAction'=>$requestAction));

        // TODO: Update request tb change status to success
        DB::query("UPDATE `requests_tb` SET `status`='success' WHERE `id` = :requestID", array(':requestID'=>$requestID));
        // TODO: if fund is inserted Update Wallet with fund and Points
        DB::query("UPDATE `wallet` SET `available`= `available` + :requestAmount,`points`= `points` + :promoPoints WHERE `user_id` = :requestUser", array(':requestAmount'=>$requestAmount,':promoPoints'=>$promoPoints,':requestUser'=>$requestUser));
        // TODO: Update Timeline
          $msg = '<i class="fas fa-database fa-sm fa-fw"></i>'.$requestAmount.' fund was successful';
          DB::query("INSERT INTO `timeline_tb` (`user_id`,`activity`,`act_type`) VALUES (:requestUser,:msg,:requestAction);", array(':requestUser'=>$requestUser, ':msg'=>$msg, ':requestAction'=>$requestAction));
        // TODO: Maybe Get Data from wallet
      }



    } elseif ($action == "reject") {
      // code...
      // TODO: Update request tb change status to failed
      DB::query("UPDATE `requests_tb` SET `status`='failed' WHERE `id` = :requestID", array(':requestID'=>$requestID));

      // TODO: Update Timeline
        $msg = '<i class="fas fa-database fa-sm fa-fw"></i>'.$requestAmount.' fund Failed';
        DB::query("INSERT INTO `timeline_tb` (`user_id`,`activity`,`act_type`) VALUES (:requestUser,:msg,:requestAction);", array(':requestUser'=>$requestUser, ':msg'=>$msg, ':requestAction'=>$requestAction));

    }

  }



// exit;




  header('location: ../admin/manageFunds');

}


?>
