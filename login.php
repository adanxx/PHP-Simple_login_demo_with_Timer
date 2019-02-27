<!--Header-->
<?php 

  $title="Login";
  include_once("blocks/header.php");
  


  

  function getInputValue($email) {
    if(isset($_POST[$email])) {
       echo $_POST[$email];
    }
       
  }



?>

 <div class="container">
    <div class="row">
         <div class="col md-12 text-center">
                <div class="box-sm">
                   <div class="wrapper-mini-box" style= "padding-left: 20px; padding-right: 20px">
                        <h6><strong>Lockdown of system in effect :</strong></h6>
                        <hr>
                        <span>11:00</span>
                   </div>
                </div>
         </div>   
    </div>
 </div>

 <div class="container">
    <div class="box-md">
       <div class="row">
        <div class="col-md-6 offset-md-3 border p-0">
            <div class="wrapper text-center">
                <h1 class="m-0 lg-title">Login</h1>
                <?php  if(isset($userObj)){ echo $userObj->getError(Constants::$loginFailed);}?> <span id='count'></span>
                <form method="GET" id="fm-lg">
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="email" class="form-control" name="txtEmail" id="inputEmail"  value="<?php getInputValue('txtEmail');?>" placeholder="Email" required autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="password" class="form-control" name="txtPassword" id="inputPassword" placeholder="Password" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary btn-block"  id="btn-lg">Sign in</button>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="checked" name="check1" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                           Remember Me!
                        </label>
                      </div>
                    </div>
                  </div>
                </form>
          </div> <!---wrapper-end-->
        </div>
      </div>
    </div>
 </div>
  











<!--Footer-->
<?php
 include_once("blocks/footer.php")
?>