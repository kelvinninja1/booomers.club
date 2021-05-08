<?php
//require ('../includes/models/login.php');
?>

    <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <!-- <div class="col-lg-6 d-none d-lg-block"> <img class="img img-fluid img-responsive" src="img/ourco_dog.jpg" /></div> -->
              <div class="col-lg-6">
                <div class="p-5">

                  <div class="text-center">
                    <h3><i class="fa fa-lock fa-2x"></i></h3>
                    <h1 class="h4 text-gray-900 mb-2"><?=$topic?></h1>
                    <p class="mb-4"><?=$caption?></p>
                  </div>

                  <form name="recover_form" role="form" method="post" action="" autocomplete="on">
                    <?php if ($page == 0): ?>
                    <div class="form-group">
                        <div class="input-group">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-secondary" type="button"> <span class="fa fa-user"></span> </button>
                        </div>

                          <input type="test" class="form-control form-control-user" id="InputUsername" aria-describedby="emailHelp" placeholder="Enter Username..." name="username"/>
                        </div>

                      </div>

                      <label>
                          Send Access code via
                        </label>

                        <div class="form-group">

                          <select class="form-control" required="true" name="via" id="via" required="true">
                              <option value="via_sms" onclick="ver_sms()" >1. SMS</option>
                              <!-- <option value="via_email" onclick="ver_email()">2. Email</option> -->
                              <!-- <option selected >Choose Method</option> -->

                          </select>
                          <div id="method_note"><br/>A 6-digit Verification code will be sent to your email address associated with this account</div>

                      <script type="text/javascript">
                          function ver_sms() {

                              document.getElementById('method_note').innerHTML = '<br/>A 6-digit Verification code will be sent to your mobile number associated with this account via SMS';

                          }
                          function ver_email() {

                              document.getElementById('method_note').innerHTML = '<br/>A 6-digit Verification code will be sent to your email address associated with this account';

                          }
                      </script>
                      </div>

                      <div class="form-group">
                        <input name="continue_submit" type="submit" class="btn btn-primary btn-user btn-block form-control" value="Continue"/>
                      </div>
                    <?php elseif ($page == 1): ?>
                      <div class="form-group">
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button"> <span class="fa fa-lock"></span> </button>
                              </div>
                              <input type="hidden" name="token" value="<?=$token?>"/>
                              <input type="hidden" name="token_via" value="<?=$token_via?>"/>
                              <input type="number" class="form-control form-control-user" id="pinCode" aria-describedby="pinHelp" placeholder="6-digit code" name="pin"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="verify_code_submit" type="submit" class="btn btn-primary btn-user btn-block form-control" value="Verify Code"/>
                      </div>
                    <?php elseif ($page == 2): ?>
                      <div class="form-group">
                        <input name="proceed_submit" type="submit" class="btn btn-primary btn-user btn-block form-control" value="Proceed"/>
                      </div>
                    <?php endif; ?>

                  </form>
                  <hr>

                  <div class="text-center">
                  <p class="text-gray small">Don`t have an Account?
                    <a class="" href="join">Create an Account!</a>
                  </p>
                  </div>
                  <div class="text-center">
                  <p class="text-gray small">Remember Password?
                    <a class="" href="login">login</a>
                  </p>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
