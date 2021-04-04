<?php
// $ref_points = 1;
//     $approvals = 2;
//     $boom_points = 3;
//     $no_refs = 4;
//     $base_url = "localhost/boomers";
//     $username = "ikelvin";
// $userid = 2;

// $base_url = "http://192.168.100.2/boomers";
@$refpage_url = $_SERVER['HTTP_REFERER'];
$base_url = "http://localhost/boomers";
if($_SESSION){
$userid =  $_SESSION['userid'];
$superpass_id = $_SESSION['id'];
// echo $userid;
$poweruser = DB::fetch("SELECT * FROM `users_tb` WHERE `id`='$userid'")[0];
$powerlogin = DB::fetch("SELECT * FROM `login_tb` WHERE `user_id`='$userid'")[0];
$powerwallet = DB::fetch("SELECT * FROM `user_paymethod_tb` WHERE `user_id`='$userid'")[0];

if($powerwallet['method_id'] == 1) {
    $powerwallet['method_id'] = "MTN Mobile Money";
} elseif($powerwallet['method_id'] == 2) {
    $powerwallet['method_id'] = "Vodafone Cash";
} elseif($powerwallet['method_id'] == 3) {
    $powerwallet['method_id'] = "AirtelTigo Cash";
} else {
    $powerwallet['method_id'] = $powerwallet['method_id'];
}

$reffer_set = DB::fetch("SELECT `referer`,`status` FROM `referal_tb` WHERE `referee`='$userid'")[0];
$reffer_id = $reffer_set['referer'];
$reffer_status = $reffer_set['status'];
$powerRefWallet =  DB::fetch("SELECT * FROM `user_paymethod_tb` WHERE `user_id`='$reffer_id'")[0];
//print_r($powerRefWallet);

if($powerRefWallet['method_id'] == 1) {
    $powerRefWallet['method_id'] = "MTN Mobile Money";
} elseif($powerRefWallet['method_id'] == 2) {
    $powerRefWallet['method_id'] = "Vodafone Cash";
} elseif($powerRefwallet['method_id'] == 3) {
    $powerRefWallet['method_id'] = "AirtelTigo Cash";
} else {
    $powerRefWallet['method_id'] = $powerRefWallet['method_id'];

}

$admin_id = 2;
$powerAdWallet =  DB::fetch("SELECT * FROM `user_paymethod_tb` WHERE `user_id`='$admin_id'")[0];
//print_r($powerAdWallet);

if($powerAdWallet['method_id'] == 1) {
    $powerAdWallet['method_id'] = "MTN Mobile Money";
} elseif($powerAdWallet['method_id'] == 2) {
    $powerAdWallet['method_id'] = "Vodafone Cash";
} elseif($powerAdWallet['method_id'] == 3) {
    $powerAdWallet['method_id'] = "AirtelTigo Cash";
} else {
    $powerAdWallet['method_id'] = $powerAdWallet['method_id'];

}

$powerGetWallet = ($reffer_status == "unsettled") ? $powerRefWallet : $powerAdWallet;

//print_r($powerGetWallet);



$username = $poweruser['username'];
// $refname = data::users_tb("username","`username`='$refname'",'count');
$refname = DB::count("SELECT `username` FROM `users_tb` WHERE `username`='$userid'");
$refname = $refname;

$ref_points = DB::fetch("SELECT `points` FROM `ref_points_tb` WHERE `user_id`='$userid'")[0][0];
$approvals = DB::count("SELECT * FROM `requests_tb` WHERE `from_id` = '$userid' AND `status` = 'issued' OR `to_id` - '$userid' AND `status` = 'issued'");
// $boom_points = DB::fetch("SELECT `points` FROM `boom_ponits` WHERE `user_id`='$userid'")[0][0];
$boom_points = 1;
$no_refs = DB::count("SELECT `referee` FROM `referal_tb` WHERE `referer`='$userid'");
$no_settled = DB::count("SELECT `referee` FROM `referal_tb` WHERE `referer`='$userid' AND `status` = 'settled'");
// $base_url = "localhost/boomers";

// $username = "ikelvin";

}

if(isset($_GET['try'])){
    // echo "<script>alert('hellooo');</script>";
    $to_id = $_GET['try'];
    $sql = "INSERT INTO `requests_tb` (`from_id`, `to_id`, `value`, `status`, `proof_img`) VALUES ('$userid', '$to_id', '1', 'issued', '0');";
    // DB::query($sql);
    $try = DB::query($sql);
    if($reffer_status == "unsettled") {
        DB::query("UPDATE `referal_tb` SET `status` = 'ready' WHERE `referal_tb`.`referee` = $userid;");
    }

    if($try) {
        $refPage = $_SERVER['referer'];
        header('location: ../pages');
    }
}

if(isset($_POST['submit_proof'])) {
    // $_POST['submit_proof']
    $boo_id = $_POST['submit_proof'];
    $req = $_POST['req'];
    //echo 'hey';
    print_r($_FILES);

    $proof_img = img::upload('Proof');
    $sql = "UPDATE `requests_tb` SET `status` = 'confirmed', `proof_img` = '$proof_img' WHERE `requests_tb`.`id` = $req;";

    $try = DB::query($sql);
    if($try) {
        $refPage = $_SERVER['referer'];
        header('location: ../pages');
    }
    //echo '<script>alert("heyoo")</script>';

  // $img1 = img::upload('fileToUpload');
  // db_insert($img1, $code);
  }

  if(isset($_POST['submit_approve'])) {
    // $_POST['submit_proof']
    $boo_id = $_POST['submit_approve'];
    $req = $_POST['req'];
    // echo 'hey'.$req;
    // print_r($_FILES);

    // $proof_img = img::upload('Proof');
    $sql = "UPDATE `requests_tb` SET `status` = 'approved' WHERE `requests_tb`.`id` = '$req' AND `requests_tb`.`status` = 'confirmed';";

    $try = DB::query($sql);
    $try->rowCount();
    print_r($try->rowCount());

    if($try->rowCount()){

        $sql = "UPDATE `ref_points_tb` SET `points` = `points`+2 WHERE `ref_points_tb`.`user_id` = '$boo_id';";
        DB::query($sql);
        $sql = "UPDATE `boom_ponits` SET `points` = `points`+5 WHERE `boom_ponits`.`user_id` = '$boo_id';";
        DB::query($sql);
        $sql = "SELECT * FROM `referal_tb` WHERE `referal_tb`.`referee` = '$boo_id' AND `referal_tb`.`referer` = '$userid' AND `referal_tb`.`status` = 'ready';";
        $ref_chk = DB::query($sql);
        if($ref_chk->rowCount()){
            $sql = "UPDATE `referal_tb` SET `status` = 'ready' WHERE `referal_tb`.`referee` = '$boo_id' AND `referal_tb`.`referer` = '$userid' AND `referal_tb`.`status` = 'ready';";
            DB::query($sql);
        }
    }

    if($try) {
        $refPage = $_SERVER['referer'];
        header('location: ../pages');
    }
    //echo '<script>alert("heyoo")</script>';

  // $img1 = img::upload('fileToUpload');
  // db_insert($img1, $code);
  }


?>
