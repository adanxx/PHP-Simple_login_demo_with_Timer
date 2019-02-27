<!--Header-->
<?php 
  require_once "include/connect.php";
  $title="Home";
  include_once("blocks/header.php");

  if(!isset($_SESSION['userLoggedIn'])){
     header("Location: login.php");
     exit();
  }
?>


 
 <div class="container">
    <div class="box-md">
   
      <div class="row">
        <div class="col-md-6 offset-md-3 border">
            <div class="lg-wrapper text-center">
                <h1>Welcome-Page</h1>
            </div>
        </div>
      </div>
    
    </div>
 </div>
  











<!--Footer-->
<?php
 include_once("blocks/footer.php")
?>