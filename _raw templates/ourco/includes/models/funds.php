<?php
$page = 0;


// print_r($minFundAmount);

function ref_generate(){
    global $con;
    $generated_ref = rand(100000,999999);
    $ref_pin_query = DB::query("SELECT * from `requests_tb` where `ref` = '$generated_ref' and `status` != 'approved'");
    if(mysqli_num_rows($ref_pin_query)>0){
        ref_generate();
    } else{
        return $generated_ref;
    }
}

$referals = DB::fetch("SELECT * FROM `referal_tb` WHERE `referee`='$userid' OR `referer`='$userid'");
$dbreferals = DB::query('SELECT referal_tb.referer, referal_tb.referee, referal_tb.status, users_tb.`username` FROM users_tb, referal_tb
WHERE users_tb.id = referal_tb.referer
AND referal_tb.referee = :userid
OR users_tb.id = referal_tb.referee
AND referal_tb.referer = :userid;', array(':userid'=>$userid));
// print_r($referals);





$dbFunds = DB::query('select * from `funds_tb` where user_id = :userid order by id desc', array(':userid'=>$userid));

// $dbRequests = DB::query("SELECT * from `requests_tb` where `user_id` = :userid AND `status`='issued' OR `user_id` = :userid AND `status`='pending' order by id desc", array(':userid'=>$userid

$dbRequests = DB::query("SELECT requests_tb.exp_date, requests_tb.id, requests_tb.request, requests_tb.status, requests_tb.ref, requests_tb.amount, requests_tb.method, payment_plans.account_type, payment_plans.type, payment_plans.plan_name, payment_plans.def_currency, currency_tb.symbol from requests_tb, payment_plans, currency_tb
  where requests_tb.user_id = :userid
  AND requests_tb.status= 'issued'
  AND payment_plans.dir = requests_tb.method
  AND currency_tb.code = payment_plans.def_currency
  OR requests_tb.user_id = :userid
  AND requests_tb.status= 'pending'
  AND payment_plans.dir = requests_tb.method
  AND currency_tb.code = payment_plans.def_currency order by id desc", array(':userid'=>$userid));
?>

<?php
//echo '<script> alert("hey '.print_r($requests_tb).'")</script>';



if (isset($_REQUEST['fund'])) {
  // code...
  $fund = $_REQUEST['fund'];

    if ($fund=='add') {
      // code...
      // echo 'Add Funds';
      $dbPlans = DB::query("SELECT * from `payment_plans` where `status` = 'enabled' AND `dir` != '$userPayMethodID' AND `supports`='all' AND `account_type` != 'user-defined' or `status` = 'enabled' AND `dir` != '$userPayMethodID' AND `supports` = '$user_Country' AND `account_type` != 'user-defined'");
      $page=1;

    } elseif ($fund=='withdraw') {
      // code...
      // echo 'Withdraw';
      $page=2;

    } elseif ($fund=='confirm') {
      // code...
      $request = $_REQUEST['request'];

      $requestData = DB::fetch("SELECT `amount`, `request`, `status` FROM `requests_tb` WHERE `id`=:request", array(':request'=>$request))[0];
      $requestAmount = $requestData['amount'];
      $requestType = $requestData['request'];
      $requestStatus = $requestData['status'];
      $balance = $powerwallet['available'];
      if ($requestType == 'withdraw') {
        // code...
        if ($balance >= $requestAmount) {
          // code...
          DB::query("UPDATE `wallet` SET `available`=`available`-:requestAmount WHERE `user_id`=:userid", array(':requestAmount'=>$requestAmount, ':userid'=>$userid));

        } else {
          // code...
          DB::query("UPDATE `requests_tb` SET `status`='cancelled' WHERE `id`=:request", array(':request'=>$request));

          header('location: ../pages/funds');
          exit;
        }
      }

      DB::query("UPDATE `requests_tb` SET `status`='pending' WHERE `id`=:request", array(':request'=>$request));

      header('location: ../pages/funds');
      exit;

    } elseif ($fund=='cancel') {
      // code...
      $request = $_REQUEST['request'];
      DB::query("UPDATE `requests_tb` SET `status`='cancelled' WHERE `id`=:request", array(':request'=>$request));
      header('location: ../pages/funds');
    }
    //header('location: ../pages/funds');
  }


  if (isset($_REQUEST['submit'])) {
    // code...
    $submit = $_REQUEST['submit'];
    $amount = MONEY::cur_convert($user_currency, 'ourco', $_REQUEST['amount'], 0);
    $ref = ref_generate();
    $return_days = 1;
    $init_date = date('Y-m-d H:m:s');
    $return_days_Str = $return_days . " days";

    $date = date_create($init_date);
    date_add($date , date_interval_create_from_date_string($return_days_Str));
    $exp_date = date_format($date,"Y-m-d H:m:s");

      if ($submit=='Add Funds') {
        // code...
        $method = $_REQUEST['pay_method'];

        DB::query("INSERT INTO `requests_tb`(`ref`, `request`, `user_id`, `amount`, `exp_date`, `method`) VALUES (:ref,'fund',:userid,:amount,:exp_date,:method)", array(':userid'=>$userid,':method'=>$method,':ref'=>$ref,':amount'=>$amount,':exp_date'=>$exp_date));


      } elseif ($submit=='Withdraw') {
        // code...
        DB::query("INSERT INTO `requests_tb`(`ref`, `request`, `user_id`, `amount`, `exp_date`, `method`) VALUES (:ref,'withdraw',:userid,:amount,:exp_date,:method)", array(':userid'=>$userid,':method'=>$userPayMethodID,':ref'=>$ref,':amount'=>$amount,':exp_date'=>$exp_date));

      }
      header('location: ../pages/funds');
    }

?>
