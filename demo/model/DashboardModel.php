<?php
class DashboardModel extends Model
{
    
    public function getUsers()
    {
        $query = "Select * From users";
        
        return $this->query($query);
    }
    public function currentUser($id)
    {
        $query = "Select * From users Where id = $id LIMIT 1";
        
        return $this->get($query);
    }
    public function currentAffiliate($id)
    {
        $query = "Select * From affiliates Where user_id = $id LIMIT 1";
        
        return $this->get($query);
    }    
    public function getFacPayments()
    {
        $query = "Select * From fac_transactions";
        
        return $this->query($query);
    }  
    public function getFacSettings()
    {
        $query = "Select * From fac_settings LIMIT 1";
        
        return $this->get($query);
    } 
    public function getContents()
    {
        $query = "Select * From services";
        
        return $this->query($query);       
    }
    public function getAffiliateOrders($code)
    {
        $query = "Select * From orders Where affiliate = '$code'  and status = 'Paid'";
        
        return $this->query($query);
    }    
    
    public function getContent($id)
    {
        $query = "Select * From services WHERE id = $id";
        
        return $this->get($query);       
    }
    
    public function fileUpload($file,$fakename)
    {
        if (move_uploaded_file($fakename, $file)) {
               return true; 
        }
    }
    public function checkFileExist($file)
    {
        if (file_exists($file)) {
            return true;
        }
    }
    
    public function checkFileSize($fileSize)
    {
        if ($fileSize > 1) {
            return true;
        }
    }
    public function edit($table,$id,$data=[])
    {
        return $this->update($table, $data, $id);
    }
    public function checkFileType($fileType)
    {
        $fileformats = ['pdf','jpg','ppt','pptx','doc','docx','mp4','jpeg','zip'];
       
        if(in_Array($fileType, $fileformats)) {
            return true;
        }else{
            return false;
        }        
    }
    public function delete_content($table,$id)
    {
        return $this->del($table, $id);
    }
    
    public function counter($table, $param=null)
    {
        if($param !== null) {
            $sql = "SELECT COUNT(*) FROM $table WHERE $param";
        }else{
            $sql = "SELECT COUNT(*) FROM $table";
        }
        return $this->count($sql);
        
    }
    public function getmessages()
    {
        return false;
    }
    
    public function orders()
    {
        $query = "Select * From orders";
        
        return $this->query($query);        
    }
    
    function getRandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
    
        for ($i = 0; $i < 7; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        $querytest = "SELECT * FROM affiliates WHERE affiliate_code = \"$randomString\"";
        $affiliate = $this->query($querytest);
        if(isset($affiliate['id'])) {
            $this->getRandomString();
        }else{
            return $randomString;
        }
    }
    public function put($table, $data=[])
    {
        if(isset($data['id']) && !empty($data['id'])) {
            $id = $data['id'];
            return $this->update($table, $id, $data);
        }else{
            return $this->insert($table, $data);
        }
        
    }
}
?>
