<?php
class AuthModel extends Model{
    
    public $access = [
        "Owner" => 1,
        "Admin" => 2,
        "Users" => 3,
        ];
    
    
    public function checkUserLogin($email, $password){
        $query = "SELECT * FROM users WHERE email='$email' OR username='$email'";
        if($result = $this->get($query)){
            if($this->encrypt->verify($password,$result["password"])){
                return $result;
            }
        }else{
            return false;
        }
    }

    public function userRegister($table,$array=[]){
        if($this->insert($table,$array)) {return true;}
    }
    public function checkUserEmail($email){
        $query = "SELECT * FROM users WHERE email='$email'";
        if($result = $this->get($query)){
            return true;
        }else{
            return false;
        }
    }
    public function getid(){
        return $this->getLastID();
    }
    public function secure($password){
        return $this->encrypt->hash($password);
    }

}
