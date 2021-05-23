<?php

// require ('../includes/models/dashboard.php');
?>


          <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Funds</h1>
  <a href="#upcomingReturns" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-upload fa-sm text-white-50"></i> <?=$dbReturns->rowCount()?> Recent Changes</a>

</div>
<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total (Requests)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$fundStats['total']?></div>
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
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Processed (Requests)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$fundStats['proccessed']?></div>
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
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Active (Requests)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$fundStats['active']?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Failed (Requests)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$fundStats['failed']?></div>
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
  <div class="col-xl-12 col-lg-12">


    <div class="card shadow">
    <!-- <div class="card shadow mb-4"> -->

      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Funds</h6>
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
                            <th>Amount</th>
                            <th>Wallet</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>

<?php
$i = 1;
if ($dbAssets->rowCount()>0){
foreach($dbAssets as $row) {
$fundRef = $row['ref'];
$fundAmount = $row['amount'];
$fundWallet = $row['username'];
$fundDate = '<span class="text-primary">'.$row['init_date'].'</span> - <span class="text-danger">'.$row['exp_date'].'</span>';
$id= $row['id'];


// $showReady = ($status == 'ready') ? 'btn-success' : 'btn-primary';
// $vanish = ($status != 'ready') ? 'disabled text-muted' : '';
// $showStatus = ($status == 'ready') ? 'text-success' : 'text-primary';

// if ($status=='pending') {
//   // code...
//   $now_date = date_create(date('Y-m-d h:m:s'));
//   $mat_date = date_create($row['end_date']);
//   $diff = date_diff($now_date,$mat_date);
//   $days = $diff->format("%a");
// }
// $progress = ($status=='pending') ? '['.round(((31 - $days)/31)*100, 2).'%'.']' : '';

?>


<tr>
<td>
                <div class="btn-group">
									<!-- <button type="button" class="btn btn-warning dropdown-toggle btn-circle" data-toggle="dropdown"><i class="fas fa-wallet fa-fw"></i></button> -->
                  <button type="button" class="btn <?=$showReady?> btn-circle" data-toggle="dropdown"><i class="fas fa-plus-circle fa-fw"></i></button>
									<ul class="dropdown-menu" role="menu">
										<li class="dropdown-item disabled"><a href="#"><i class="fas fa-fw fa-eye"></i> View</a></li>
										<li class="dropdown-item <?=$vanish?>"><a href="?action=approve&Fund=<?=$id?>"><i class="fas fa-fw fa-check-circle"></i> Approve</a></li>
										<li class="dropdown-item <?=$vanish?>"><a href="?action=reject&Fund=<?=$id?>"><i class="fas fa-fw fa-times-circle"></i> Reject</a></li>
									</ul>
								</div>
                <?=$fundRef?>
                <!-- |<?= $i?> -->
  </td>
<!-- <td><?//= $plan . ' plan'?></td> -->
<td><?= $fundAmount ?></td>
<td><?= $fundWallet ?></td>
<td><?= $fundDate ?></td>


</tr>
  <?php

  $i++;
}

}
else{
?>
<tr>
  <td colspan="5">There is no requests yet</td>
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


</div>
