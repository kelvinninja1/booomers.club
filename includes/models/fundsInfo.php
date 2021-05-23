<?php

  if ($account_type == "api-based"){

    $query_plan_api = "SELECT * FROM `api_reference_tb` WHERE `wallet` = '$pay_method'";

    $rowapi = DB::fetch($query_plan_api)[0];
    $addr = $rowapi['service_name'];
    $reference_id = $rowapi['ref_code'];

    if ($reference_id == "paypal_cc"){

      $paydata ='Complete Your Deposit to '.$pay_method.' Account.<br/><span class="huge"></span>, <br/> using the reference code provided on the top-left corner and click below';


      $paybuttons = '<input type="submit" name="confirm_submit" value="Confirm Transaction" class="btn btn-primary"/>';


    } elseif ($reference_id == "bitcoin") {

      $paydata ='Complete Your Deposit to '.$pay_method.' Account.
      <br/> <div style="font-size:16px;margin:0 auto;width:300px" class="blockchain-btn"
      data-address="'.$addr.'"
      data-shared="false">
      <div class="blockchain stage-begin">
      <p class="btn btn-success fa fa-MONEY btn-lg" href="#deposit" title="Deposit Funds"> Show Payment Details</a>
      </div>

      <div class="blockchain stage-ready">
      <p align="center"><!-- Don`t forget to use your reference code provided as the message or info.<br/> -->Please Scan to make payment</b></p>
      <p align="center" class="qr-code"></p>
      <p align="center">OR <br/> Please <a href="https://blockchain.info/payment_request?address='.$addr.'&message='.$ref.'&amount_local='.$pay_amount.'&currency=USD&nosavecurrency=true" title="Click To Make Payment" class = "btn btn-success" target="_blank">Click To Make Payment</a></b></p>

      </div>
      <div id="deposit" class="blockchain stage-loading" style="text-align:center">
      <p><b>Awaiting Payment</b></p>
      <img src="https://blockchain.info/Resources/loading-large.gif"/>

      </div>
      <div class="blockchain stage-paid">
      Investment of <b>[[value]] BTC</b> Received. Go below and Comfirm Transaction.
      </div>
      <div class="blockchain stage-error">
      <font color="red">[[error]]</font>
      </div>
      </div> using the reference code provided on the top-left corner and click below';


      $paybuttons = '<!--a href="https://blockchain.info/payment_request?address=1GPnkrFzrWfGYQ2ds2iqvjdDKMRd1jBNE&message=Pro+Plan&amount_local=150&currency=USD&nosavecurrency=true" title="Make Payment" class = "btn btn-primary">Make Payment</a--><input type="submit" name="confirm_submit" value="Confirm Transaction" class="btn btn-primary"/>';

    }

  } elseif ($account_type == "corresponding") {

    if ($type == "mobile-based"){
      // echo('<script>alert("from: '.$from.' To: '.$to.' hmm '.$pay_method.'");</script>');
      $momo_based_checkq = "SELECT * from `plans_acc` where `wallet` = '$pay_method'";
      $momo_based_fetch = DB::fetch($momo_based_checkq)[0];
      $acc_name = $momo_based_fetch['Account_Name'];
      $acc_num = $momo_based_fetch['Account_Number'];

      $paydata ='Complete Your Deposit to '.$pay_method.' Account.<br/> Account Name: <span class="huge">'.$acc_name.'</span>, <br/> Account Number: <span class="huge">'.$acc_num.'</span> using the reference code provided on the top-left corner and click below';


      $paybuttons = '<input type="submit" name="confirm_submit" value="Confirm Transaction" class="btn btn-primary"/>';

    } elseif ($type == "email-based") {
      $email_based_checkq = "SELECT * from `plans_acc` where wallet = '$pay_method'";
      $email_based_fetch = DB::fetch($email_based_checkq)[0];
      $acc_user = $bank_based_fetch['Account_Name'];
      $acc_email = $bank_based_fetch['Account_Number'];

      $paydata ='Complete Your Deposit to '.$pay_method.' Account.<br/> Account Name: <span class="huge">'.$acc_user.'</span>, <br/> Account Number: <span class="huge">'.$acc_num.'</span> using the reference code provided on the top-left corner and click below';

      //Upload Prove
      $paybuttons = '<input type="submit" name="confirm_submit" value="Confirm Transaction" class="btn btn-primary"/>';


    } elseif ($type == "crypto-based"){
      $crypto_based_checkq = "select * from `plans_acc` where wallet = '$pay_method'";
      $crypto_based_fetch = DB::fetch($bank_based_checkq)[0];
      $address =  $crypto_based_fetch['address'];


       $paydata ='Complete Your Deposit to '.$pay_method.' Account.<br/> Account Name: <span class="huge">'.$address.'</span> using the reference code provided on the top-left corner and click below';

      //Upload Prove
      $paybuttons = '<input type="submit" name="confirm_submit" value="Confirm Transaction" class="btn btn-primary"/>';

    } elseif ($type == "bank-based"){
      $bank_based_checkq = "select * from `plans_acc` where wallet = '$pay_method'";
      $bank_based_fetch = DB::fetch($bank_based_checkq)[0];
      $acc_name =  $bank_based_fetch['Account_Name'];
      $acc_num =  $bank_based_fetch['Account_Number'];

       $paydata ='Complete Your Deposit to '.$pay_method.' Account.<br/> Account Name: <span class="huge">'.$acc_name.'</span>, <br/> Account Number: <span class="huge">'.$acc_num.'</span> using the reference code provided on the top-left corner and click below';

      //Upload Prove
      $paybuttons = '<input type="submit" name="confirm_submit" value="Confirm Transaction" class="btn btn-primary"/>';

    } elseif ($type == "other"){

    } else {

    }

  # code...
  } elseif ($account_type == "merchant-based"){

  } elseif ($account_type == "other"){

  } else {

  }

?>
