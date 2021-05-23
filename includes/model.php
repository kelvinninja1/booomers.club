<?php
// $ref_points = 1;
//     $approvals = 2;
//     $boom_points = 3;
//     $no_refs = 4;
//     $base_url = "localhost/boomers";
//     $username = "ikelvin";
// $userid = 2;

// $base_url = "http://192.168.100.2/boomers";
@$refpage_url = $_SERVER['HTTP_REFERER'];
$base_url = "http://localhost/ourco";
// $base_url = "https://ourcomunity.net";
if($_SESSION){
$userid =  $_SESSION['userid'];
$superpass_id = $_SESSION['id'];
// echo $userid;
$poweruser = DB::fetch("SELECT * FROM `users_tb` WHERE `id`='$userid'")[0];
$powerwallet = DB::fetch("SELECT * FROM `wallet` WHERE `user_id`='$userid'")[0];
$powerwalletInfo = DB::fetch("SELECT * FROM `payment_acc_tb` WHERE `user_id`='$userid'")[0];
$powerstatus = DB::fetch("SELECT * FROM `status_tb` WHERE `user_id`='$userid'")[0];
$accountStatus = $powerstatus['account'];
// print_r($poweruser[0]);
// echo '<script>alert("Hey '.$poweruser.' ")</script>';
$user_currency =  $powerwalletInfo['currency'];

$user_currency_symbol = DB::fetch("SELECT `symbol` FROM `currency_tb` WHERE `code`='$user_currency'")[0][0];
$user_Country=$poweruser['country'];
$userPayMethod = $powerwalletInfo['method'];
$userPayMethodID = $powerwalletInfo['plan_id'];

// $poweruser = DB::fetch("SELECT * FROM `users_tb` WHERE `id`='$userid'")[0];
// $powerlogin = DB::fetch("SELECT * FROM `login_tb` WHERE `user_id`='$userid'")[0];
// $powerwallet = DB::fetch("SELECT * FROM `user_paymethod_tb` WHERE `user_id`='$userid'")[0];

$dbCurrency = DB::query("SELECT * from `currency_tb` order by `currency` asc");

    $mustSettle = 'no';


    if($powerstatus['badge'] == '2019') {
      $cutRate = DB::fetch("SELECT * FROM `settlement_tb` WHERE `user_id`='$userid'")[0]['cut_rate'];
      $feeRate = 40;

      if (DB::count("SELECT * FROM `settlement_tb` WHERE `user_id`='$userid' AND `status`='unsettled'") > 0) {
        // code...
        $mustSettle = 'yes';
      } elseif (DB::count("SELECT * FROM `settlement_tb` WHERE `user_id`='$userid' AND `status`='ready'") > 0) {
        // code...
        $mustSettle = 'ready';
      } elseif (DB::count("SELECT * FROM `settlement_tb` WHERE `user_id`='$userid' AND `status`='settled'") > 0) {
        // code...
        $mustSettle = 'done';
      } else {
        // code...
        $mustSettle = 'no';
      }

      // $mustSettle = (DB::query("SELECT * FROM `settlement_tb` WHERE `user_id`='$userid'")) ? 'yes' : 'no';
      $minActivationFund = (DB::query("SELECT * FROM `settlement_tb` WHERE `user_id`='$userid'")) ? ceil(($cutRate/100)*(DB::fetch("SELECT * FROM `settlement_tb` WHERE `user_id`='$userid'")[0]['investment']/10)) : 10;

      $minActivationFund = ($minActivationFund < 10 ) ? 10 : $minActivationFund;
    }

    if($mustSettle == 'yes') {
      $settlement = DB::fetch("SELECT * FROM `settlement_tb` WHERE `user_id`='$userid'")[0];
      $totalSettle = (($cutRate/100)*($settlement['investment'] + $settlement['wallet_balance'] + $settlement['profit'] + $settlement['reserved'] + $settlement['bonus']))*((100-$feeRate)/100);

      $totalFees = ($totalSettle/100) * $feeRate;
      $cashinTotal = $totalSettle-$totalFees;
    }
    if(isset($_POST["getSettlement"])) {
        ?>
        <script type="text/javascript">
          alert("You To Have an Active Asset or Account To Claim Settlement");
        </script>
        <?php
    }
    $minFundAmount = 10;
    $minCashoutAmount = 10;
    $minAssetFund = 10;

require ('../includes/controller.php');
} else {
  // code...
  header('location: ../logout');
  exit;

}


?>
