<?php

    if(isset($_SESSION['id'])){
      // code...
        header("location: pages/");
    }

    $page = 0;
    $code = 0;
    $topic = "Forgot Your Password?";
    $caption = "Follow Steps To Recover Your Account.";


    if (isset($_POST['continue_submit'])) {
      // code...
      $token = site::fp_clear($_POST['username']);
      $via = site::fp_clear($_POST['via']);
      $token_infoq = "SELECT * FROM `users_tb` WHERE `username` = '$token'";

      if(DB::count($token_infoq) > 0){
        $token_info = DB::fetch($token_infoq)[0];
        $token_email = $token_info['email'];
        $token_phone = $token_info['mobile'];
        $token_userID = $token_info['id'];

        if ($via == "via_sms"){
          $token_via = $token_phone;
          $token_type = "sms";

        } elseif ($via == "via_email") {
          $token_via = $token_email;
          $token_type = "email";

        }
        $code = code_generate();
        $date = date("Y/m/d h:m");

        $code_query =  DB::query("INSERT INTO `verification_tb` (`type`, `type_value`, `verify_code`, `status`,`user_id`, `username`, `date`) VALUES ('$token_type', '$token_via', '$code', 'open', '$token_userID', '$token', '$date');");
        //echo '<script>alert("'.$code.'")</script>';
        $message = "Your verification Code is : ".$code." to ".$token_via;
        echo '<script>console.log("'.$message.'")</script>';

        if ($via == "via_sms"){
          sendVerificationSMS($token_via, $code, $token);
        } elseif ($via == "via_email") {
          sendVerificationEmail($token_via, $code, $token);
        }

        $page = 1;
      }
    }

    if (isset($_POST['verify_code_submit'])) {
      // code...
      $ver_code = site::fp_clear($_POST['pin']);
      $token = site::fp_clear($_POST['token']);
      $token_via = site::fp_clear($_POST['token_via']);

      if (DB::count("SELECT * FROM `verification_tb` WHERE `verify_code` = '$ver_code' AND `username` = '$token' AND `status` = 'open'") > 0) {
        // code...
        DB::query("UPDATE `verification_tb` SET `status` = 'success' WHERE `verify_code` = '$ver_code'");
        blindLogin($token);
        $page = 2;
      } else {
        // code...
        DB::query("UPDATE `verification_tb` SET `status` = 'failed' WHERE `status` = 'open' AND `username`  = '$token'");
        echo '<script>alert("Error Occured")</script>';
      }
    }

    if (isset($_POST['proceed_submit'])) {
      // code...
      if ($_SESSION['userid']) {
        // code...
        $updateUser = $_SESSION['userid'];
        DB::query("UPDATE `status_tb` SET `is_setup` = 0 WHERE `status_tb`.`user_id` = '  $updateUser'");
        header("location: pages/");
      } else {
        // code...
        echo '<script>alert("Error Occured")</script>';
      }

    }


    if ($page == 1) {
      // code...
      $topic = "Sent Verification Code via $token_via !";
      $caption = "Enter 6-digits code Below.";
    }
    if ($page == 2) {
      // code...
      $topic = "All Set!";
      $caption = "Go Ahead to Setup Your Account.";
    }

    function blindLogin($login_id) {

      $login_id = $login_id;
      $query = "SELECT * FROM `login_tb` WHERE `username` = '$login_id' AND `allow_login`='yes'";

      if(DB::count($query) > 0){
          $user_res = DB::fetch($query)[0];
          $allow_access = 'yes';
          if($allow_access == 'yes'){
            // code...
              $_SESSION['userid'] = $user_res['user_id'];
              $_SESSION['username'] = $user_res['username'];
              $_SESSION['id'] = session_id();
              $login_type = "user";
              $_SESSION['login_type'] = $login_type;
          } else {
            // code...
              echo '<script> alert("Decrypting account was not success, You dont have the right Access");window.location.assign("login")</script>';
          }
      } else {
        // code...
          echo '<script> alert("Login was not successful, This implies the Account does not Exist or Something");window.location.assign("login")</script>';
      }
    }

    function code_generate(){
      global $con;
      $generated_code = rand(100000,999999);
       $code_query = "SELECT * from `verification_tb` where `verify_code` = '$generated_code' and `status` = 'open'";
        if(DB::count($code_query)>0){
          ref_generate();
        }
        else {
          return $generated_code;
        }
    }

    function sendVerificationSMS($toNumber,$code,$toUser){
      $to = $toNumber;
      $message = 'Your verification Code is : '.$code.'. Use this Code To Verify Your Ourcomunity Account (Username: '.$toUser.').';

      $api_key = "709d65740b1ca881b60e07706281035";
      $source = "Ourcomunity";
      $destination = $to;
      $message = $message;
      $type = 0;
      $report = 1;

      $curl = curl_init();

      curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.ikelvin.co/sms/send",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n\t\"api_key\": \"709d65740b1ca881b60e077062810354\",\n\t\"source\": \"$source\",\n\t\"destination\": \"$destination\",\n\t\"message\": \"$message\",\n\t\"type\": \"0\",\n\t\"report\": \"1\"\n}",
        CURLOPT_HTTPHEADER => [
          "Authorization: Basic Og==",
          "Content-Type: application/json"
        ],
      ]);

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        return "cURL Error #:" . $err;
      } else {
        return $response;
      }
    }


    function sendVerificationEmail($toEmail,$code,$toUser){
      $to = $toEmail;
      $subject = "Verify Email Address";

      $message = '
      <html>
      <head>
      <title>Verify Email Address</title>
      </head>
      <body>
      <h3>Hello ".$toUser."!</h3>
      <p>
        <br/>Your verification code is <strong><b>'.$code.'</b></strong>. <br/>Enter this code in our website to verify your Ourcomunity account. <br/> <a href="https:\/\/ourcomunity.net\/recover?code='.$code.'from='.$to.'"> Click here </a> to open the [app/portal landing page]. <br/>If you have any questions, send us an email <a href="mailto:\/\/support@ourcomunity.net">support@ourcomunity.net</a>. <br/>We’re glad you’re here! <br/>The Ourcomunity.net team
      </p>
      </body>
      </html>
      ';

      // Always set content-type when sending HTML email
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      // More headers
      $headers .= 'From: <support@ourcomunity.net>' . "\r\n";
      $headers .= 'Cc: info@ourcomunity.net' . "\r\n";

      mail($to,$subject,$message,$headers);
    }

    if(isset($_POST['login_form_submit']) == true){
        // code...
        $allow_access = 'no';
        $login_id= site::fp_clear($_POST['login_id']);

        $query = "SELECT * FROM `login_tb` WHERE `username` = '$login_id' AND `allow_login`='yes'";

        if(DB::count($query) > 0){
            $user_res = DB::fetch($query)[0];
            if($user_res['standard'] == 2){
              // code...
              $allow_access = (site::pass_check(site::fp_clear($_POST['password']), $user_res['password'])) ? 'yes' : 'no' ;
              echo $allow_access;
            //  exit;
            } elseif ($user_res['standard'] == 1) {
              // code...
              $allow_access = (site::fp_hash(site::fp_clear($_POST['password'])) == $user_res['password']) ? 'yes' : 'no' ;
            } else {
              // code...
              $allow_access = 'no' ;
            }


            if($allow_access == 'yes'){
              // code...
                $_SESSION['userid'] = $user_res['user_id'];
                $_SESSION['username'] = $user_res['username'];
                $_SESSION['id'] = session_id();
                $login_type = "user";
                $_SESSION['login_type'] = $login_type;
                header("location: pages/");
            } else {
              // code...
                echo '<script> alert("Decrypting account was not success, This implies your login credential is incorrrect");window.location.assign("login")</script>';
            }
        } else {
          // code...
            echo '<script> alert("Login was not successful, This implies the Account does not or your login credential is incorrrect");window.location.assign("login")</script>';
        }

    }



?>
