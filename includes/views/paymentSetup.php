<form class="user" method="post" class="validator-form" action="#setup_Payment">
  <div class="form-group">
    <label class="control-label">Default Currency</label>
    <select name="currency" class="form-control" required>
               <?php
               if ($page != "0") {
                 // code...
                 $is_selected = 'selected';

               } else {
                 // code...
                  echo '<option value="ourco" selected>Ourcoin (DEFAULT) [ or Choose Currency from below] </option>';
                  $is_selected = '';
               }



                               foreach($dbCurrency as $row){
                                   $id = $row['dir'];
                                   $cur_name = $row['currency'];
                                  /* $date = $row['last_update']; */
                                   //$type = $row['type'];
                                   $cur_code = $row['code'];

                                   if ($page != "0" && $cur_code == $selected_cur) {
                                     // code...
                                     echo '
                                     <option value="'.$cur_code.'" '.$is_selected.'> '.$cur_name. ' ('.$cur_code.') </option>';
                                   } else {
                                     // code...
                                     echo '
                                     <option value="'.$cur_code.'"> '.$cur_name. ' ('.$cur_code.') </option>';
                                   }

                               }

                               ?>
    </select>
    <small id="CurrencyNote" class="form-text text-muted">NB: Ourcoin will be used as standard in our operation whiles its values will be converted to or from your chosen default currency.</small>

</div>
  <!-- <div class="form-group">
    <input type="text" class="form-control form-control-user" id="exampleInputreferer" placeholder="Referer`s ID" name="ref">
  </div> -->
<input type="hidden" class="hidden" name="method_id" value="<?=$method_id?>">
 <div class="form-group">
     <div class="row">
         <div class="col-lg-12">
             <label class="control-label">Choose Payment Method</label>
             <select name="bank" class="form-control" required>
             <?php if ($page != "0"){

                                 echo '<option value="'.$bnamepay.'" selected> '.$bnamepay.'</option>';
                             } else {
                             foreach($dbPaymentPlans as $row){
                                 $id = $row['dir'];
                                 $method_name = $row['plan_name'];
                                /* $date = $row['last_update']; */
                                 $type = $row['type'];
                                 $def_currency = $row['def_currency'];

                                 echo '
                                 <option value="'.$method_name.'"> '.$method_name.'</option>';
                             }
                         }
              ?>
             </select>
         </div>
       </div>
     </div>
         <?php if ($page == "0") { ?>

         <hr class="dotted">

 <div class="form-group">

     <input type="submit" class="btn btn-primary btn-block" name="next_submit" value="Next">

 </div>  <?php } ?>
<?php if ($page == "mobile-based") { ?>
 <div class="form-group">
     <div class="row">
         <div class="col-lg-6">
             <label class="control-label">Registered Name</label>
<input type="text" class="form-control" name="accName" placeholder="Registered Name" value="<?=  site::fp_retain($powerwalletInfo['acc_name']) ?>" required/>
<!-- <i class="fa fa-user panel-icon form-control-feedback"></i> -->
         </div>
         <div class="col-lg-6">
             <label class="control-label">Registered Number</label>
             <input type="text" class="form-control" name="accNo" placeholder="Registered Number" value="<?= site::fp_retain($powerwalletInfo['acc_num']) ?>" required/>
         <!-- <i class="fa fa-user panel-icon form-control-feedback"></i> -->
         </div>
     </div>
 </div>

  <!-- <div class="form-group">
<label class="control-label form-grey" style="font-weight:bold;" id="">Confirm with Password</label>
     <input type="password" class="form-control" name="password" required />
  </div> -->

 <hr class="dotted">

 <div class="form-group">

     <button type="submit" class="btn btn-primary btn-block" name="momo_submit">Update</button>

 </div>  <?php } ?>


 <!-- Bank Based -->
 <?php if ($page == "bank-based") { ?>
 <div class="form-group">
<?php if ($page_type == "user-defined") { ?>
     <div class="row">
<div class="col-lg-6">
             <label class="control-label">Bank Name</label>
<input type="text" class="form-control" name="Bankname" placeholder="Bank Name" value="<?=  site::fp_retain($powerwalletInfo['bank']) ?>" required/>
<!-- <i class="fa fa-user panel-icon form-control-feedback"></i> -->
         </div>
         <div class="col-lg-6">
             <label class="control-label">Country</label>
             <input type="text" class="form-control" name="bank_country" placeholder="Bank Location" value="<?= site::fp_retain($powerwalletInfo['bank_country']) ?>" required/>
         <!-- <i class="fa fa-user panel-icon form-control-feedback"></i> -->
</div></div>
<br/> <?php } ?>
<div class="row">
         <div class="col-lg-6">
             <label class="control-label">Account Name</label>
<input type="text" class="form-control" name="accName" placeholder="Account Name" value="<?=  site::fp_retain($powerwalletInfo['acc_name']) ?>" required/>
<!-- <i class="fa fa-user panel-icon form-control-feedback"></i> -->
         </div>
         <div class="col-lg-6">
             <label class="control-label">Account Number</label>
             <input type="text" class="form-control" name="accNo" placeholder="Account Number" value="<?= site::fp_retain($powerwalletInfo['acc_num']) ?>" required/>
         <!-- <i class="fa fa-user panel-icon form-control-feedback"></i> -->
         </div>
     </div>
 </div>

  <!-- <div class="form-group">
<label class="control-label form-grey" style="font-weight:bold;" id="">Confirm with Password</label>
     <input type="password" class="form-control" name="password" required />

  </div> -->

 <hr class="dotted">

 <div class="form-group">

     <button type="submit" class="btn btn-primary btn-block" name="bank_submit">Update</button>

 </div>  <?php } ?>


 <!-- Email Based -->
 <?php if ($page == "email-based") { ?>
 <div class="form-group">
     <div class="row">
         <div class="col-lg-6">
             <label class="control-label">Account Holder Name</label>
<input type="text" class="form-control" name="accName" placeholder="Account Holder Name" value="<?=  site::fp_retain($powerwalletInfo['acc_name']) ?>" required/>
<!-- <i class="fa fa-user panel-icon form-control-feedback"></i> -->
         </div>
         <div class="col-lg-6">
             <label class="control-label">Account Address</label>
             <input type="text" class="form-control" name="address" placeholder="Account Address" value="<?= site::fp_retain($powerwalletInfo['email']) ?>" required/>
         <!-- <i class="fa fa-user panel-icon form-control-feedback"></i> -->
         </div>
     </div>
 </div>

  <!-- <div class="form-group">
<label class="control-label form-grey" style="font-weight:bold;" id="">Confirm with Password</label>
     <input type="password" class="form-control" name="password" required />

  </div> -->

 <hr class="dotted">

 <div class="form-group">

     <button type="submit" class="btn btn-primary btn-block" name="email_submit">Update</button>

 </div>  <?php } ?>

 <?php if ($page == "crypto-based") { ?>
 <div class="form-group">
     <div class="row">
       <!--   <div class="col-lg-6"> -->
            <!--  <label class="control-label">Account Holder Name </label> -->
<!--  <input type="text" class="form-control" name="accName" placeholder="Account Holder Name" value="<?//= site::fp_retain($poweruser['accname']) ?>" required/> -->
<!-- <i class="fa fa-user panel-icon form-control-feedback"></i> -->
       <!--   </div> -->
         <div class="col-lg-12">
             <label class="control-label">Account Recievers Address</label>
             <input type="text" class="form-control" name="address" placeholder="Account Address" value="<?= site::fp_retain($powerwalletInfo['address']) ?>" required/>
         <!-- <i class="fa fa-user panel-icon form-control-feedback"></i> -->
         </div>
     </div>
 </div>

  <!-- <div class="form-group">
<label class="control-label form-grey" style="font-weight:bold;" id="">Confirm with Password</label>
     <input type="password" class="form-control" name="password" required />

  </div> -->

 <hr class="dotted">

 <div class="form-group">

     <button type="submit" class="btn btn-primary btn-block" name="crypto_submit">Update</button>

 </div>  <?php } ?>


 <!-- Api Based -->
 <?php if ($page == "api-platform") { ?>
 <div class="form-group">
     <div class="row">
         <div class="col-lg-6">
             <label class="control-label">API Info</label>
<input type="text" class="form-control" name="accName" placeholder="API Info" value="<?=  site::fp_retain($powerwalletInfo['acc_name']) ?>" required/>
<!-- <i class="fa fa-user panel-icon form-control-feedback"></i> -->
         </div>
         <div class="col-lg-6">
             <label class="control-label">API Reference</label>
             <input type="text" class="form-control" name="accNo" placeholder="API Reference" value="<?= site::fp_retain ($powerwalletInfo['acc_num']) ?>" required/>
         <!-- <i class="fa fa-user panel-icon form-control-feedback"></i> -->
         </div>
     </div>
 </div>

  <!-- <div class="form-group">
<label class="control-label form-grey" style="font-weight:bold;" id="">Confirm with Password</label>
     <input type="password" class="form-control" name="password" required />

  </div> -->

 <hr class="dotted">

 <div class="form-group">

     <button type="submit" class="btn btn-primary btn-block" name="api_submit">Update</button>

 </div>  <?php } ?>


                  <!-- <hr class="dotted">

  <input type="submit" class="btn btn-primary btn-user btn-block" value="Register Account" name="signup"/> -->
  <hr>
  <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
    <i class="fab fa-google fa-fw"></i> Register with Google
  </a>
  <a href="index.html" class="btn btn-facebook btn-user btn-block">
    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
  </a> -->
</form>
