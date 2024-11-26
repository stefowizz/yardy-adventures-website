<?php
class Session {
    protected $session_id;
    protected $session_name;
    protected $session_lifetime;
    protected $session_path;
    protected $session_domain;
    protected $session_secure;
    protected $session_http_only;
    
    public function __construct($session_name = 'PHPSESSID', $session_lifetime = 0, $session_path = '/', $session_domain = null, $session_secure = false, $session_http_only = true) {
        $this->session_name = $session_name;
        $this->session_lifetime = $session_lifetime;
        $this->session_path = $session_path;
        $this->session_domain = $session_domain;
        $this->session_secure = $session_secure;
        $this->session_http_only = $session_http_only;
    }
    
    public function start() {
        session_name($this->session_name);
        session_set_cookie_params($this->session_lifetime, $this->session_path, $this->session_domain, $this->session_secure, $this->session_http_only);
        session_start();
        $this->session_id = session_id();
    }
    
    public function destroy() {
        session_destroy();
    }
    
    public function get($key) {
        return $_SESSION[$key] ?? null;
    }
    
    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }
    
    public function delete($key) {
        unset($_SESSION[$key]);
    }
    
    public function regenerate() {
        session_regenerate_id();
        $this->session_id = session_id();
    }
    
    public function getId() {
        return $this->session_id;
    }
}
