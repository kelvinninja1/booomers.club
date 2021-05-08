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
                    <img class="img img-fluid img-responsive" src="../static/img/welcome0.jpg" /></center>
                    </div></div>
                    <h3 class="text-center mt-2">Welcome Back, Apologies for the delay in rolling out the next level and thanks for your pricelesss time, by the way we have some cards for you.</h3>

                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#large-modal">Extra large modal</button> -->

                        <br/>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-check-circle text-primary"></i> Get Started</button>

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


          <?php

          require_once("../includes/parts/scripts.php");

          // if ($refpage_url == "https://boomersclub.net/login" or $refpage_url =="https://beta.boomersclub.net/login" or $refpage_url == "http://localhost/boomers/login")

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
