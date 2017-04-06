<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('settings.php');
Class Database{
    
    private $host = DB_SERVER;
    private $user = DB_USER;
    private $pass = DB_PASSWORD;
    private $data = DB;
    private $dbh;
    private $error;
    private $stmt;
    
    
    public function __construct() {
        $dns="mysql:host=".$this->host.";dbname=".$this->data;
        $options= array( PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        try{
            $this->dbh = new PDO($dns,  $this->user,  $this->pass,$options);
        } catch (Exception $ex) {
            $this->error = $ex->getMessage();
        }
    }
    
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }
    
    public function bind($param,$value,$type=null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param,$value,$type);
    }
    
    public function execute(){
        return $this->stmt->execute();
    }
    
    public function resultset(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function rowCount(){
        return $this->stmt->rowCount();
    }
    
    public function lastInsertId(){
        return $this->dbh->lastInsertId();
    }
    
    public function debugDumpParams(){
        return $this->stmt->debugDumpParams();
    }
    
}




?>