<?php
//require ('../includes/models/login.php');
?>
<!-- <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form name="login_form" role="form" method="post" action="" autocomplete="on" >

                                <div class="form-group">
                                    <input class="form-control" placeholder="Phone No." name="login_id" type="number" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" checked="true" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!- Change this to a button or input when using this as a form ->
                                <input type="submit" name="login_form_submit" class="btn btn-lg btn-primary btn-block" value="Login">


                        </form>

                        <hr>
            <p class="text-center text-gray">Forgot Password?</p>
            <a href="recover.php" class="btn btn-default btn-block">Recover Password</a>
<br/>
            <p class="text-center text-gray">Don't have an account?</p>
            <a href="join" class="btn btn-default btn-block">Sign Up / Join</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


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
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form name="login_form" role="form" method="post" action="" autocomplete="on" >
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputUsername" aria-describedby="emailHelp" placeholder="Username" name="login_id">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input name="login_form_submit" type="submit" class="btn btn-primary btn-user btn-block" value="Login"/>
                    <hr>
                    <!-- <a href="" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-bond fa-fw"></i> Login with Bond
                    </a> -->
                    <!-- <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  </form>
                  <hr>
                  <div class="text-center">
                  <p class="text-gray small">Forgot Password?
                    <a class="" href="recover">Recover</a></p>
                  </div>
                  <div class="text-center">
                  <p class="text-gray small">Don`t have an Account?
                    <a class="" href="join">Create an Account!</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
