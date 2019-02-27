<?php

    include_once("../include/connect.php");
    include_once("../include/models/FormValidator.php");
    include_once("../include/models/User.php");
    include_once("../include/models/Constants.php");



        
        

        if(isset($_POST['userEmail']) && isset($_POST['userPassword'])){

            $userEmail = $_POST['userEmail'];
            $userPass = $_POST['userPassword'];

        
        
            $newEmail =  validator::sanitizeFormUsername($userEmail);
            $newPassword =  validator::sanitizeFormUsername($userPass);

            $userObj = new User($conn);
            $wasSucces = $userObj->login($newEmail, $newPassword);

            
            if($wasSucces){
                
                $_SESSION["userLoggedIn"] = $newEmail;
                $userObj->resetCount();

                echo "{'status' : 1}";

            }else{

                $userObj->incrementCount();
                $count = $userObj->getCount();
               
                echo $count;
            }
        }

    
        
        






?>