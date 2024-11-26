<?php

class PasswordEncryptDecrypt {
    
    private $cost = 10;
    
    public function __construct($cost = 10) {
        $this->cost = $cost;
    }
    
    public function hash($password) {
        $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => $this->cost]);
        if (!$hash) {
            throw new Exception("Error hashing password");
        }
        return $hash;
    }
    
    public function verify($password, $hash) {
        return password_verify($password, $hash);
    }
    
}

?>
