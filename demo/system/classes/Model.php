<?php
class Model{
    protected $connect;
    public $alert;
    protected $encrypt;
    
    public function __Construct(){
        
        $this->connect = CONNECTION;
        $this->encrypt = new PasswordEncryptDecrypt();
    }
    protected function insert($table,$values = array()){
        try{
            foreach ($values as $field => $v)
                $ins[] = ':' . $field;
            $ins = implode(',', $ins);
            $fields = implode(',', array_keys($values));
            $sql = "INSERT INTO $table ($fields) VALUES ($ins)";
            $sth = $this->connect->prepare($sql);
            foreach ($values as $f => $v){
                $sth->bindValue(':' . $f, $v);
            }
            $sth->execute();
            
            return true;
        }
        catch(EXCEPTION $e){
            echo "error: ".$e;
        }
    }

    protected function query($query){
      try
        {
            $stmt = $this->connect->prepare($query);
            $stmt->execute();
            $result=Array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { $result []= $row; }
            
            return $result;
        }
        catch(EXCEPTION $e){
            
            return $e;
        }
    }
    protected function get($query){
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        //set the resulting array to associative
        $output = [];
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result > 0){
            foreach ($result as $k => $v){
                //store database array in new array to be converted to JSON
                $output[$k] =  $v;
            }
        return $output;
        }else{
            return $result;
         }
    }
    protected function getLastID(){
        try{
            return $this->connect->lastInsertId();
        }catch(EXCEPTION $e){ $this->alert = "error: ".$e; }
    }
    protected function update($table, $id, $values = array()){
        try{
            foreach ($values as $field => $v){
                $ins[] = $field.'=:' . $field;
            }
            $ins = implode(',', $ins);
            $sth = $this->connect->prepare("UPDATE ".$table." SET ".$ins." WHERE ID =".$id);
            foreach ($values as $f => $v){
                $sth->bindValue(':' . $f, $v);
            }
            $sth->execute();
            
            return true;
        }
        catch(EXCEPTION $e){
            
            return ["info" => $e];
        }
    }
    protected function delete($table, $data =[]){
        foreach($data as $key => $val){
            $sth = $this->connect->prepare("DELETE FROM ".$table." WHERE ID=".$val);
            $sth->execute();
        }
        return true;
    }
    protected function del($table,$id){
        $sth = $this->connect->prepare("DELETE FROM ".$table." WHERE ID=".$id);
        $sth->execute();
        
        return true;
    }

    public function __Destruct(){
        $this->connect = null;
    }
    
    protected function count($query){
        $sql = $this->connect->query($query);
        return $sql->fetchColumn();
    }

}
?>