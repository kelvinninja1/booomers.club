<?php
// $ref_points = 1;
//     $approvals = 2;
//     $boom_points = 3;
//     $no_refs = 4;
//     $base_url = "localhost/boomers";
//     $username = "ikelvin";

// $user_info = data::users_tb()[0];

require ('../includes/models/dashboard.php');
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">BackOffice</h1>
                    <?php// echo( "RSR"); print_r($poweruser); ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
            <div class="panel-group" id="accordion">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed"><i class="fa fa-info-circle"></i> Notice Board <i class="fa fa-angle-down right icon-collapsed"></i><i class="fa fa-angle-up right icon-expanded"></i></a>
							</h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse">
										<div class="panel-body">There is currently no new notice to see here.</div>
									</div>
								</div>
								
							</div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $ref_points ?></div>
                                    <div>Referal Points!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#refPointsPlace">
                            <div class="panel-footer">
                                <span class="pull-left">Buy More</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $approvals ?></div>
                                    <div>Approval(s)!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#approvalsPlace">
                            <div class="panel-footer">
                                <span class="pull-left">View Approval(s)</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $boom_points ?></div>
                                    <div>Boom Point(s)!</div>
                                </div>
                            </div>
                        </div>
                        <a data-toggle="modal" data-target="#large-modal">
                            <div class="panel-footer">
                                <span class="pull-left">Get Coupons</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $no_refs ?></div>
                                    <div>Referal(s)!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#ref_net_users">
                            <div class="panel-footer">
                                <span class="pull-left">View Network</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            
            <div class="rows">
        <div class="col-md-8">
        <label for="email">Referral Link:</label><br/>
        <div class="form-group input-group">
            <input id="reflink" type="text" class="form-control "  value="<?= $base_url ?>/join/<?= $username ?>"/><a class="input-group-addon btn btn-primary" data-clipboard-action="copy" data-clipboard-target="#reflink">Copy Link</a>
            
                

    <!-- 2. Include library -->
    <script src="../static/dist/js/clipboard.min.js"></script>

    <!-- 3. Instantiate clipboard -->
    
            <script>
    var clipboard = new ClipboardJS('.btn');

    clipboard.on('success', function(e) {
        console.log(e);
    });

    clipboard.on('error', function(e) {
        console.log(e);
    });
    </script>
    <!-- Done with ref link -->
            
        </div>

        <div class="panel-group" id="accordion">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne1" class="collapsed">Referal Status<i class="fa fa-angle-down right icon-collapsed"></i><i class="fa fa-angle-up right icon-expanded"></i></a>
							</h4>
									</div>
									<div id="collapseOne1" class="panel-collapse collapse">
										<div class="panel-body">You have <strong> <?= $ref_points ?></strong> Referal Points Remaining.</div><br><a href="#" class="btn btn-default btn-block" data-toggle="modal" data-target="#GetPointsModal">Buy Points</a>
									</div>
								</div>
								
								<!-- <div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree3" class="">Collapsible Group Item #3 <i class="fa fa-angle-down right icon-collapsed"></i><i class="fa fa-angle-up right icon-expanded"></i></a>
							</h4>
									</div>
									<div id="collapseThree3" class="panel-collapse collapse in">
										<div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
									</div>
								</div> -->
							</div>
    </div>
        <!-- /.panel --><div class="col-md-4">
        <div class="panel panel-default" id="refPointsPlace">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Referal Points
                        </div>
                        <div class="panel-body">
                            <div class="text-center"><strong><?= $ref_points ?></strong><br/> Remaining</div><br/>
                            <a href="#" class="btn btn-default btn-block" data-toggle="modal" data-target="#GetPointsModal">Buy Points</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    </div></div><br /><br />

                    


            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                   <!--  <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <!-- /.panel-heading -->
                        <!-- <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div> -->
                        <!-- /.panel-body -->
                   <!-- </div> -->
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Approval Request(s)
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Views(s)
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Approved</a>
                                        </li>
                                        <li><a href="#">Confirmed</a>
                                        </li>
                                        <li><a href="#">Rejected</a>
                                        </li>
                                       <!--  <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                
                                    <div class="table-responsive">
                                        
                                    <div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree3i" class="">Incomplete Request! <i class="fa fa-angle-down right icon-collapsed"></i><i class="fa fa-angle-up right icon-expanded"></i></a>
							</h4>
									</div>
									<div id="collapseThree3i" class="panel-collapse collapse in">
										<div class="panel-body">You have no incomplete requests.</div>
									</div>
								</div>
                                    <center>
                                    A list of Requests to be confirmed or approved by you
</center><br/>
                                    <!-- <br/>fqeifgigewfgwefwfdhfhhgfkfy -->
                                        <table class="table table-bordered table-hover table-striped" id="approvalsPlace">
                                            <thead>
                                                <tr>
                                                    <th>#/Action</th>
                                                    <th>Boomer</th>
                                                    <th>Date/Time</th>
                                                    
                                                    <th>Value/Status</th>
                                                </tr>
                                            </thead>
                                            <tbody><?php
                                            
                                            if($requests_no > 0){
                                                $count = $requests_no;
                                                $counter = 0;

while($counter < $count){ 

//$referee_id = $requests_tb[$counter]['referee'];
// print_r($referee_id);
$request_id = $requests_tb[$counter]['id'];
$request_status = $requests_tb[$counter]['status'];
$request_date = $requests_tb[$counter]['date'];
$request_from = $requests_tb[$counter]['from_id'];
$request_to = $requests_tb[$counter]['to_id'];

$boomer_id = ($request_from == $userid) ?  $requests_tb[$counter]['to_id']: $requests_tb[$counter]['from_id'] ;
$pay_direction = ($request_from == $userid) ?  "to": "from";

$boomer = DB::fetch("SELECT `username`, `whatsapp` FROM `users_tb` WHERE `id`='$boomer_id'")[0];
$boomer_uname = $boomer['username'];
$boomer_whatsapp = $boomer['whatsapp'];
$boomer_whatsapp = "+233".ltrim($boomer_whatsapp, '0');   
                                                                                                                                                                                                  
// $boomer_uname = $boomer['username'];
// $boomer_whatsapp = $boomer['whatsapp'];
// $boomer_whatsapp = "+233".ltrim($boomer_whatsapp, '0');



    ?>
                                                <tr>
                                                    <td><?= $counter+1 ?>/
                                                    
                                                    <?php if ($request_from == $userid){ ?>
                                                    <div class="btn-group dropup">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-share-alt"></i>&nbsp;&nbsp; Finalize <span class="caret"></span></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a class="proof_data" id="<?= $boomer_id ?>" req= "<?= $request_id ?>"><i class="fa fa-credit-card"></i>&nbsp;&nbsp; Add Proof</a></li>
                                        <li><a href="https://wa.me/<?= $boomer_whatsapp ?>/"><i class="fa fa-whatsapp"></i>&nbsp;&nbsp; Contact</a></li>
                                        <li><a href="" data-toggle="modal" data-target="#RequestReportModal" data-whatever="@getbootstrap"><i class="fa fa-times"></i>&nbsp;&nbsp; Report</a></li>
                                        
                                    </ul>
                                                    </div>
                                                    <?php } else {  ?>
                                                        <div class="btn-group dropup">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-edit"></i>&nbsp;&nbsp; Confirm <span class="caret"></span></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a class="approve_data" id="<?= $boomer_id ?>" req= "<?= $request_id ?>"><i class="fa fa-lock"></i>&nbsp;&nbsp; Approve</a>
                                    
                                    </li>
                                       
                                        <li><a href="https://wa.me/<?= $boomer_whatsapp ?>/"><i class="fa fa-whatsapp"></i>&nbsp;&nbsp; Contact</a></li>
                                        <li><a href="" data-toggle="modal" data-target="#RequestReportModal" data-whatever="@getbootstrap"><i class="fa fa-times"></i>&nbsp;&nbsp; Report</a></li>
                                        
                                    </ul>
                                </div>

                             <?php } ?>
                                </td>
                                                   
                                                    <td><?= $boomer_uname.' <br/><a class="view_data" id="'.$boomer_id.'" paydir = "'.$pay_direction.'"><i class="fa fa-fw fa-money"></i> Details</a>' ?></td>
                                                     <td><?= $request_date ?></td>
                                                    <td>1 Set - <?= $request_status ?></td>
                                                </tr>

<?php
$counter++; }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan = "3">You No Requests Currently</td>
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
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Quick Info
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> <?= $poweruser['firstname'].' '.$poweruser['surname']; ?>
                                    <span class="pull-right text-muted small"><em>Name </em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> <?= $poweruser['email']; ?>
                                    <span class="pull-right text-muted small"><em>Email</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> <?= $poweruser['username']; ?>
                                    <span class="pull-right text-muted small"><em>Username</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> <?= $powerlogin['phone']; ?>
                                    <span class="pull-right text-muted small"><em>Phone</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-upload fa-fw"></i> +233<?= ltrim($poweruser['whatsapp'], '0'); ?>
                                    <span class="pull-right text-muted small"><em>whatsapp</em>
                                    </span>
                                </a>
                                <!-- <a href="#" class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                    <span class="pull-right text-muted small"><em>11:13 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                    <span class="pull-right text-muted small"><em>10:57 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                    <span class="pull-right text-muted small"><em>9:49 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-money fa-fw"></i> Payment Received
                                    <span class="pull-right text-muted small"><em>Yesterday</em>
                                    </span>
                                </a> -->
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">Account Settings</a>
<br/><div class="list-group">
                             <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> <?= $powerwallet['method_id']; ?>
                                    <span class="pull-right text-muted small"><em>Payment Method</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> <?= $powerwallet['acc_type']; ?>
                                    <span class="pull-right text-muted small"><em>Account Type</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> <?= $powerwallet['reg_name']; ?>
                                    <span class="pull-right text-muted small"><em>Registration Name</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-upload fa-fw"></i> <?= $powerwallet['reg_number']; ?>
                                    <span class="pull-right text-muted small"><em>Registration Number</em>
                                    </span>
                                </a>
</div>
                                <a href="#" class="btn btn-default btn-block">Payment Settings</a>
                        </div><br/>
                        
                       
                        
                        <!-- <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Ref Network
                        </div> -->

                        <div class="panel-heading" id="ref_net_users">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Referal Network 
                                         
                                <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    
                                        
                                        <span class="fa fa-fw fa-circle text-success"></span> <?= $no_refs ?>
                                        <span class="fa fa-fw fa-check text-success"></span> <?= $no_settled ?>
                                        <span class="fa fa-fw fa-circle text-primary"></span> <?= $no_refs - $no_settled ?>
                                        
                                        

                                    
                                         <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#"> <span class="fa fa-fw fa-circle text-success"></span>Total [<?= $no_refs ?>] </a>
                                        </li>
                                        
                                        <li><a href="#"><span class="fa fa-fw fa-check text-success"></span>Bonus Settled [<?= $no_settled ?>]</a>
                                        </li>

                                        <li><a href="#"> <span class="fa fa-fw fa-circle text-primary"></span>Unsettled [<?= $no_refs - $no_settled ?>] </a>
                                        </li>
                                    </ul>
                                
                                </div>
                                </div>
                        </div>

                        <div class="row">
                <div class="col-lg-12 col-md-6 table-responsive">
                    
                                        <table id="" class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                   
                                                    <th>username</th>
                                                    <th>whatsapp</th>                                              
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i=1;
                                                // $reffer_id = DB::fetch("SELECT `referer` FROM `referal_tb` WHERE `referee`='$userid'")[0][0];

                                                $reffer = DB::fetch("SELECT `username`, `whatsapp` FROM `users_tb` WHERE `id`='$reffer_id'")[0];
                                                //print_r($reffer);

                                                $ref_ids = DB::fetch("SELECT `referee`, `status` FROM `referal_tb` WHERE `referer`='$userid'");
                                                $count = count($ref_ids);
                                                $counter = 0;
                                               //echo "hey ";
                                                
                                                

                                                    if(DB::count("SELECT `referee`, `status` FROM `referal_tb` WHERE `referer`='$userid'")>0){

                                                        while($counter < $count){ 

                                                    $referee_id = $ref_ids[$counter]['referee'];
// print_r($referee_id);
                                                $referee_status = $ref_ids[$counter]['status'];

                                                $referee = DB::fetch("SELECT `username`, `whatsapp` FROM `users_tb` WHERE `id`='$referee_id'")[0];
                                                $referee_uname = $referee['username'];
                                                $referee_whatsapp = $referee['whatsapp'];
                                                $referee_whatsapp = "+233".ltrim($referee_whatsapp, '0');;

                           

                                                            ?>
                                                            <tr>
                                                                <td><?= $i ?></td>
                                                                <td>
                                                                    <?php if ($referee_status == "unsettled") {
                                         ?>
                                         <span class="fa fa-fw fa-circle text-primary"></span>
                                        <?php }
                                        ?>

                                        <?= $referee_uname ?>

                                        <?php if ($referee_status == "settled") {
                                         ?>
                                         <span class="fa fa-fw fa-check text-success"></span>
                                        <?php }
                                        ?>
    
                                     </td>
                                                                
                                                                <td><a href="https://wa.me/<?= $referee_whatsapp ?>/" class="btn btn-default"> <i class="fa fa-fw fa-whatsapp"></i> Contact </a> </td>
                                                                
                                                                
                                                                
                                                                <form method="get" action="deposits.php">
                                                    <!-- <input type="hidden" name="wallet" value="<?php //echo $wallet ?>">
                                                    <input type="hidden" name="amount" value="<?php // echo $amount ?>"> -->
                                                    <!-- <input type="hidden" name="user" value="<?php //echo $username; ?>"> -->
                                                    <!-- <td><input type="submit" name="approve_submit" value="Make Admin" class="btn btn-primary"></td>
                                                
                                                <td><input type="submit" name="reject_submit" value="Make User" class="btn btn-warning"></td> -->
                                                                </form>
                                                                
                                                            </tr><?php
                                                           
                                                            $i++;
                                                            $counter++;
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
                        <!-- <a href="#"> -->
                            <div class="panel-footer">
                                <span class="pull-left">You have <?= site::fp_retain($ref_points) ?> in Referal Points</span>
                                <span class="pull-right"><i class="fa fa-check text-primary"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        <!-- </a> -->
                    </div>
                </div>
                        <!-- /.panel-body -->
                    </div>
                    
                    
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->