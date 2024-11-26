<?php

class Token {
    private $token;
    private $expiration;

    public function __construct() {
        $this->token = bin2hex(random_bytes(16));
        $this->expiration = time() + (60 * 60 * 24); // 24 hours from now
    }

    public function getToken() {
        return $this->token;
    }

    public function isExpired() {
        return time() > $this->expiration;
    }
}
?>