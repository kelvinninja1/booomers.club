<?php 


$requests_no = DB::count("SELECT * FROM `requests_tb` WHERE `from_id` = '$userid' AND `status` = 'issued' OR `to_id` = '$userid' AND `status` = 'confirmed'");
if ($requests_no > 0) {
$requests_tb = DB::fetch("SELECT * FROM `requests_tb` WHERE `from_id` = '$userid' AND `status` = 'issued' OR `to_id` = '$userid' AND `status` = 'confirmed'");
}

?>

<?php
//echo '<script> alert("hey '.print_r($requests_tb).'")</script>';
if(isset($_POST["proof-submit"])) {
    img::upload('fileToUpload');
// $img1 = img::upload('fileToUpload');
// db_insert($img1, $code);
}

?>
