<?php
    // echo '<script>alert("hey");</script>';
   // include 'includes/classes/function.php';

            // echo '<div class="container">
            //     <div class="row">
            //     <div class="col-lg-6 col-lg-offset-3">';
    if(isset($_POST['setup'])) {
        // echo '<script>alert("hey");</script>';
        $nokPhone	= site::fp_clear($_POST['full_phone']);
        $nokFullname = site::fp_clear($_POST['nok']);
        $nokRelation = site::fp_clear($_POST['nok_relation']);
        $nokCountry	= site::fp_clear($_POST['country']);

        $rgd = date('Y/m/d');

        $error = '';

        // $u_id = DB::fetch("SELECT `id` FROM `users_tb` WHERE `username`='$uname'")[0]['id'];
        // print_r ($u_id);
        // echo '<script>alert("whey");</script>';

       // echo '<script>alert("whey '.$error.'");</script>';

        if(empty($nokFullname) || empty($nokRelation) || empty($nokPhone) || empty($nokCountry)){
            $error .='<li>All Fields are Required!</li>';
        }
        if(mb_strlen($nokFullname) > 80){
            $error .='<li>Keep it simple, Cannot be more than 100 Characters!</li>';
        }
        if(mb_strlen($nokRelation) > 40){
            $error .='<li>Keep it simple, Cannot be more than 40 Characters!</li>';
        }

        if(mb_strlen($nokPhone) > 15 || mb_strlen($nokPhone) < 5){
            $error .='<li>Use Correct Phone number Characters eg: 023456789</li>';
        }

       // echo '<script>alert("ohey '.$error.'");</script>';
        if(empty($error)){
           // echo '<script>alert("ehey");</script>';
            $action = DB::query("UPDATE `nok_tb` SET `phone`='$nokPhone', `country`='$nokCountry', `name`='$nokFullname', `relation`='$nokRelation' WHERE `user_id`='$userid';");

            if($action){
              $updpay = DB::query("UPDATE `status_tb` SET `is_setup`=  `is_setup`+1, `payment_ready`= 'yes' WHERE `status_tb`.`user_id` = '$userid'");

              DB::query("INSERT INTO `timeline_tb` (`user_id`,`activity`,`act_type`) VALUES ('$userid','Next Of Kins setup','acc');");

              header('location: setup');
              exit;
                // echo '<script>alert("Registration was Succesful, Please Proceed to Login");window.location.assign("login");</script>';
            }
        } else {
            echo '<script>alert("ERROR: '.$error.'");</script>';
        }


        // echo '</div>
        //         </div>
        //         </div>';
    }

?>
