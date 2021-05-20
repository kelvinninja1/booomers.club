<form class="user" method="post" class="validator-form" action="#setup">

  <div class="form-group">
    <label class="control-label">Full Name (N.O.K.)</label>
    <input type="text" class="form-control" name="nok" value="" placeholder="Enter Fullname"/>
  </div>
  <div class="form-group">
    <label class="control-label">Relation (N.O.K.)</label>
    <input type="text" class="form-control" name="nok_relation" value="" placeholder="Enter your Relation with N.O.K."/>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <label class="control-label">Phone (N.O.K.)</label>
      <input  id="phone" type="tel" class="form-control" name="phone">
    </div>
    <div class="col-sm-6">
      <label class="control-label">Country (N.O.K.)</label>
      <select class="form-control" id="address-country" name="country"></select>
    </div>
    <div class="col-sm-12">
      <span id="valid-msg" class="hide"></span>
      <span id="error-msg" class="hide"></span>
    </div>
  </div>

  <div class="form-group">
                           <label class="cr-styled">
                          <input type="checkbox" required>

                      </label>
                      I have read and I agree with all <a class="" data-toggle="modal" data-target="#PrivillagesModal"> <i class="fa fa-link"></i>
                      Terms &amp; Conditions</a>
                      </div>


                  <hr class="dotted">

  <input type="submit" class="btn btn-primary btn-user btn-block" value="Setup" name="setup"/>
  <hr>
  <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
    <i class="fab fa-google fa-fw"></i> Register with Google
  </a>
  <a href="index.html" class="btn btn-facebook btn-user btn-block">
    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
  </a> -->
</form>
