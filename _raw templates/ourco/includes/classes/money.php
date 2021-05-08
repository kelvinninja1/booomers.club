<?php

class MONEY {
  public static function querycur_val($need){
    //echo '<script>alert("Val'.$need.'")</script>';
    global $con;
    if (DB::count("SELECT * FROM `currency_tb` WHERE `code` = '$need'")) {
      // code...
      $value = DB::fetch("SELECT `value` FROM `currency_tb` WHERE `code` = '$need'")[0][0];
    } else {

    }
    // echo '<script>alert("Value'.$value.'")</script>';
    return $value;
  }

public static function cur_convert($from, $to, $amount, $action = 0) {
  global $con;
  //echo '<script>alert("Upp'.$from.' - '.$to.'")</script>';
  if($from == $to){
    return $amount;
   //   echo '<script>alert("if'.$amount.' - '.$to.'")</script>';
  } else {
    //  echo '<script>alert("not equal '.$from.' - '.$to.'")</script>';
    $from_value = SELF::querycur_val($from);
    $to_value = SELF::querycur_val($to);
    $amount = ($amount / $from_value) * $to_value;

    if ($action == 1) {
      # code...
    $amount += (1 / 100) * $amount;
    } elseif ($action == 2) {
      # code...
    $amount -= (1 / 100) * $amount;
    }
    //  echo '<script>alert("final'.$amount.' - '.$to.'")</script>';
    return $amount;
  }
    }
}
?>
