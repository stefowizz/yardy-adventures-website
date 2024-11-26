<?php
class Controller{
    protected $status = [
        'Inactive' => 0,
        'Active' => 1
        ];
        
    public $model;
    public $route;
    public $session;
    protected $encrypt;
    
    public function __contruct(){
         $this->session->start();
        $this->encrypt = new PasswordEncryptDecrypt();
    }
    
    protected function setkey($key, $value){
        $this->session->set($key, $value);
    }
    protected function get($key){
        return $this->session->get($key);
    }
    protected function remove($key){
         $this->session->delete($key);
    }
    public function regenerate(){
        $this->session->regenerate();
    }
    public function getSessionId(){
        return $this->session->getId();
    }
    function destroy(){
         $this->session->destroy();
    }
    public function isLoggedin(){
        if( $this->get('userid') !== null  && $this->get('username') !== null){
            return true;
        }
    }
}
