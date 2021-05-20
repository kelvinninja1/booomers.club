<?php
$page = 1;
// TODO: Makke State Dynamic by admin settings
$promoObserveState = "off";
$promoRate = 10;

// $requests_no = DB::count("SELECT * FROM `settlement_tb` WHERE `from_id` = '$requestUser' AND `status` = 'issued' OR `to_id` = '$requestUser' AND `status` = 'confirmed'");
// if ($requests_no > 0) {
// $settlement_tb = DB::fetch("SELECT * FROM `settlement_tb` WHERE `from_id` = '$requestUser' AND `status` = 'issued' OR `to_id` = '$requestUser' AND `status` = 'confirmed'");
// }



$fundStats = array();
$fundStats['total'] = DB::count("SELECT * FROM `settlement_tb` WHERE 1");
$fundStats['totalTotal'] = '<i class="fas fa-database fa-sm fa-fw"></i>'.DB::fetch("SELECT SUM(`set_total`) FROM `settlement_tb` WHERE 1")[0][0];
$fundStats['proccessed'] = DB::count("SELECT * FROM `settlement_tb` WHERE `status` = 'settled'");
$fundStats['proccessedTotal'] = '<i class="fas fa-database fa-sm fa-fw"></i>'.DB::fetch("SELECT SUM(`set_total`) FROM `settlement_tb` WHERE `status` = 'settled'")[0][0];
$fundStats['active'] = DB::count("SELECT * FROM `settlement_tb` WHERE `status` = 'ready'");
$fundStats['activeTotal'] = '<i class="fas fa-database fa-sm fa-fw"></i>'.DB::fetch("SELECT SUM(`set_total`) FROM `settlement_tb` WHERE `status` = 'ready'")[0][0];
$fundStats['unsettled'] = DB::count("SELECT * FROM `settlement_tb` WHERE `status` = 'unsettled'");
$fundStats['unsettledTotal'] = '<i class="fas fa-database fa-sm fa-fw"></i>'.DB::fetch("SELECT SUM(`set_total`) FROM `settlement_tb` WHERE `status` = 'unsettled'")[0][0];

$dbAssets = DB::query("SELECT settlement_tb.set_total, settlement_tb.set_date, settlement_tb.last_date, settlement_tb.dir, users_tb.username  FROM `settlement_tb`, `users_tb` WHERE settlement_tb.status = 'ready'
AND users_tb.id = settlement_tb.user_id");



function doSettlementMaths($amount){
  // code...
  $assetData = array();
  $assetData['capital'] = $amount;
  if ($amount < 50) {
    // code...
    $assetData['rate'] = 10;
    $assetData['cycles'] = 5; //6 months
    $assetData['days'] = 183;
    $assetData['plan'] = 2;
  } elseif (50 > $amount && $amount < 100) {
    // code...
    $assetData['rate'] = 6.5;
    $assetData['cycles'] = 8; //9 Months
    $assetData['days'] = 275;
    $assetData['plan'] = 3;
  } elseif (100 > $amount && $amount < 200) {
    // code...
    $assetData['rate'] = 5;
    $assetData['cycles'] = 11; //1 Year
    $assetData['days'] = 366;
    $assetData['plan'] = 4;
  } elseif (200 > $amount && $amount < 500) {
    // code...
    $assetData['rate'] = 4;
    $assetData['cycles'] = 17; //1.5 Years
    $assetData['days'] = 549;
    $assetData['plan'] = 5;
  } elseif (500 > $amount && $amount < 1000) {
    // code...
    $assetData['rate'] = 3;
    $assetData['cycles'] = 23; //2 Years
    $assetData['days'] = 732;
    $assetData['plan'] = 6;
  } elseif (1000 > $amount && $amount < 1500) {
    // code...
    $assetData['rate'] = 2;
    $assetData['cycles'] = 35; //3 Years
    $assetData['days'] = 1098;
    $assetData['plan'] = 7;
  } elseif (1500 > $amount && $amount < 2000) {
    // code...
    $assetData['rate'] = 1.5;
    $assetData['cycles'] = 47; //4 Years
    $assetData['days'] = 1464;
    $assetData['plan'] = 8;
  } else {
    // code...
    $assetData['rate'] = 1.25;
    $assetData['cycles'] = 59; //5 Years
    $assetData['days'] = 1830;
    $assetData['plan'] = 8;
  }

  return $assetData;
}
?>

<?php
function get_asset($assetData, $requestUser) {
  // code...investments_tb
  // $page=1;
  $capital = $assetData['capital'];
  $investPlan = $assetData['plan'];

    if ($capital) {

      $rate = $assetData['rate'];
      $cycles = $assetData['cycles'];
      $days = $assetData['days'];
      // $plan_id = $plan['dir'];
      $return_days = 31;
      $total_return_days = 31 * $cycles;
      $cycle = "1/".$cycles;

      $init_date = date('Y/m/d H:m:s');
      $return_days_Str = $return_days . " days";

      $date = date_create($init_date);
      date_add($date , date_interval_create_from_date_string($return_days_Str));
      $mat_date = date_format($date,"Y/m/d H:m:s");

      $returns = ($rate/100) * $capital;

      $bonus = 0;
      $continue = true;

      if ($continue==true) {
        // code...
        DB::query("INSERT INTO `investments_tb` (`plan`, `investor_id`, `capital`, `returns_monthly`, `cycles`, `cur_cycle`, `bonus`, `status`) VALUES (:investPlan, :userid, :capital, :returns, :cycles, 1, :bonus, 'invested')", array(':investPlan'=>$investPlan, ':userid'=>$requestUser, ':capital'=>$capital, ':returns'=>$returns, ':cycles'=>$cycles, ':bonus'=>$bonus));

        $investment_id = DB::fetch("SELECT `dir` FROM `investments_tb` WHERE `status`='invested' ORDER BY `dir` desc LIMIT 1")[0]['dir'];

        DB::query("INSERT INTO `returns_tb`(`investor_id`, `investment_id`, `initial_date`, `mature_date`, `returns`, `cycle`, `status`) VALUES (:userid, :investment_id, :init_date, :mat_date, :returns, :cycle, 'growing')", array(':userid'=>$requestUser, ':investment_id'=>$investment_id, ':init_date'=>$init_date, ':mat_date'=>$mat_date, ':returns'=>$returns, ':cycle'=>$cycle));

        DB::query("UPDATE `investments_tb` SET `status`='active' WHERE `dir`=:investment_id AND `status`='invested'", array(':investment_id'=>$investment_id));

        // TODO: Check if account is inactive
        if (DB::count("SELECT * FROM `status_tb` WHERE `user_id` = :userid AND `account` = 'inactive'", array(':userid'=>$requestUser)) > 0) {
          // code...
          // TODO: Check if referal status is unsettled
          if (DB::count("SELECT * FROM `referal_tb` WHERE `status` = 'unsettled' AND `referee` = :userid", array(':userid'=>$requestUser)) > 0) {
            // code...
            // TODO: Get Referers ID
            $userRefererID = DB::fetch("SELECT `referer` FROM `referal_tb` WHERE `status` = 'unsettled' AND `referee` = :userid", array(':userid'=>$requestUser))[0][0];

            // TODO: Add up to the referers referals Bonus
            DB::query("UPDATE `wallet` SET `bonus`=`bonus`+1 WHERE `user_id` = :userRefererID", array(':userRefererID'=>$userRefererID));

            // TODO: change status on the referals_tb to Settled
            DB::query("UPDATE `referal_tb` SET `status`='settled' WHERE `referee` = :userid", array(':userid'=>$requestUser));

            // TODO: Update Timeline
            $msg = '+<i class="fas fa-database fa-sm fa-fw"></i>1.00 Referal Bonus';
            DB::query("INSERT INTO `timeline_tb` (`user_id`,`activity`,`act_type`) VALUES (:userRefererID,:msg,'fund');", array(':userRefererID'=>$userRefererID, ':msg'=>$msg));
          }

          // TODO: if its not active change status to active
          DB::query("UPDATE `status_tb` SET `account`='active' WHERE `user_id` = :userid", array(':userid'=>$requestUser));

          // TODO: Update Timeline
          $msg = 'Account is now Active';
          DB::query("INSERT INTO `timeline_tb` (`user_id`,`activity`,`act_type`) VALUES (:userid,:msg,'acc');", array(':userid'=>$requestUser, ':msg'=>$msg));
        }
        // TODO: Update Timeline
          $msg = '<i class="fas fa-database fa-sm fa-fw"></i>'.$capital.' Asset acquired successfully (Settlement Claim)';
          DB::query("INSERT INTO `timeline_tb` (`user_id`,`activity`,`act_type`) VALUES (:userid,:msg,'asset');", array(':userid'=>$requestUser, ':msg'=>$msg));
      }

      return True;
    } else {
      return False;
    }


  // SELECT * FROM `wallet` WHERE `available`+`reserved` >= 1

}


if (isset($_REQUEST['action'])) {
  // code...
  $action = $_REQUEST['action'];
  $requestID = $_REQUEST['Fund'];


  // TODO: Check if Request is still valid
  if (DB::count("SELECT * FROM `settlement_tb` WHERE `dir` = :requestID AND `status` = 'ready'", array(':requestID'=>$requestID)) > 0) {
    // code...
    // TODO: Get Data from request_tb with requestID
    $requestData = DB::fetch("SELECT * FROM `settlement_tb` WHERE `dir` = :requestID AND `status` = 'ready'", array(':requestID'=>$requestID))[0];
    // TODO: From Data get Amount, userID, request
    $requestAmount = $requestData['set_total'];
    $requestUser = $requestData['user_id'];



    if ($action == "approve") {
      // code...
      $is_settled = get_asset(doSettlementMaths($requestAmount), $requestUser);
      if ($is_settled) {
        // code...
          DB::query("UPDATE `settlement_tb` SET `status`='settled' WHERE `dir` = :requestID", array(':requestID'=>$requestID));
      }


    } elseif ($action == "reject") {
      // code...
      // TODO: Update request tb change status to failed
      DB::query("UPDATE `settlement_tb` SET `status`='unsettled' WHERE `dir` = :requestID", array(':requestID'=>$requestID));

      // TODO: Update Timeline
        $msg = '<i class="fas fa-database fa-sm fa-fw"></i>'.$requestAmount.' fund Failed(Settlement Claim)';
        DB::query("INSERT INTO `timeline_tb` (`user_id`,`activity`,`act_type`) VALUES (:requestUser,:msg,'settlement');", array(':requestUser'=>$requestUser, ':msg'=>$msg));

    }

  }



// exit;




  header('location: ../admin/manageSettlements');

}


?>
