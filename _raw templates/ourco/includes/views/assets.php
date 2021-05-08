<?php

// require ('../includes/models/dashboard.php');
?>


          <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Assets</h1>
  <a class="btn btn-light" href="#" data-toggle="modal" data-target="#getStartedModal">
    <div class="text-center center text-primary">
    <i class="fas fa-info-circle"></i> <strong> How to Get Started </strong>
    </div>
  </a>
  
  <a href="#upcomingReturns" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-upload fa-sm text-white-50"></i> <?=$dbReturns->rowCount()?> Upcoming Returns</a>

</div>


<!-- Content Row -->
<div class="row">
  <div class="col-lg-6 mb-4">
    <!-- Illustrations -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Invest with Us</h6>
      </div>
      <div class="card-body">
        <div class="text-center">
          <!-- //content -->
          <form action="#plan" id="" method="post" name="invest_coin" class="">
            <div class="col-lg-12">
              <?php if ($page==1) {
                // code...
              ?>



                <div class="form-group">
                    <label> Enter The Amount You Want To Invest</label>
                    <div class="input-group">
                          <!-- <span class="input-group-addon"><i class="fas fa-database fa-sm fa-fw"></i></span> -->
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button"><?=$user_currency_symbol?></button>
                          </div>

                          <input id="" name="invest_amount" type="number" class="form-control" placeholder="Min of <?=ceil(MONEY::cur_convert('ourco', $user_currency,$minAssetFund, 0))?> in <?=$user_currency?>" min="<?=ceil(MONEY::cur_convert('ourco', $user_currency,$minAssetFund, 0))?>" required="true" />

                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                    </div>
                </div>
                <small id="CurrencyValue" class="form-text text-muted mb-1">NB: 1 Ourcoin <i class="fas fa-exchange-alt"></i> <?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, 1, 1), 2);?></small>

                <div class="col-lg-auto">
                  <div class="form-group">
                    <input id="" type="submit" name="choose_plan" class="form-control btn btn-primary" value="Choose Plan" />
                  </div>
                </div>


              <?php } elseif ($page==2) { ?>
                <div class="text-lg">
                  <i class="fas fa-database fa-sm fa-fw"></i><?= $capital ?> [ <span><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $capital, 1), 2);?></span> ]
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
                    <i class="fas fa-database fa-sm fa-fw"></i><?= $capital ?> [ <span><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $capital, 1), 2);?></span> ]
                  </div>
                  <div class="form-group text-lg">
                    <label>You Don't Have Enough To Make This Happen!</label>

                  </div>

                  <small id="CurrencyNote" class="form-text text-muted">NB: Ourcoin will be used as standard in our operation whiles its values will be converted to or from your chosen default currency.</small>


                    <div class="col-lg-auto">
                      <div class="form-group">
                        <a id="" class="form-control btn btn-primary" href="../pages/funds">Add Funds</a>
                      </div>
                    </div>

                <?php } ?>

                <div class="col-lg-auto mt-3">
                  <label for="" class="mt-2 mb-2">OR</label>
                  <div class="form-group">
                    <a id="" class="form-control" href="../pages/assets">Start Over</a>
                  </div>
                </div>
                        <!-- <label> The minimum amount required is GHC 50</label> -->
            </div>
          </form>
        </div>
        <!-- <p>Add some quality, svg illustrations to your project courtesy of  -->
          <!-- <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a> -->
          <!-- , a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p> -->
          <br/>
          <p>To know what's new in ourcomunity 3.0 </>
        <a target="_blank" href="https://www.youtube.com/channel/UCtsKXK9lC6ShePjyh82aOkA">Please Subscribe To Our Youtube Channel &rarr;</a></p>
      </div>
    </div>
  </div>
  <!-- Content Column -->
  <div class="col-lg-6 mb-4" id="upcomingReturns">

    <!-- Project Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Upcoming Returns</h6>
      </div>
      <div class="card-body">
        <div class="scroll-area-lg">
            <div class="scrollbar-container ps--active-y">
<?php
        if ($dbReturns->rowCount()>0){
        foreach($dbReturns as $row) {
        $init_date = date_create($row['initial_date']);
        $now_date = date_create(date('Y-m-d h:m:s'));
        $mat_date = date_create($row['mature_date']);
        $diff = date_diff($now_date,$mat_date);
        $days = $diff->format("%a");
        $growth= round(((31 - $days)/31)*100, 2);
        // $growth= $growth + 0;
        $id = $row['id'];
        $capital = $row['cur_value'];
        $status = $row['status'];
        $cycle = $row['cycle'];
        $returns = $row['returns'];
        $cur_return = round($returns-(($returns/31)*$days), 2);

        ?>


        <!-- <h4 class="small font-weight-bold"><i class="fas fa-database fa-sm fa-fw"></i>2300000.00 <span class="float-right">1/5</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-info progress-bar-striped active" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% 3 days left</div>
        </div> -->
        <?php if($status == 'matured'){ ?>
        <form class="mb-4" action="#clear" method="post"/>
          <h4 class="small font-weight-bold text-primary"><i class="fas fa-database fa-sm fa-fw"></i><?= $returns ?> <span class="float-right"><?= $cycle ?></span></h4>
          <div class="progress mb-1">
            <div class="progress-bar bg-success progress-bar-striped active" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Matured!</div>
          </div>
            <a href="?cashoutReturn=<?=$id?>" class="form-control text-center">Cashout</a>
        </form>
      <?php } else {  ?>
        <h4 class="small font-weight-bold"><i class="fas fa-database fa-sm fa-fw"></i> <span class="text-primary"><?=$cur_return?></span> / <?= $returns ?> <span class="float-right"><?= $cycle ?></span></h4>
        <div class="progress mb-4">
          <div class="progress-bar progress-bar-animated progress-bar-striped active" role="progressbar" style="width: <?= $growth ?>%" aria-valuenow="<?= $growth ?>" aria-valuemin="0" aria-valuemax="100"><?=$growth?>% <?= $diff->format("%R%a days") ?> left</div>
        </div>
        <?php }
      }
    } else {
      ?>
      <h3 class="text-lg font-weight-bold">You have no upcoming returns</h3>
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

  <!-- Earnings (Monthly) Card Example -->
  <!-- <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">$0</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <!-- Earnings (Monthly) Card Example -->
  <!-- <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Capital (Total)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">$0</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <!-- Earnings (Monthly) Card Example -->
  <!-- <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Queue (Settlement)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">#0</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <!-- Pending Requests Card Example -->
  <!-- <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div> -->
</div>

<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">


    <div class="card shadow">
    <!-- <div class="card shadow mb-4"> -->

      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Assets</h6>
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
                            <th>Action|#</th>

                            <!-- <th>Plan</th> -->
                            <th>Capital</th>
                            <th>Returns/Cycle</th>
                            <!-- <th>Cycle</th> -->
                            <th>status</th>

                        </tr>
                    </thead>
                    <tbody>

<?php
$i = 1;
if ($dbAssets->rowCount()>0){
foreach($dbAssets as $row) {
$capital = $row['capital'];
$status = $row['status'];
$bonus = $row['bonus'];
$returns = $row['returns_monthly'].'/Cycle';
$id= $row['dir'];


$showReady = ($status == 'ready') ? 'btn-success' : 'btn-primary';
$vanish = ($status != 'ready') ? 'disabled text-muted' : '';
$showStatus = ($status == 'ready') ? 'text-success' : 'text-primary';

if ($status=='pending') {
  // code...
  $now_date = date_create(date('Y-m-d h:m:s'));
  $mat_date = date_create($row['end_date']);
  $diff = date_diff($now_date,$mat_date);
  $days = $diff->format("%a");
}
$progress = ($status=='pending') ? '['.round(((31 - $days)/31)*100, 2).'%'.']' : '';

?>


<tr>
<td>
                <div class="btn-group">
									<!-- <button type="button" class="btn btn-warning dropdown-toggle btn-circle" data-toggle="dropdown"><i class="fas fa-wallet fa-fw"></i></button> -->
                  <button type="button" class="btn <?=$showReady?> btn-circle" data-toggle="dropdown"><i class="fas fa-wallet fa-fw"></i></button>
									<ul class="dropdown-menu" role="menu">
										<li class="dropdown-item disabled"><a href="#"><i class="fas fa-fw fa-eye"></i> View</a></li>
										<li class="dropdown-item <?=$vanish?>"><a href="?cash=in&Capital=<?=$id?>"><i class="fas fa-fw fa-bullseye"></i> Cash In</a></li>
										<li class="dropdown-item <?=$vanish?>"><a href="?cash=out&Capital=<?=$id?>"><i class="fas fa-fw fa-wallet"></i> CashOut</a></li>
									</ul>
								</div>
                |<?= $i?>
  </td>
<!-- <td><?//= $plan . ' plan'?></td> -->
<td><?= $capital ?><?php if($bonus > 0){ echo ' + '.$bonus.' bonus';} ?></td>
<td><?= $returns ?></td>
<!-- <td><?//= $cycles_left.' '.$progress ?></td> -->
<td> <span class="<?=$showStatus?>"><?= $status ?></span> <?=$progress?> <?php if($status == 'active'){ echo '['; echo $row['cycles']-$row['cur_cycle'].' cycles left]';} ?></td>

</tr>
  <?php

  $i++;
}

}
else{
?>
<tr>
  <td colspan="5">You have no assets yet</td>
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
