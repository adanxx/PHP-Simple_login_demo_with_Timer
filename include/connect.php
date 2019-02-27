<?php
   
   ob_start(); // turns on output buffering
   session_start();
   date_default_timezone_set("Europe/Copenhagen");

    $servername   = "localhost";
    $username     = "root";
    $password     = "";
    $db ="lg_demo";


    try {
        $conn = new PDO("mysql:host=localhost;dbname=$db", $username, $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully"; 
    
    } catch(PDOException $e) {
       echo "Connection failed: " . $e->getMessage();
    }



?>