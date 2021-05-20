<form class="user" method="post" class="validator-form" action="#create">
  <div class="form-group">
    <label class="control-label">Fullname</label>
      <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Full Name" name="fullNames">
  </div>
  <div class="form-group row">
    <div class="col-sm-6 mt-1">
        <label class="control-label">Gender</label>
        <select name="gender" class="form-control">
          <option value="M">Male</option>
          <option value="F">Female</option>
          <option value="R">Rather Not Say</option>
        </select>
      </div>
      <div class="col-sm-6 mt-2">
        <label class="control-label">Date Of Birth (DOB)</label>
          <input type="date" class="form-control" name="dob" placeholder="Choose Date" value="" required/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label">Email</label>
    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="email">
  </div>
  <div class="form-group">
    <label class="control-label">Username/ID</label>
    <input type="text" class="form-control form-control-user input-disabled" id="exampleInputUname" placeholder="Username" name="userNames" value="<?=$_username?>" disabled/>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <label class="control-label">Password</label>
      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
    </div>
    <div class="col-sm-6">
      <label class="control-label">Repeat Password</label>
      <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="password2">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <label class="control-label">Phone</label>
      <input  id="phone" type="tel" class="form-control" name="phone">
    </div>
    <div class="col-sm-6">
      <label class="control-label">Country</label>
      <select class="form-control" id="address-country" name="country"></select>
    </div>
    <div class="col-sm-12">
      <span id="valid-msg" class="hide"></span>
      <span id="error-msg" class="hide"></span>
    </div>
  </div>
  <!-- <div class="form-group">
    <label class="control-label">Have a Promo Code?</label>
    <input type="text" class="form-control form-control-user" id="exampleInputPromo" placeholder="Promo Code" name = "promo">
  </div> -->
  <div class="form-group">
                           <label class="cr-styled">
                          <input type="checkbox" required>

                      </label>
                      I have read and I agree with all <a class="" data-toggle="modal" data-target="#PrivillagesModal"> <i class="fa fa-link"></i>
                      Terms &amp; Conditions</a>
                      </div>




                  <hr class="dotted">

  <input type="submit" class="btn btn-primary btn-user btn-block" value="Setup Account" name="signup"/>
  <hr>
  <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
    <i class="fab fa-google fa-fw"></i> Register with Google
  </a>
  <a href="index.html" class="btn btn-facebook btn-user btn-block">
    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
  </a> -->
</form>
