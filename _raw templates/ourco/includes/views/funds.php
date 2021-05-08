<?php

// require ('../includes/models/dashboard.php');
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Wallet</h1>
  <a class="btn btn-light" href="#" data-toggle="modal" data-target="#getStartedModal">
    <div class="text-center center text-primary">
    <i class="fas fa-info-circle"></i> <strong> How to Get Started </strong>
    </div>
  </a>
  
  <a href="#upcomingReturns" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-upload fa-sm text-white-50"></i> <?=$dbRequests->rowCount()?> Incomplete Requests</a>

</div>


<!-- Content Row -->
<div class="row">
  <div class="col-lg-6 mb-4">
    <!-- Illustrations -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Funds</h6>
      </div>
      <div class="card-body">
        <div class="text-center">
          <!-- //content -->


          <form action="#funds" id="" method="post" name="funds" class="">
            <div class="col-lg-12">
              <?php if ($page==1) {
                // code...
              ?>

              <div class="form-group">
                  <label class="control-label">Choose Payment Method</label>


                  <select name="pay_method" class="form-control" required>
                  <?php if ($user_pay_method != "Add Your Own Bank") {
                          # code...
                           echo '<option value="'.$userPayMethodID.'" selected>'.$userPayMethod.'</option>';
                         }

                          if($dbPlans->rowCount()>0){
                            foreach ($dbPlans as $row) {
                              // code...
                              $id = $row['dir'];
                              $method_name = $row['plan_name'];
                              echo '<option value="'.$id.'"> '.$method_name.'</option>';
                            }
                          }  ?>
                  </select>
              </div>


                <div class="form-group">
                    <label> Enter The Amount You Want To Add</label>
                  <div class="input-group">
                        <!-- <span class="input-group-addon"><i class="fas fa-database fa-sm fa-fw"></i></span> -->
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-secondary" type="button"><?=$user_currency_symbol?></button>
                        </div>

                        <input id="" name="amount" type="number" class="form-control" placeholder="Min of <?=ceil(MONEY::cur_convert('ourco', $user_currency,$minFundAmount, 0))?> in <?=$user_currency?>" min="<?=ceil(MONEY::cur_convert('ourco', $user_currency,$minFundAmount, 0))?>" required="true" />

                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                  </div>


                </div>
                <small id="CurrencyValue" class="form-text text-muted mb-1">NB: 1 Ourcoin <i class="fas fa-exchange-alt"></i> <?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, 1, 1), 2);?>.</small>

                <div class="col-lg-auto">
                  <div class="form-group">
                    <input id="" type="submit" name="submit" class="form-control btn btn-primary" value="Add Funds" />
                  </div>
                </div>


              <?php } elseif ($page==2) { ?>
                  <div class="form-group">
                    <label> Enter The Amount You Want To withdraw</label>
                    <div class="input-group">
                          <!-- <span class="input-group-addon"><i class="fas fa-database fa-sm fa-fw"></i></span> -->
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button"><?=$user_currency_symbol?></button>
                          </div>

                          <input id="" name="amount" type="number" class="form-control" placeholder="Min of <?=ceil(MONEY::cur_convert('ourco', $user_currency,$minCashoutAmount, 0))?> in <?=$user_currency?>" min="<?=ceil(MONEY::cur_convert('ourco', $user_currency,$minCashoutAmount, 0))?>" required="true" />

                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                    </div>

                  </div>
                  <small id="CurrencyValue" class="form-text text-muted mb-1">NB: 1 Ourcoin <i class="fas fa-exchange-alt"></i> <?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, 1, 1), 2);?>.</small>

                  <div class="col-lg-auto">
                    <div class="form-group">
                      <input id="" type="submit" name="submit" class="form-control btn btn-primary" value="Withdraw" />
                    </div>
                  </div>


                <?php } elseif ($page==3) { ?>
                <div class="text-lg">
                  <i class="fas fa-database fa-sm fa-fw"></i><?= $capital ?> [ <span>$<?= $capital?></span> ]
                </div>
                <div class="form-group">
                  <label>Choose An Investment Plan</label>
                  <div class="input-group">
                      <?php

                      if($DBplansNo>0){
                              foreach ($DBplans as $row) {
                                   $id = $row['dir'];
                                   $plan = $row['plan'];
                                 /* $date = $row['date']; */
                                  $status = $row['status'];

                                  $cycles = $row['cycles'];
                                  $interest = $row['percent_interest'];

                                  $ireturns = $interest * $cycles;
                                 ?>
                  <div class="radio">
                      <label>
                          <input type="radio" name="optionPlans" value="<?= $id ?>" required />
                          <?= $plan.' ('.$ireturns.'% returns on '.$interest.'% Growth/Cycle'.')' ;?>
                      </label>
                  </div>
                                 <?php

                              }

                          }
                          else{
                            echo "No Plan yet, Please contact admin.";
                          }
                          ?>
                  </div>
                </div>

                <small id="CurrencyNote" class="form-text text-muted">NB: Ourcoin will be used as standard in our operation whiles its values will be converted to or from your chosen default currency.</small>

                  <input id="" name="capital" type="hidden" class="form-control" value="<?=$capital?>" required="true" />
                  <div class="col-lg-auto">
                    <div class="form-group">
                      <input id="" type="submit" name="get_asset" class="form-control btn btn-primary" value="Invest With Us" />
                    </div>
                  </div>

                <?php } else { ?>
                  <div class="text-lg">
                    <!-- <i class="fas fa-database fa-sm fa-fw"></i><?= $capital ?> [ <span>$<?= $capital?></span> ] -->
                  </div>

                  <div class="form-group text-lg">

                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <a id="" class="form-control btn btn-primary" href="?fund=add">Add Funds</a>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <a id="" class="form-control btn btn-primary" href="?fund=withdraw">Withdraw Funds</a>
                        </div>
                      </div>
                    </div>
                    <h6 class="">
                      NB: <i class="fas fa-database fa-sm fa-fw"></i>1 (Ourcoin) <i class="fas fa-exchange-alt"></i> <?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, 1, 1), 2);?>
                    </h6>

                    <div class="mb-2">
                      <div class="text-gray-500"><i class="badge badge-primary badge-counter ">Available In Wallet</i></div>
                      <div>
                      <i class="fas fa-database fa-sm fa-fw"></i> <?= site::fp_retain($powerwallet['available']) ?>
                       <i class="fas fa-exchange-alt"></i> <?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, site::fp_retain($powerwallet['available']), 1), 2);?>
                      </div>
                    </div>

                    <div class="mb-2">
                      <div class="text-gray-500"><i class="badge badge-primary badge-counter ">Reserved In Wallet</i></div>
                      <div>
                      <i class="fas fa-database fa-sm fa-fw"></i> <?= site::fp_retain($powerwallet['reserved']) ?>
                       <i class="fas fa-exchange-alt"></i> <?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, site::fp_retain($powerwallet['reserved']), 1), 2);?>
                      </div>
                    </div>

                    <div class="mb-2">
                      <div class="text-gray-500"><i class="badge badge-primary badge-counter ">Bonus In Wallet</i></div>
                      <div>
                      <i class="fas fa-database fa-sm fa-fw"></i> <?= site::fp_retain($powerwallet['bonus']) ?>
                       <i class="fas fa-exchange-alt"></i> <?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, site::fp_retain($powerwallet['bonus']), 1), 2);?>
                      </div>
                    </div>

                    <div class="mb-2">
                      <div class="text-gray-500"><i class="badge badge-primary badge-counter ">Total In Wallet</i></div>
                      <div>
                      <i class="fas fa-database fa-sm fa-fw"></i> <?= site::fp_retain($powerwallet['available']+$powerwallet['reserved']+$powerwallet['bonus']) ?>
                       <i class="fas fa-exchange-alt"></i>  <?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, site::fp_retain($powerwallet['available']+$powerwallet['reserved']+$powerwallet['bonus']), 1), 2);?>
                      </div>
                    </div>
                  <hr/>


                    <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a> -->
                    <!-- <a class="text-center small text-gray-500" href="#">Wallet Not Ready Yet</a> -->

                  </div>

                  <!-- <label>You Don't Have Enough To Make This Happen!</label> -->
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <a id="" class="form-control btn btn-primary" href="#" data-toggle="modal" data-target="#CurrencyModal"><i class="fas fa-sign-in-alt mr-1"></i> <strong> Change Currency </strong></a>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <a id="" class="form-control btn btn-primary" href="../pages/setting"> <i class="fas fa-tasks mr-1"></i> <strong> Payment Settings </strong> </a>
                      </div>
                    </div>
                  </div>


                <?php } ?>
                  <small id="CurrencyNote" class="form-text text-muted">NB: Ourcoin will be used as standard in our operation whiles its values will be converted to or from your chosen default currency.</small>
                  <?php if($page!=0) { ?>
                <div class="col-lg-auto mt-3">
                  <label for="" class="mt-2 mb-2">OR</label>
                  <div class="form-group">
                    <a id="" class="form-control" href="../pages/funds">Start Over</a>
                  </div>
                </div>
              <?php }?>
                        <!-- <label> The minimum amount required is GHC 50</label> -->
            </div>
          </form>
        </div>
        <!-- <p>Add some quality, svg illustrations to your project courtesy of  -->
          <!-- <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a> -->
          <!-- , a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p> -->
          <br/>
          <p>To know what's new in ourcomunity 3.1 </>
        <a target="_blank" href="https://www.youtube.com/channel/UCtsKXK9lC6ShePjyh82aOkA">Please Subscribe To Our Youtube Channel &rarr;</a></p>
      </div>
    </div>
  </div>


  <!-- Content Column -->

  <div class="col-lg-6 mb-4" id="upcomingReturns">

    <!-- Project Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Incomplete Requests</h6>
      </div>
      <div class="card-body">
        <div class="scroll-area-lg">
            <div class="scrollbar-container ps--active-y">


<?php
        if ($dbRequests->rowCount()>0){
        foreach($dbRequests as $row) {
        // $init_date = date_create($row['init_date']);
        // $now_date = date_create(date('Y-m-d h:m:s'));
        // $mat_date = date_create($row['exp_date']);
        // $diff = date_diff($now_date,$mat_date);
        // $days = $diff->format("%a");
        // $growth= round(((31 - $days)/31)*100, 2);
        // $growth= $growth + 0;
        $exp_date = $row['exp_date'];
        $id = $row['id'];
        $request = $row['request'];
        $status = $row['status'];
        $ref = $row['ref'];
        $amount = $row['amount'];
        $method = $row['method'];
        $type =  $row['type'];
        $account_type = $row['account_type'];
        $pay_method = $row['plan_name'];
        $def_currency = $row['def_currency'];
        $pay_cur_symbol = $row['symbol'];
        $cash_cur_symbol = $user_currency_symbol;
        // TODO: Get User default currency and $cash_cur_symbol
        // TODO: Get Payment default currency and $pay_cur_symbol
        // TODO: Convert to user default currency and use $cash_cur_symbol
        // TODO: Convert to Payment default currency and use $pay_cur_symbol
        // $account_type = DB::fetch("SELECT `account_type` FROM `payment_plans` WHERE `dir`='$method'")[0][0];

        $from = 'ourco';

        $to = $def_currency;
        $cash_cur_amount = round(MONEY::cur_convert($from, $user_currency, $amount, 1), 2);
        $pay_amount = round(MONEY::cur_convert($from, $to, $amount, 1), 2);
        //$cur_return = round($returns-(($returns/31)*$days), 2);
        $show = ($request == 'fund') ? 'text-primary' : 'text-danger';
        include ('../includes/models/fundsInfo.php');

        ?>


        <!-- <h4 class="small font-weight-bold"><i class="fas fa-database fa-sm fa-fw"></i>2300000.00 <span class="float-right">1/5</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-info progress-bar-striped active" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% 3 days left</div>
        </div> -->

        <?php if($status == 'issued'){ ?>
        <!-- <form class="mb-4" action="#clear" method="post"/> -->
        <div class="mb-4">
          <h4 class="small font-weight-bold <?=$show?>"><i class="fas fa-database fa-sm fa-fw"></i><?= $amount ?> <span class="float-right">#<?= $ref ?></span></h4>
          <!-- Collapsable Card Example -->
              <div class="card shadow mb-1">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Details</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">

                    <div class="panel panel-primary">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-auto text-left">
                                  <div class="huge"><?= $ref ?></div>
                                  <div>Reference Code</div>
                              </div>
                              <div class="col-auto">

                              </div>
                              <div class="col-auto text-right float-right">
                                  <div class="huge"><?= $cash_cur_symbol.$cash_cur_amount ?></div>
                                  <div>Pay as: <?= $pay_cur_symbol.$pay_amount ?></div>
                              </div>
                              <div class="col-xs-12 text-center">
                                  <?= $paydata ?>
                              </div>
                              <form method="post">
                                <input type="hidden" name="confirm_id" value="<?= $id?>">
                              </form>
                          </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="row m-1">
                <a href="?fund=confirm&request=<?=$id?>" class="form-control text-center col-md-6 btn-primary">Confirm</a>
                <a href="?fund=cancel&request=<?=$id?>" class="form-control text-center col-md-6 btn-danger">Cancel</a>
              </div>
        </div>
        <!-- </form> -->
      <?php } else {  ?>
        <h4 class="small font-weight-bold"><i class="fas fa-database fa-sm fa-fw"></i> <span class="text-primary"><?=$amount?></span><span class="float-right">#<?= $ref ?></span></h4>
        <div class="progress mb-4">
          <div class="progress-bar progress-bar-animated progress-bar-striped progress-lg" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Pending...</div>
        </div>
        <?php }
      }
    } else {
      ?>
      <h3 class="text-lg font-weight-bold">You have no incomplete requests</h3>
      <?php
    }
        ?>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Content Row -->
<div class="row">
</div>

<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">


    <div class="card shadow">
    <!-- <div class="card shadow mb-4"> -->

      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Activity/History</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <!-- <div class="dropdown-header">Dropdown Header:</div>
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a> -->
          </div>
        </div>
      </div>
      <!-- Card Body -->

      <div class="card-body">
        <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Capital</th>
                            <th>Date|Time</th>


                        </tr>
                    </thead>
                    <tbody>

<?php
$i = 1;
if ($dbFunds->rowCount()>0){
foreach($dbFunds as $row) {
$amount = $row['amount'];
$status = $row['status'];
$date = $row['date'];
$id= $row['id'];

?>


<tr>
<td><?= $i?></td>
<td><?= $amount ?></td>
<td><?= $date ?></td>

</tr>
  <?php

  $i++;
}

}
else{
?>
<tr>
  <td colspan="3">You have no activity yet</td>
</tr>


<?php
}

?>
                                  </tbody>
                              </table>
                          </div>
                          <!-- /.table-responsive -->
                      </div>
                      <!-- /.col-lg-4 (nested) -->

                      <!-- /.col-lg-8 (nested) -->
                  </div>
                  <!-- /.row -->



        <!-- <div class="chart-area">
          <canvas id="myAreaChart"></canvas>
        </div> -->
      </div>
    </div>

    <!-- <div>
        <canvas id="myCanvas" width="1000" height="600" style="max-width:100%;heigth:auto;" class="pull-left"></canvas>
      </div> -->

  </div>


  <!-- Pie Chart -->
  <div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Referal Network</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Dropdown Header:</div>
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
      </div>
      <!-- Card Body -->
      <!-- <style>
        .scroll-area{overflow-x:hidden;height:400px}.scroll-area-xs{height:150px;overflow-x:hidden}.scroll-area-sm{height:200px;overflow-x:hidden}.scroll-area-md{height:300px;overflow-x:hidden}.scroll-area-lg{height:400px;overflow-x:hidden}.scroll-area-x{overflow-x:auto;width:100%;max-width:100%}
      </style> -->

<div class="main-card mb-3 card">

  <div class="card-body">
    <div class="rows">
      <div class="col-md-12">
        <label for="email">Referral Link:</label><br/>
        <div class="form-group input-group">
            <input id="reflink" type="text" class="form-control "  value="<?= site::fp_retain($base_url); ?>/ref/<?= site::fp_retain($poweruser['username']); ?>"/><a class="input-group-addon btn btn-primary text-white" data-clipboard-action="copy" data-clipboard-target="#reflink">Copy Link</a>

          <!-- Done with ref link -->

        </div>
    </div>
    <h5 class="card-title">My Community</h5>
        <div class="scroll-area-sm">
            <div class="scrollbar-container ps--active-y"><table id="" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>username</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                    if(1){
                        foreach($dbreferals as $refs) {

                            //print_r($refs);
                            $referer = $refs['referer'];
                            $referee = $refs['referee'];
                            $refUserName = $refs['username'];
                            $status = $refs['status'];
                            ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td>
                                    <?php if ($status == "ready") {
                                    ?>
                                    <span class="fa fa-fw fa-circle text-success"></span>
              <?php } elseif ($status == "settled") {
              ?>
              <span class="fa fa-fw fa-circle text-primary"></span>

            <?php } elseif ($status == "unsettled") {
              ?><span class="fa fa-fw fa-circle"></span>

              <?php } elseif ($status == "banned") {
              ?><span class="fa fa-fw fa-circle text-danger"></span>
              <?php }
              ?>

              <?= $refUserName ?>


              <?php
              //$ref_settle = "done";
              if ($status == "settled") {
               ?>
               <span class="fa fa-fw fa-check text-success"></span>
                <?php }
              ?>
                        </td>

                                <td><?= $status ?></td>

                            </tr><?php

                            $i++;
                        }

                    }
                    else{
                       echo '
                        <tr>
                            <td colspan="3">You have no referals yet</td>
                        </tr> ';



                    }
                ?>
            </table>
            </div>
        </div>
    </div>
</div>

      <!-- <div class="card-body"> -->

        <div class="mt-4 text-center small">
          <span class="mr-2">
            <i class="fas fa-circle"></i> Unsettled
          </span>
          <span class="mr-2">
            <i class="fas fa-circle text-success"></i> Settled
          </span>
          <span class="mr-2">
            <i class="fas fa-circle text-danger"></i> Banned
          </span>
        </div>
      <!-- </div> -->
    </div>
  </div>
</div>
</div>
