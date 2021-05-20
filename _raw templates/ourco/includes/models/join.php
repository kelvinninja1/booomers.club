<?php
    // echo '<script>alert("hey");</script>';
   // include 'includes/classes/function.php';
    if(isset($_GET['ref'])){
        $ffid = $_GET['ref'];

        if(DB::count("SELECT `username` FROM `users_tb` WHERE `username`='$ffid'") > 0){
        $reff = DB::fetch("SELECT `username` FROM `users_tb` WHERE `username`='$ffid'")[0];
        $_SESSION['ref'] = $reff['username'];

        }
    }

            // echo '<div class="container">
            //     <div class="row">
            //     <div class="col-lg-6 col-lg-offset-3">';
    if(isset($_POST['signup'])) {
        // echo '<script>alert("hey");</script>';
        //$raw_phone =  site::fp_clear($_POST['phone']);
        $uphone	= site::fp_clear($_POST['full_phone']);
        $ufullname = site::fp_clear($_POST['fullNames']);
        // $lname = site::fp_clear($_POST['lastNames']);
        $uname = site::fp_clear($_POST['userNames']);
        $uemail = site::fp_clear($_POST['email']);
        $upass1 = site::fp_clear($_POST['password']);
        $upass2 = site::fp_clear($_POST['password2']);
        $upass = site::pass_hash($upass1);
        $ucountry	= site::fp_clear($_POST['country']);
        $ugender	= site::fp_clear($_POST['gender']);
        $udob = site::fp_clear($_POST['dob']);
        $promoCode = site::fp_clear($_POST['promo']);
        $ubonus = 0;

        //$uwhatsapp = site::fp_clear($_POST['whatsapp']);

        // $upay_type = site::fp_clear($_POST['pay_type']);
        // $uacc_type = site::fp_clear($_POST['acc_type']);
        // $ureg_name = site::fp_clear($_POST['reg_name']);
        // $ureg_num = site::fp_clear($_POST['reg_num']);

        $rgd = date('Y/m/d');
        $refname = site::fp_clear($_POST['ref']);


        if(isset($_SESSION['ref'])){
            $refname = $_SESSION['ref'];
        }
        else if ($refname !=""){
            $refname = $refname;
        }
        else {
            $refname = "";
            // $refname = 'ikelvin';
        }

        if($refname !=""){
          // TODO: check before fetching
            $referer = (DB::fetch("SELECT `id` FROM `users_tb` WHERE `username`='$refname'")) ? DB::fetch("SELECT `id` FROM `users_tb` WHERE `username`='$refname'")[0]['id'] : 441;
        }
        else {
            $referer = 441;
        }

        $error = '';

        // $u_id = DB::fetch("SELECT `id` FROM `users_tb` WHERE `username`='$uname'")[0]['id'];
        // print_r ($u_id);
        // echo '<script>alert("whey");</script>';
        $error .= (DB::count("SELECT `email` FROM `users_tb` WHERE `email` = '$uemail'") > 0) ? '<li> Email Already Exists!   </li>' : '' ;

        $error .= (DB::count("SELECT `username` FROM `users_tb` WHERE `username`='$uname'") > 0) ? '<li> Username Already Exists!   </li>' : '' ;

        $error .= (DB::count("SELECT `phone` FROM `login_tb` WHERE `phone`='$uphone'") > 0) ? '<li> Phone Already Exists!   </li>' : '' ;
       // echo '<script>alert("whey '.$error.'");</script>';

        if(empty($ufullname) || empty($upass) || empty($uname) || empty($uphone) || empty($uemail) || empty($ucountry)){
            $error .='<li>All Fields are Required!</li>';
        }
        if(mb_strlen($ufullname) > 130){
            $error .='<li>Full Name Cannot be more than 130 Characters!</li>';
        }
        if(mb_strlen($uname) > 15){
            $error .='<li>Username Cannot be more than 15 Characters!</li>';
        }
        if (!preg_match('/[a-zA-Z0-9_]+/', $uname)) {
          $error .='<li>Username is Invalid, You can only use letters, numbers and underscores in usernames!</li>';
        }
        if (!filter_var($uemail, FILTER_VALIDATE_EMAIL)) {
          $error .='<li>Email is Invalid, Please Use Valid Commercial or company email!</li>';
        }
        if($upass1 != $upass2){
        $error .='<li>Password do not Match!</li>';
        }
        if(mb_strlen($_POST['phone']) > 15 || mb_strlen($_POST['phone']) < 5){
            $error .='<li>Enter Your Correct Phone Number</li>';
        }
        // if(mb_strlen($_POST['whatsapp']) > 10 || mb_strlen($_POST['whatsapp']) < 9){
        //     $error .='<li>Phone number Min. 8 Max. 14 Characters eg: 023456789</li>';
        // }
       // echo '<script>alert("ohey '.$error.'");</script>';
        if(empty($error)){
           // echo '<script>alert("ehey");</script>';
            DB::query("INSERT INTO `users_tb` (`email`,`username`,`name`,`mobile`,`country`,`reg_date`,`gender`,`dob`) VALUES('$uemail','$uname','$ufullname','$uphone','$ucountry','$rgd','$ugender','$udob')") or die(mysqli_error($pdo));

            $u_id = DB::fetch("SELECT `id` FROM `users_tb` WHERE `username`='$uname'")[0]['id'];

            DB::query("INSERT INTO `login_tb` (`username`,`password`, `user_id`,`standard`) VALUES('$uname','$upass','$u_id',2);");

            DB::query("INSERT INTO `referal_tb` (`referer`, `referee`) VALUES ('$referer', '$u_id');");
            // TODO: wallet
            DB::query("INSERT INTO `wallet` (`user_id`,`bonus`) VALUES ('$u_id','$ubonus');");

            // TODO: payment_acc_tb
            DB::query("INSERT INTO `payment_acc_tb` (`user_id`) VALUES ('$u_id');");

            // TODO: status_tb
            DB::query("INSERT INTO `status_tb` (`user_id`,`is_setup`) VALUES ('$u_id','1');");

            // TODO: timeline_tb
            DB::query("INSERT INTO `timeline_tb` (`user_id`,`activity`,`act_type`) VALUES ('$u_id','Account Registered','acc');");

            // TODO: nok
            DB::query("INSERT INTO `nok_tb` (`user_id`) VALUES ('$u_id');");

            // TODO: country
            if (!DB::query("SELECT * FROM `country_tb` WHERE `country_code`='$ucountry'")) {
              // code...
                DB::query("INSERT INTO `country_tb` (`country_code`) VALUES ('$ucountry');");
            }


            // DB::query("INSERT INTO `user_paymethod_tb` (`method_id`, `acc_type`, `user_id`, `reg_name`, `reg_number` ) VALUES ('$upay_type', '$uacc_type', '$u_id', '$ureg_name', '$ureg_num');");
            //


            if(1){
                echo '<script>alert("Registration was Succesful, Please Proceed to Login");window.location.assign("login");</script>';
            }
        } else {
            echo '<script>alert("ERROR: '.$error.'");</script>';
        }


        // echo '</div>
        //         </div>
        //         </div>';
    }

?>
