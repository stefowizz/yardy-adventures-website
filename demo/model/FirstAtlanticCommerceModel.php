<?php
class FirstAtlanticCommerceModel extends Model{
    
    public function getGatewaySettings(){
        $query = "SELECT * FROM fac_settings";
        return $this->get($query);
    }
    public function put($table, $data=[]){
        if(isset($data['id']) && !empty($data['id'])){
            $id = $data['id'];
            return $this->update($table, $id,$data);
        }else{
            return $this->insert($table,$data);
        }
        
    }
    public function getGatewayTransaction($SpiToken){
        $query = "SELECT * FROM fac_transactions WHERE `SpiToken` = '$SpiToken'";
        return $this->get($query);
    }
    
}

