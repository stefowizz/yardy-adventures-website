<?php

class Connection{
    public static $connection = false;
    
    private function __construct(){
        
        
    }
    
    public static function connect($dbconfig){
        try{
            if(!self::$connection){
                $db = new PDO("mysql:host={$dbconfig['server']};dbname={$dbconfig['dbname']}", $dbconfig['user'], $dbconfig['dbpass']);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                self::$connection = $db;
                return self::$connection;
            }
        }
        catch(\PDOException $e){
            echo $e->getMessage();
            exit;
        }
    }
}
