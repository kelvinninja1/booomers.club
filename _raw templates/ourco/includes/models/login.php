<?php

    if(isset($_SESSION['id'])){
      // code...
        header("location: pages/");
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
