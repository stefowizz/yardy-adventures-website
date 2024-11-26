<?php
class HomeModel extends Model{
    
    public function getService($id){
        $query = "Select * From services WHERE id = $id";
        
        return $this->get($query);       
    }
    public function getServices(){
        $query = "Select * From services";
        
        return $this->query($query);       
    }
    

    // public function singleSession($id){
    //     $query = "SELECT * FROM sessions WHERE id = $id";
        
    //     return $this->get($query);       
    // }  
    // public function getUser($id){
    //     $query = "SELECT fname,lname,email FROM users WHERE id = $id";
        
    //     return $this->get($query);       
    // }
    // public function sessionCheck($user,$session){
    //     $query = "SELECT * FROM attendance WHERE user_id = $user AND sessions_id = $session";
    //     if($result = $this->get($query)){
    //         return true;
    //     }else{
    //         return false;
    //     }        
    // }

    public function put($table,$data=[]){
        return $this->insert($table,$data);
    }
}



?>