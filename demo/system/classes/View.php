<?php

class View{
    
    protected static $data = array();
    
    public function __construct(){
        
    }

    public static function assign($key, $value) {
        self::$data[$key] = $value;
    }
    // public static function assignArray($key, $value) {
    //     self::$data[][$key] = $value;
    // }
    public static function render($template) {
        extract(self::$data);
        include_once (VIEWS.$template.'.php');
    } 

}
