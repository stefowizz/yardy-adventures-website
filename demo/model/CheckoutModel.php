<?php
class CheckoutModel extends Model{

    
    public function put($table, $data=[]){
        if(isset($data['id']) && !empty($data['id'])){
            $id = $data['id'];
            return $this->update($table, $id,$data);
        }else{
            return $this->insert($table,$data);
        }
    }

    public function checkSchedule($date, $time){
        $query = "SELECT id FROM orders WHERE date = $date AND time = $time";
        
        return $this->get($query);       
    }    
    public function getID(){
        return $this->getLastID();
    }
    public function updateOrder($table, $id,$data){
        return $this->update($table, $id,$data);
    }
}
