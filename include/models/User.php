<?php
  require_once "Constants.php";

class User{

    private $con, $sqlData;
    private $errorArray = array();

    public function __construct($conn){
        $this->con = $conn;
    }

    public static function isLoggedIn(){
        return isset($_SESSION['userLoggedIn']);
    }


    public function getUserData($em){

      try{   
            $query = $this->con->prepare("SELECT * FROM users WHERE email=:em");
            $query->bindParam(':em', $em); 
            $query->execute();
            

            if($query->rowCount() != 0){
                return $query->fetch(PDO::FETCH_ASSOC); //retreive the data as an array
            }
            else{
              return $query->errorInfo();
            }

        } catch (PDOException $ex) {
            return "Error: " . $ex->getMessage();
        }

    }

    public function login($em, $pw){
        $cryptPass = md5($pw);

        $query = $this->con->prepare("SELECT * FROM users WHERE email=:em AND password=:pw");
        $query->bindParam(":em", $em);
        $query->bindParam(":pw", $cryptPass);

        $query->execute();

        if($query->rowCount() == 1) {
            
            $this->sqlData = $this->getUserData($em);
            
            return true;
        }
        else {
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
        }

    }

    public function getUserId(){
        return $this->sqlData['id'];
    }

    public function getUsername(){
        return $this->sqlData['username'];
    }

    public function getEmail(){
        return $this->sqlData['email'];
    }

    public function getPassword(){
        return $this->sqlData['password'];
    }

    public function getCreatedAt(){
        return $this->sqlData['createdAt'];
    }

    public function getError($error) {
        if(in_array($error, $this->errorArray)) {
            return "<span class='errorMessage text-danger'>$error</span>";
        }
    }

    public function getFirstError() {
        if(!empty($this->errorArray)) {
            return $this->errorArray[0];
        }
        else {
            return "";
        }
    }

    public function incrementCount(){

        try {
            
            $countId = 1;

            $query = $this->con->prepare("UPDATE counts SET number = number+1, createdAt = now() WHERE count_id=:id");
            $query->bindParam(":id", $countId);
            
            if(!$query->execute()){
                echo $query->errorInfo();
            }

        } catch (PDOException $th) {
            $th->getMessage();
        }
    }

    public function resetCount(){

        try {
            
            $countId = 1;
            $query = $this->con->prepare("UPDATE counts SET number = 0 , createdAt = now() WHERE count_id=:id");
            $query->bindParam(":id", $countId);
            
            if(!$query->execute()){
                echo $query->errorInfo();
            }

        } catch (PDOException $th) {
            $th->getMessage();
        }

        
    }

    public function getCount(){
        
        try {
            $countId = 1;
            $query = $this->con->prepare("SELECT number FROM counts WHERE count_id=:id");
            $query->bindParam(":id", $countId);
            
            if(!$query->execute()){
                echo $query->errorInfo();
            }

            $data = $query->fetch();

            return $data['number'];

        } catch (PDOException $th) {
            $th->getMessage();
        }
    }



} //End of class tag
?>