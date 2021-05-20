<?php
$page = 1;

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


$withdrawStats = array();
$withdrawStats['total'] = DB::count("SELECT * FROM `requests_tb` WHERE `request` = 'withdraw'");
$withdrawStats['proccessed'] = DB::count("SELECT * FROM `requests_tb` WHERE `status` = 'success' AND `request` = 'withdraw'");
$withdrawStats['active'] = DB::count("SELECT * FROM `requests_tb` WHERE `status` = 'pending' AND `request` = 'withdraw'");
$withdrawStats['failed'] = DB::count("SELECT * FROM `requests_tb` WHERE `status` = 'failed' AND `request` = 'withdraw'");


$dbAssets = DB::query("SELECT requests_tb.ref, requests_tb.amount, requests_tb.init_date, requests_tb.exp_date, requests_tb.id, users_tb.username  FROM `requests_tb`, `users_tb` WHERE requests_tb.request = 'withdraw'
AND  `status` = 'pending'
AND users_tb.id = requests_tb.user_id");
$dbReturns = DB::query('select * from `returns_tb` where investor_id = :userid order by id desc', array(':userid'=>$userid));
?>

<?php
//echo '<script> alert("hey '.print_r($requests_tb).'")</script>';
if(isset($_POST["proof-submit"])) {
    img::upload('fileToUpload');
// $img1 = img::upload('fileToUpload');
// db_insert($img1, $code);
}
if (isset($_REQUEST['choose_plan'])) {
  // code...
  // $page=1;
  $capital = $_POST['invest_amount'];
  // SELECT * FROM `wallet` WHERE `available`+`reserved` >= 1
  if (DB::count("SELECT * FROM `wallet` WHERE `reserved` >= '$capital'")) {
    // code...
    echo 'Reserved';
    $page=2;

  } elseif (DB::count('SELECT * FROM `wallet` WHERE `user_id`=:userid AND `available`+`reserved` >= :capital', array(':userid'=>$userid,':capital'=>$capital))) {
    // code...
    echo 'available + reserved';
    $page=2;
  } else {
    // code...
    $page=0;
  }
  if ($page==2) {
    // code...
    $DBplansNo = DB::count("SELECT * from `investment_plans` where `status` = 'active' AND `min_amount`<=:capital AND `max_amount`>=:capital", array(':userid'=>$userid,':capital'=>$capital));
    if ($DBplansNo > 0) {
      // code...
      $DBplans = DB::query("SELECT * from `investment_plans` where `status` = 'active' AND `min_amount`<=:capital AND `max_amount`>=:capital ORDER BY `dir` desc", array(':userid'=>$userid,':capital'=>$capital));
    }
  }

}

if (isset($_REQUEST['cash'])) {
  // code...
  $cash = $_REQUEST['cash'];

  $capitalID = $_REQUEST['Capital'];
  $dbCapital = DB::query("SELECT investments_tb.dir, investments_tb.bonus, investments_tb.capital, investments_tb.init_date FROM investments_tb
  WHERE investments_tb.dir = :capitalID
  AND investments_tb.status = 'ready'
  AND investments_tb.investor_id = :userid", array(':userid'=>$userid, ':capitalID'=>$capitalID));
  if ($dbCapital->rowCount()>0) {
    // code...
    $capitalData = $dbCapital->fetchAll()[0];

    $capital = $capitalData['capital']+1;
    $bonus = $capitalData['bonus'];
    //$investment_id = $capitalData['dir'];
    //$cycles = $capitalData['cycles'];

    $return_days = 31;
    //$cycle = $cur_cycle."/".$cycles;

    $init_date = $capitalData['init_date'];
    $return_days_Str = $return_days . " days";

    $date = date_create($init_date);
    date_add($date , date_interval_create_from_date_string($return_days_Str));
    $mat_date = date_format($date,"Y-m-d H:m:s");

    //$returns = ($rate/100) * $capital;
    // $bonus = 0;
    if ($cash=='in') {
      // code...
      DB::query("UPDATE `investments_tb` SET `status`='pending', `wallet`='reserved', `end_date`=:mat_date WHERE `dir`=:capitalID AND `status`='ready'", array(':capitalID'=>$capitalID, ':mat_date'=>$mat_date));

    } elseif ($cash=='out') {
      // code...
      DB::query("UPDATE `investments_tb` SET `status`='pending', `wallet`='available', `end_date`=:mat_date WHERE `dir`=:capitalID AND `status`='ready'", array(':capitalID'=>$capitalID, ':mat_date'=>$mat_date));
    }

    DB::query("UPDATE `wallet` SET `bonus`=`bonus`+:bonus WHERE `dir`=:userid", array(':userid'=>$userid,':bonus'=>$bonus));

    header('location: ../pages/assets');
  }

}



if (isset($_REQUEST['cashoutReturn'])) {
  // code...
  $returnID = $_REQUEST['cashoutReturn'];
  $dbReturn = DB::query("SELECT investments_tb.dir, investments_tb.cycles, investments_tb.cur_cycle, returns_tb.returns FROM investments_tb, returns_tb
  WHERE returns_tb.id = :returnID
  AND returns_tb.status = 'matured'
  AND investments_tb.dir = returns_tb.investment_id
  AND investments_tb.investor_id = :userid", array(':userid'=>$userid, ':returnID'=>$returnID));
  if ($dbReturn->rowCount()>0) {
    // code...
    $return = $dbReturn->fetchAll()[0];

    $cur_cycle = $return['cur_cycle']+1;
    $returns = $return['returns'];
    $investment_id = $return['dir'];
    $cycles = $return['cycles'];

    $return_days = 31;
    $cycle = $cur_cycle."/".$cycles;

    $init_date = date('Y/m/d H:m:s');
    $return_days_Str = $return_days . " days";

    $date = date_create($init_date);
    date_add($date , date_interval_create_from_date_string($return_days_Str));
    $mat_date = date_format($date,"Y/m/d H:m:s");

    //$returns = ($rate/100) * $capital;
    $bonus = 0;

    DB::query("UPDATE `returns_tb` SET `status`='cleared' WHERE `id`=:returnID AND `status`='matured'", array(':returnID'=>$returnID));

    if ($cur_cycle >= $cycles) {
      // code...
        DB::query("UPDATE `investments_tb` SET `status`='ready' WHERE `dir`=:investment_id AND `status`='active'", array(':investment_id'=>$investment_id));

    } else {
      // code...
        DB::query("UPDATE `investments_tb` SET `cur_cycle`=`cur_cycle`+1 WHERE `dir`=:investment_id AND `status`='active'", array(':investment_id'=>$investment_id));

        DB::query("INSERT INTO `returns_tb`(`investor_id`, `investment_id`, `initial_date`, `mature_date`, `returns`, `cycle`, `status`) VALUES (:userid, :investment_id, :init_date, :mat_date, :returns, :cycle, 'growing')", array(':userid'=>$userid, ':investment_id'=>$investment_id, ':init_date'=>$init_date, ':mat_date'=>$mat_date, ':returns'=>$returns, ':cycle'=>$cycle));
    }

    DB::query("UPDATE `wallet` SET `available`=`available`+:returns WHERE `dir`=:userid", array(':userid'=>$userid, ':returns'=>$returns));

    header('location: ../pages/assets');
  }

}


if (isset($_REQUEST['get_asset'])) {
  // code...investments_tb
  // $page=1;
  $capital = $_POST['capital'];
  $investPlan = $_POST['optionPlans'];

    if (DB::count("SELECT * from `investment_plans` where `status` = 'active' AND `dir`=:investPlan", array(':investPlan'=>$investPlan))) {
      $plan = DB::fetch("SELECT * from `investment_plans` where `status` = 'active' AND `dir`=:investPlan", array(':investPlan'=>$investPlan))[0];
      // print_r($plan);
      $rate = $plan['percent_interest'];
      $cycles = $plan['cycles'];
      $days = $plan['days'];
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

      //$total_returns = $returns * $cycles;
      // exit;

      if (DB::count("SELECT * FROM `wallet` WHERE `user_id`=:userid AND `reserved` >=:capital", array(':userid'=>$userid,':capital'=>$capital))) {
        // code...
        // echo 'Reserved';

        DB::query("UPDATE `wallet` SET `reserved`=`reserved`-:capital WHERE `user_id`=:userid AND `reserved` >= :capital", array(':userid'=>$userid,':capital'=>$capital));
        $continue=true;

      } elseif (DB::count('SELECT * FROM `wallet` WHERE `user_id`=:userid AND `available`+`reserved` >= :capital', array(':userid'=>$userid,':capital'=>$capital))) {
        // code...
        // echo 'available + reserved';
        DB::query("UPDATE `wallet` SET `available`=(`available`+`reserved`)-:capital, `reserved`= 0 WHERE `user_id`=:userid AND `available`+`reserved` >= :capital", array(':userid'=>$userid,':capital'=>$capital));
        $continue=true;
      } else {
        // code...
        $continue=false;
        $page=0;
      }
      if ($continue==true) {
        // code...
        DB::query("INSERT INTO `investments_tb` (`plan`, `investor_id`, `capital`, `returns_monthly`, `cycles`, `cur_cycle`, `bonus`, `status`) VALUES (:investPlan, :userid, :capital, :returns, :cycles, 1, :bonus, 'invested')", array(':investPlan'=>$investPlan, ':userid'=>$userid, ':capital'=>$capital, ':returns'=>$returns, ':cycles'=>$cycles, ':bonus'=>$bonus));

        $investment_id = DB::fetch("SELECT `dir` FROM `investments_tb` WHERE `status`='invested' ORDER BY `dir` desc LIMIT 1")[0]['dir'];

        DB::query("INSERT INTO `returns_tb`(`investor_id`, `investment_id`, `initial_date`, `mature_date`, `returns`, `cycle`, `status`) VALUES (:userid, :investment_id, :init_date, :mat_date, :returns, :cycle, 'growing')", array(':userid'=>$userid, ':investment_id'=>$investment_id, ':init_date'=>$init_date, ':mat_date'=>$mat_date, ':returns'=>$returns, ':cycle'=>$cycle));

        DB::query("UPDATE `investments_tb` SET `status`='active' WHERE `dir`=:investment_id AND `status`='invested'", array(':investment_id'=>$investment_id));

        header('location: ../pages/assets');
      }

    } else {
      $page=2;
    }


  // SELECT * FROM `wallet` WHERE `available`+`reserved` >= 1

}


?>
