<?php

  // $base_url = "http://192.168.100.2/boomers";
  @$refpage_url = $_SERVER['HTTP_REFERER'];
  $base_url = "http://localhost/ourco";
  // $base_url = "https://ourcomunity.net";
  if($_SESSION){
    $userid =  $_SESSION['userid'];
    $superpass_id = $_SESSION['id'];
    // echo $userid;
    $poweruser = DB::fetch("SELECT * FROM `users_tb` WHERE `id`='$userid'")[0];
    $_username = $poweruser['username'];
    $powerwallet = DB::fetch("SELECT * FROM `wallet` WHERE `user_id`='$userid'")[0];
    $powerwalletInfo = DB::fetch("SELECT * FROM `payment_acc_tb` WHERE `user_id`='$userid'")[0];
    $powerstatus = DB::fetch("SELECT * FROM `status_tb` WHERE `user_id`='$userid'")[0];
    $dbCurrency = DB::query("SELECT * from `currency_tb` order by `currency` asc");

    $user_Country = $poweruser['country'];
    $user_currency_symbol='$';
    $setupPage = $powerstatus['is_setup']+1;
    switch ($setupPage) {
      case '0':
        // code...
        header('location: pages');
        exit;
        break;

      case '1':
        // code...
        $setupPage = 'accountSetup';
        $setupPageCaption = 'Stage 1/3 Account Setup';
        break;

      case '2':
        // code...
        $setupPage = 'paymentSetup';
        $setupPageCaption = 'Stage 2/3 Payment Setup';
        break;

      case '3':
        // code...
        $setupPage = 'nokSetup';
        $setupPageCaption = 'Stage 3/3 Next Of Kins Setup';
        break;

      default:
        // code...
        header('location: pages');
        exit;
        break;
    }
//echo '<script>alert("hey '.$setupPage.'")</script>';
    if (file_exists('../includes/models/'.$setupPage.'.php'))
      {
        require_once("../includes/models/$setupPage.php");
      }

  }


?>
