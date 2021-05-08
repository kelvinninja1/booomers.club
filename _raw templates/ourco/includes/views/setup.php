<?php
//require ('../includes/models/setup.php');
?>


<div class="modal fade" id="PrivillagesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
              <h4 class="modal-title" id="myModalLabel">Terms And Conditions</h4>
          </div>
          <div class="modal-body">
            <?php include ('../includes/views/disclaimer.html'); ?>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
      <!-- /.modal-content -->
   </div>
  <!-- /.modal-dialog -->
</div>



<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
      <div class="col-lg-7">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Almost Done, Now Lets Setup Your Acount!</h1>
            <p class="text-center text-primary"><?=$setupPageCaption?></p>
            <p class="text-center">Fill all Field Before clicking Setup</p>
            <hr class="clean">
          </div>

          <?php
          if (file_exists('../includes/views/'.$setupPage.'.php'))
            {
              require_once("../includes/views/$setupPage.php");
            }
            ?>
          <hr>
          <!-- <div class="text-center">
            <a class="small" href="recover">Forgot Password?</a>
          </div> -->
          <div class="text-center">
            <a class="small" href="#reason">Why is this neccesary?</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
