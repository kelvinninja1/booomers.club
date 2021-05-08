<?php
session_start();
$viewName = $_GET['url'];

require ('../includes/classes/DB.php');
require ('../includes/classes/function.php');
require ('../includes/classes/money.php');
require ('../includes/classes/data.php');
require ('../includes/classes/img.php');
require ('../includes/model.php');

$viewName = ($viewName == "index") ? "dashboard" : $viewName ;
// echo 'hey '.$viewName;

if (file_exists('../includes/views/'.$viewName.'.php'))
      {
        site::fp_checkLogin();
          if ($powerstatus['is_setup']<3) {
            // code...
            header('location: ../setup');
            exit;
          }
          require ('../includes/models/'.$viewName.'.php');

          echo'<!DOCTYPE html>
          <html lang="en">';

          // self::show("head");
          require_once("../includes/parts/head.php");
          echo '<body id="page-top" onload="init()">
          <div id="wrapper"> ';

          require_once("../includes/parts/sidebar.php");

          echo '<div id="content-wrapper" class="d-flex flex-column">
          <div id="content">';
        // echo '<!-- Navigation -->
        // <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        //   ';


          // self::show("header");
          require_once("../includes/parts/header.php");
          // self::show("sidebar");


          echo'<div class="container-fluid">';
          require_once("../includes/views/$viewName.php");

          echo'</div>
          <!-- /.container-fluid -->
             </div>
          <!-- End of Main Content -->';
 ?>

          <div class="modal fade" id="startupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- <div class="modal-header"><form action="#" method="GET">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Get Started</h4>
                    </div> -->
                    <div class="modal-body">
                    <div class="row"><div class="col-md-12">
                    <center>
                    <img class="img img-fluid img-responsive" src="../static/img/welcome4.jpg" /></center>
                    </div></div>
                    <!-- <h3 class="text-center mt-2">Welcome Back, Let`s get started.</h3> -->
                    <h3 class="text-center mt-2">Welcome Back! Here's a quick news roundup: We've provided step by step guide to the basics of getting started with the platform as well as news updates in the notification area.
                    </h3>

                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#large-modal">Extra large modal</button> -->

                        <br/>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#getStartedModal"><i class="fa fa-check-circle text-primary"></i> Get Started</button>

                    </form>
                    </div>
                </div>
                <!-- /.modal-content -->
             </div>
            <!-- /.modal-dialog -->
         </div>

                             <!-- <h2 class="heading"><i class="fa fa-square"></i> Modals</h2>
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#large-modal">Large modal</button>
							<br> -->
							<br>
							<div id="large-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<!-- <h4 class="modal-title" id="myModalLabel">Large Modal Title</h4> -->
										</div>
										<div class="modal-body center">
                      <div class="row">
                      <div class="col-md-2"><br/><br/><br/>

                        </div>
                        <div class="col-md-6"><br/><br/><br/>
                          <h1 class="heading">Will Be Dropping Soon</h1>
                        </div>
                        <div class="col-md-4">
                          <img class="img img-responsive" src="../static/img/undraw_empty_cart_co35.svg" alt="">
                        </div>

                      </div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
											<!-- <button type="button" class="btn btn-primary"><i class="fa fa-check-circle"></i> Save changes</button> -->
										</div>
									</div>
								</div>
							</div>

          <?php
          //parts::show("sidewidget");
          require_once("../includes/parts/footer.php");
          echo'</div>
          <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->';
          // self::show("footer");
          // self::show("scripts");

          ?>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <!-- <a class="btn btn-primary" href="login.html">Logout</a> -->
          <a class="btn btn-primary" href="../logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Currency Modal -->

  <div class="modal fade" id="CurrencyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Currency</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form role="form" action="" method="POST">
        <div class="modal-body">

          <fieldset>

              <label class="control-label">Choose Default Currency</label>
                      <select name="currency" class="form-control" required>
                      <?php
                      echo '<option value="ourco" selected>Ourcoin (DEFAULT) [ or Choose Currency from below] </option>';
                      $is_selected = '';

                              $i=1;


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
                        <p><h6>Current is: <font color="red"><?= $user_currency ?></font></h6></p>

          </fieldset>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close and Use Current</button>
           <input type="submit" class="btn btn-primary" name="update_currency_submit" value="Update with Change" />
        </div></form>
      </div>
    </div>
  </div>

  <!-- Modal -->

<!-- /.modal -->

<!-- Claim Modal -->
<div class="modal fade" id="claimModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Claim Assets</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
          </div>
          <div class="modal-body">

          <!-- <h3 class="text-center mt-2">Welcome Back, Let`s get started.</h3> -->
          <h4 class="text-center mt-2">Follow The Steps Below To Claim Old Assets</h4>

          <ul>
            <li>First Check and <a href="#"  data-toggle="modal" data-target="#adjustActivationModal" class="btn btn-warning">adjust your <span class="badge badge-primary badge-counter"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $minActivationFund, 1));?></span></a> minimum required funds for activation</li>

          </ul>
            <ol>

              <li><a href="../pages/funds?fund=add" class="btn btn-warning">Add Funds of <span class="badge badge-primary badge-counter"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $minActivationFund, 1));?></span></a> minimum or greater it is recommended you go slightly above at least</li>
              <li><a href="../pages/assets" class="btn btn-warning">Invest Funds of <span class="badge badge-primary badge-counter"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $minActivationFund, 1));?></span></a> minimum or greater it is recommended you go slightly above at least but not above what you have in your wallet</li></li>

              <?php if ($accountStatus == 'active'): ?>
                <li>Now You can Request To CashIn <a href="#" data-toggle="modal" data-target="#cashinSettlementModal" class="btn btn-warning">Request To CashIn <span class="badge badge-primary badge-counter"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $totalSettle, 0));?></span></a></li>

              <?php else: ?>
                <li>Now You can Request To CashIn <a href="#" onclick="alert('You must have an Active Asset or Account To Claim Settlement');"  class="btn btn-warning">Request To CashIn <span class="badge badge-primary badge-counter"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $totalSettle, 0));?></span></a></li>
              <?php endif; ?>

            </ol>

          <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#large-modal">Extra large modal</button> -->

              <br/>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
              <button type="button" class="btn btn-default" data-dismiss="modal"  data-toggle="modal" data-target="#getStartedModal"><i class="fa fa-check-circle text-primary"></i> Get Started</button>

          </div>
      </div>
      <!-- /.modal-content -->
   </div>
  <!-- /.modal-dialog -->
</div>

<!-- CashIn Modal -->
<div class="modal fade" id="cashinSettlementModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="cashinSettlementModalLabel">Claim Assets -CashIn</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
          </div>
          <div class="modal-body">

          <!-- <h3 class="text-center mt-2">Welcome Back, Let`s get started.</h3> -->
          <h4 class="text-center mt-2">Your can now cash in to your settlement wallet.</h4>

          <ul>
            <li>Total Funds: <span class="badge badge-primary badge-counter"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $totalSettle, 0));?></span> </li>

            <li>40% fee on Total (20% x2 cycles): <span class="badge badge-primary badge-counter"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $totalFees, 0));?></span> [September & October] </li>

            <li>Cashin Total: <span class="badge badge-primary badge-counter"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $cashinTotal, 0));?></span> </li>

          </ul>


          <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#large-modal">Extra large modal</button> -->

              <br/>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
              <form class="" action="" method="post">
                <input type="hidden" name="funds" value="ready">

               <input type="submit" class="btn btn-primary" name="claim_funds_submit" value="Claim Funds"> <i class="fa fa-check-circle text-primary"></i> </>
               </form>

          </div>
      </div>
      <!-- /.modal-content -->
   </div>
  <!-- /.modal-dialog -->
</div>

<!-- Currency Modal -->

<div class="modal fade" id="adjustActivationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adjust Activation Minimum</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form role="form" action="" method="POST">
      <div class="modal-body">

        <fieldset>
          <label> Enter your own minimum Activation Amount</label>
        <div class="input-group">
              <!-- <span class="input-group-addon"><i class="fas fa-database fa-sm fa-fw"></i></span> -->
              <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" type="button"><?=$user_currency_symbol?></button>
              </div>

              <input id="" name="amount" type="number" class="form-control" placeholder="Between <?=ceil(MONEY::cur_convert('ourco', $user_currency,10, 0))?> & <?=ceil(MONEY::cur_convert('ourco', $user_currency,$minActivationFund, 0))?> in <?=$user_currency?>" min="<?=ceil(MONEY::cur_convert('ourco', $user_currency,10, 0))?>" max="<?=ceil(MONEY::cur_convert('ourco', $user_currency,$minActivationFund, 0))?>" required="true" />

              <div class="input-group-append">
                <span class="input-group-text">.00</span>
              </div>
        </div>


          <p><h6>Current is: <font color="red"><?=ceil(MONEY::cur_convert('ourco', $user_currency,$minActivationFund, 0)) ?></font></h6></p>
            <small id="CurrencyValue" class="form-text text-muted mb-1">NB: Change in the values enter will directly affect your unclaimed assets based on the percentage of the actual activation minimum you entered</small>

        </fieldset>

      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close and Use Current</button>
         <input type="submit" class="btn btn-primary" name="adjust_activation_submit" value="Update with Change" />
      </div></form>
    </div>
  </div>
</div>

<!-- Modal -->

<!-- /.modal -->

<!-- Get Started Modal -->
<div class="modal fade" id="getStartedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Get Started</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </div>
        <div class="modal-body">

        <!-- <h3 class="text-center mt-2">Welcome Back, Let`s get started.</h3> -->
        <h4 class="text-center mt-2">Follow The Steps Below To Get Started</h4>

        <!-- <ul>
          <li>First Check and <a href="#" onclick="alert('In a few more hours you can be able to adjust your activation minimum');" class="btn btn-warning">adjust your <span class="badge badge-primary badge-counter"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $minActivationFund, 1));?></span></a> minimum required funds for activation</li>

        </ul> -->
          <ol>

            <li><a href="../pages/funds?fund=add" class="btn btn-warning">Add Funds of <span class="badge badge-primary badge-counter"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $minFundAmount, 0));?></span></a> minimum or greater it is recommended you go slightly above at least</li>
            <li><a href="../pages/assets" class="btn btn-warning">Invest Funds of <span class="badge badge-primary badge-counter"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $minAssetFund, 0));?></span></a> minimum or greater it is recommended you go slightly above at least but not above what you have in your wallet</li></li>
              <li><a href="../pages/funds?fund=withdraw" class="btn btn-warning">Withdraw Funds of <span class="badge badge-primary badge-counter"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $minCashoutAmount, 0));?></span></a> minimum or greater it is recommended you go slightly above at least</li>
            <!-- <li>Now You can Request To CashIn <a href="#" onclick="alert('You To Have an Active Asset or Account To Claim Settlement');"  class="btn btn-warning">Request To CashIn <span class="badge badge-primary badge-counter"><?= $user_currency_symbol ?><?= round(MONEY::cur_convert('ourco', $user_currency, $totalSettle, 0));?></span></a></li> -->
          </ol>

        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#large-modal">Extra large modal</button> -->

            <br/>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-check-circle text-primary"></i> Get Started</button> -->

        </div>
    </div>
    <!-- /.modal-content -->
 </div>
<!-- /.modal-dialog -->
</div>


          <?php

          require_once("../includes/parts/scripts.php");

          // if ($refpage_url == "https://boomersclub.net/login" or $refpage_url =="https://beta.boomersclub.net/login" or $refpage_url == "http://localhost/boomers/login")
          ?>
          <!-- <script type="text/javascript">
          $(document).ready(function() {
            $('#wrapper.toggled').find("#sidebar-wrapper").find(".collapse").collapse('hide');
             $("#menu-toggle").click(function(e) {
                  e.preventDefault();
                  $("#wrapper").toggleClass("toggled");
                  $('#wrapper.toggled').find("#sidebar-wrapper").find(".collapse").collapse('hide');
              });
          });
          </script> -->
          <?php

          if (preg_match('/login/',$refpage_url) == 1){
?>



<script>
          $(document).ready(function(){
            // Show the Modal on load
            $("#startupModal").modal("show");

            // Hide the Modal

          });
          </script>


<?php
}
require_once("../includes/models/dashboard-modals.php");
          echo'</body></html>';
          //parts::show("payload");



      } else {
        // echo "404 Created!";
      require_once("../includes/views/model404.php");
      die();

      }

//parts::show("head");

 ?>

<!-- <script type="text/javascript" id="editable">
console.log("hey");
	var loaderBar;
	var stage;
	var bar;
	var imageContainer;
	var currentImage;
	var loaderWidth;
	var loaderColor;
	var borderPadding;
	var preload;
	var oldItem;

	function init() {

    console.log("heyoo");
		canvas = document.getElementById("myCanvas");
		stage = new createjs.Stage(canvas);
		stage.enableMouseOver(10);

		borderPadding = 10;

		var barHeight = 20;
		loaderColor = createjs.Graphics.getRGB(247, 247, 247);
		loaderBar = new createjs.Container();

		bar = new createjs.Shape();
		bar.graphics.beginFill(loaderColor).drawRect(0, 0, 1, barHeight).endFill();

		imageContainer = new createjs.Container();
		imageContainer.x = 430;
		imageContainer.y = 200;

		loaderWidth = 300;
		stage.addChild(imageContainer);

		var bgBar = new createjs.Shape();
		var padding = 3
		bgBar.graphics.setStrokeStyle(1).beginStroke(loaderColor).drawRect(-padding / 2, -padding / 2, loaderWidth + padding, barHeight + padding);

		loaderBar.x = canvas.width - loaderWidth >> 1;
		loaderBar.y = canvas.height - barHeight >> 1;
		loaderBar.addChild(bar, bgBar);

		stage.addChild(loaderBar);

		manifest = [
			// {src: "card0.png", id: "image0"},
			{src: "card1.png", id: "image1"},
			{src: "card2.png", id: "image2"},
			{src: "card3.png", id: "image3"}
		];

		preload = new createjs.LoadQueue(true, "test/");

		// Use this instead to use tag loading
		//preload = new createjs.LoadQueue(false);

		preload.on("progress", handleProgress);
		preload.on("complete", handleComplete);
		preload.on("fileload", handleFileLoad);
		preload.loadManifest(manifest, true, "../static/_assets/art/");

		createjs.Ticker.framerate = 30;
	}

	function stop() {
		if (preload != null) {
			preload.close();
		}
	}

	function handleProgress(event) {
		bar.scaleX = event.loaded * loaderWidth;
	}

	function handleFileLoad(event) {
		var image = event.result;
		var w = image.width;
		var h = image.height;

		var bmp = new createjs.Bitmap(image).set({
			 scaleX: 1.0, scaleY: 1.0,
			 regX: w / 2, regY: h / 2.5,
			 rotation: Math.random() * 16 - 8,
			 cursor: "pointer",
			 x: borderPadding / 2 * 0.75, y: borderPadding / 2 * 0.7
		});
		bmp.on("click", handleClick);

		var border = new createjs.Shape(
				new createjs.Graphics().beginFill("#FFFFFF").drawRect(0, 0, w + borderPadding, h + borderPadding).endFill()
		).set({
			rotation: bmp.rotation,
			regX: w / 2,
			regY: h /2.5,
			scaleX: bmp.scaleX,
			scaleY: bmp.scaleY,
			shadow: new createjs.Shadow("#000000", 0, 0, 2.5)
		});

		var container = new createjs.Container();
		container.addChild(border, bmp);
		imageContainer.addChild(container);
		stage.update();
	}

	function handleClick(event) {
		currentItem = event.target.parent;
		createjs.Tween.get(currentItem, {override: true})
				.to({y: -300, rotation:currentItem.rotation+Math.random()*30-15}, 200, createjs.Ease.quadInOut)
				.call(tweenUpComplete)
				.to({y: 0, rotation:currentItem.rotation}, 600, createjs.Ease.quadOut)
				.on("change", handleTweenChange);
	}

	function handleTweenChange(tween) {
		stage.update();
	}

	function tweenUpComplete(event) {
		imageContainer.addChildAt(currentItem, 0);
	}

	function handleComplete(event) {
		loaderBar.visible = false;
		stage.update();
	}
</script> -->
</body>
</html>
