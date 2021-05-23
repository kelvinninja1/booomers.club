<?php
// $ref_points = 1;
//     $approvals = 2;
//     $boom_points = 3;
//     $no_refs = 4;
//     $base_url = "localhost/boomers";
//     $username = "ikelvin";

// $user_info = data::users_tb()[0];

// require ('../includes/models/dashboard.php');

?>


          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a class="btn btn-light" href="#" data-toggle="modal" data-target="#getStartedModal">
              <div class="text-center center text-primary">
              <i class="fas fa-info-circle"></i> <strong> How to Get Started </strong>
              </div>
            </a> -->
            <a class="btn btn-light" href="#" data-toggle="modal" data-target="#getStartedModal">
              <div class="text-center center text-primary">
              <i class="fas fa-info-circle"></i> <strong> How to Get Started </strong>
              </div>
            </a>
            
            <a href="https://www.youtube.com/channel/UCtsKXK9lC6ShePjyh82aOkA" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fab fa-youtube fa-sm text-white-50"></i> Go To Youtube</a>
          </div>
<?php /* if($powerstatus['badge'] == '2019' && $mustSettle == 'yes') {

  ?>
          <div class="row">
                <div class="col-lg-3 mb-4">
                  <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                      2019 Investment
                      <div class="text-white-50 small"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $settlement['investment'], 1), 2);?> Balance</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-success text-white shadow">
                    <div class="card-body">
                      2019 Profit & 2020 Profit Growth-Cut
                      <div class="text-white-50 small"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $settlement['profit'], 1), 2);?> Balance <span class="text-danger large bg-warning pl-2 pr-2"> On Dec 31, 2019</span></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 mb-4">
                  <div class="card bg-info text-white shadow">
                    <div class="card-body">
                      2019 Wallet
                      <div class="text-white-50 small"><<?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $settlement['wallet_balance'], 1), 2);?> Balance</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 mb-4">
                  <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                      5% Update Bonus
                      <div class="text-white-50 small"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $settlement['bonus'], 1), 2);?> Balance</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 mb-4">
                  <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                      Reserved Wallet
                      <div class="text-white-50 small"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $settlement['reserved'], 1), 2);?> Balance</div>
                    </div>
                  </div>
                </div>
                <!-- <div class="col-lg-3 mb-4">
                  <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                      2020 Profit Growth-Cut
                      <div class="text-white-50 small"><i class="fas fa-database fa-sm fa-fw"></i><?//= $settlement['profit_cut']?> <span class="text-danger large bg-warning pl-2 pr-2"> On Dec 31, 2019</span></div>
                    </div>
                  </div>
                </div> -->
                <div class="col-lg-6 mb-4" id="claim">
                  <div class="card bg-pink text-primary shadow">
                  <div class="row">
                    <div class="card-body col-lg-6">
                      Total: <?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency,  $totalSettle, 1), 2);?> Cash In as ->
                      <div class="text-primary-50 small"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $totalSettle, 1), 2);?> to Reserved
                         <!-- + <i class="fas fa-database fa-sm fa-fw"></i><?//= $settlement['bonus']?> to Bonus -->
                       </div>
                    </div>
                    <?php if ($accountStatus == 'active'): ?>
                      <a href="#" data-toggle="modal" data-target="#cashinSettlementModal" class="card-body bg-primary text-white col-lg-6">
                        Cash In <i class="fas fa-wallet fa-fw"></i>
                        <div class="text-white-50 small"><i class="fas fa-sign-out-alt fa-sm fa-fw"></i>Click To Claim</div>
                      </a>
                    <?php else: ?>
                      <a href="#" onclick="alert('You must have an Active Asset or Account To Claim Settlement');" class="card-body bg-primary text-white col-lg-6">
                        Cash In <i class="fas fa-wallet fa-fw"></i>
                        <div class="text-white-50 small"><i class="fas fa-sign-out-alt fa-sm fa-fw"></i>Click To Claim</div>
                      </a>
                    <?php endif; ?>

                  </div>
                  </div>
                </div>
          </div>
<?php } */?>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $monthlyEarnings, 1), 2);?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Capital (Total)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $totalCapital, 1), 2);?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Stake</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=round($totalStake, 2)?>%</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">80%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?=$noRequests?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">


              <div class="card shadow">
              <!-- <div class="card shadow mb-4"> -->

                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Activity Log</h6>
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

                <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger text-white">
                          Timeline
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <?php
                      $i = 0;
foreach($dbUserActs as $uacts) {
$act_details = $uacts['activity'];
$act_time = $uacts['act_time'];
if($i>4){
  break;
}
  ?>
                       <!-- timeline item -->
                       <div>
                        <i class="fas fa-camera bg-default"></i>
                        <div class="timeline-item">

                          <h3 class="timeline-header"><a href="#">You</a> <?= $act_details ?>
                          <span class="time"><i class="far fa-clock"></i> <?= $act_time ?></span></h3>

                        </div>
                      </div>
                      <!-- END timeline item -->
<?php
$i++;
 } ?>
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>

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


                <div class="main-card mb-3 card">

                                    <div class="card-body">
                                    <div class="rows">
        <div class="col-md-12">
        <label for="email">Referral Link:</label><br/>
        <div class="form-group input-group">
            <input id="reflink" type="text" class="form-control "  value="<?= site::fp_retain($base_url); ?>/ref/<?= site::fp_retain($poweruser['username']); ?>"/><a class="input-group-addon btn btn-primary text-white" data-clipboard-action="copy" data-clipboard-target="#reflink">Copy Link</a>

    <!-- Done with ref link -->

        </div></div><h5 class="card-title">My Community</h5>
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

                <div class="card-body">

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
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <!-- <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Investments</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Account Setup Fund <span class="float-right">Verification Pending!</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>

                </div>
              </div> -->

               <!-- Approach -->
               <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Ourcomunity 3.1 Release Note</h6>
                </div>
                <div class="card-body">
                  <!-- <p class="center"><b>Coming Soon</b></p> -->
                  <!-- <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p> -->
                  <a class="btn btn-light" href="#" data-toggle="modal" data-target="#getStartedModal">
                    <div class="text-center center text-primary">
                    <i class="fas fa-info-circle"></i> <strong> How to Get Started </strong>
                    </div>
                  </a>
                  <p class="center"><b> Here is a way forward.</b></p>
                  <p class="mb-0">
                    <ul>
                      <li>Add Funds</li>
                      <li>Invest With US</li>
                      <li>Watch Your Capital Work For You</li>
                    </ul>
                  </p>
                  <p class="center"><b>NB: New Feature list, Changelogs and walkthrough will be droping soon</b> </p>
                </div>
              </div>

              <!-- Color System -->
              <!-- <div class="row">
                <div class="col-lg-6 mb-4">
                  <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                      Primary
                      <div class="text-white-50 small">#4e73df</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-success text-white shadow">
                    <div class="card-body">
                      Success
                      <div class="text-white-50 small">#1cc88a</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-info text-white shadow">
                    <div class="card-body">
                      Info
                      <div class="text-white-50 small">#36b9cc</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                      Warning
                      <div class="text-white-50 small">#f6c23e</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                      Danger
                      <div class="text-white-50 small">#e74a3b</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                      Secondary
                      <div class="text-white-50 small">#858796</div>
                    </div>
                  </div>
                </div>
              </div> -->

            </div>

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <!-- <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="../static/img/undraw_posting_photo.svg" alt=""> -->
                    <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/SznPi2D1CRk" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
</div>
                  </div>
                  <!-- <p>Add some quality, svg illustrations to your project courtesy of  -->
                    <!-- <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a> -->
                    <!-- , a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p> -->
                    <br/>
                    <p>To know what's new in ourcomunity 3.1 </>
                  <a target="_blank" href="https://www.youtube.com/channel/UCtsKXK9lC6ShePjyh82aOkA">Please Subscribe To Our Youtube Channel &rarr;</a>
                </div>
              </div>

              <!-- Approach -->
              <!-- <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                  <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
                  <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
                </div>
              </div> -->

            </div>
          </div>
