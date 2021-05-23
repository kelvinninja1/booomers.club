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


$investmentStats = array();
$investmentStats['total'] = DB::count("SELECT * FROM `investments_tb` WHERE 1");

$investmentStats['matured'] = DB::count("SELECT * FROM `investments_tb` WHERE `status` = 'completed'");
$investmentStats['active'] = DB::count("SELECT * FROM `investments_tb` WHERE `status` = 'active'");
$investmentStats['cleared'] = DB::count("SELECT * FROM `investments_tb` WHERE `status` = 'cleared'");



$dbAssets = DB::query('select * from `investments_tb` where investor_id = :userid order by dir desc', array(':userid'=>$userid));

$dbReturns = DB::query('select * from `returns_tb` where investor_id = :userid order by id desc', array(':userid'=>$userid));
?>

<?php


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



?>
