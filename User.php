<?php

class User{
    private $con, $sqlData ;

    public function __construct($con, $username){
        $this->con=$con;
        $query=$this->con->prepare("SELECT * FROM users WHERE username= :un");
        $query->bindParam(":un", $username);
        $query->execute();
        
        $this->sqlData= $query->fetch(PDO::FETCH_ASSOC);

    }
    public static function isLoggedIn(){
       return isset($_SESSION["userLoggedIn"]);
    }
    public function getUserName(){
        return $this->sqlData["username"];

    }
    public function getFirstName(){
        return $this->sqlData["firstName"];

   }
    public function getEmail(){
        return $this->sqlData["email"];

    }
}

?>