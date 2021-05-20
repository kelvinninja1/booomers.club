<?php
if(isset($_POST['update_currency_submit'])){
    //echo '<script>alert("hehy")</script>';
    $def_currency = site::fp_clean($_POST['currency']);
    $uid = $userid;

    DB::query("UPDATE `payment_acc_tb` SET `currency` = :def_currency WHERE `payment_acc_tb`.`user_id`=:userid", array(':def_currency' => $def_currency, ':userid' => $userid ));

    header('location: ../pages');
}

if(isset($_POST['adjust_activation_submit'])){
    //echo '<script>alert("hehy")</script>';
    $newMinimumAmount = MONEY::cur_convert($user_currency, 'ourco', $_POST['amount'], 0);
      // echo "New Amount: ".$newMinimumAmount."<br>";
      // echo "Old Amount: ".$minActivationFund."<br>";
      $rawMinActivationFund = DB::fetch("SELECT * FROM `settlement_tb` WHERE `user_id`='$userid'")[0]['investment']/10;
    $cutRate = ($newMinimumAmount<$rawMinActivationFund) ? round(($newMinimumAmount/$rawMinActivationFund)*100) : 100;
    // echo "New rate: ".$cutRate."<br>";
    // $testingRate = ($cutRate/100)*$minActivationFund;
    // echo "Testing rate: ".$testingRate."<br>";
    // exit;

    DB::query("UPDATE `settlement_tb` SET `cut_rate` = :cutRate WHERE `settlement_tb`.`user_id`=:userid", array(':cutRate' => $cutRate, ':userid' => $userid ));
    header('location: ../pages');
}

if(isset($_POST['claim_funds_submit'])){
    $cashinFunds = $cashinTotal;
      if (DB::count("SELECT * FROM `settlement_tb` WHERE `user_id`='$userid' AND `status` = 'unsettled'") > 0) {
        // code...
        DB::query("UPDATE `settlement_tb` SET `set_total` = :cashinFunds, `status` = 'ready' WHERE `settlement_tb`.`user_id`=:userid", array(':cashinFunds' => $cashinFunds, ':userid' => $userid ));
      }

    header('location: ../pages');
}



 ?>
