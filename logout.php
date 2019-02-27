<?php
  
  session_start();
  session_destroy();
  $_SESSION['userLoggedIn'] = null;
  
  header("Location: index.php");

?>