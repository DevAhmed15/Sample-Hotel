<?php
//db connection class using singleton pattern
class dbConnection
{

//variable to hold connection object.
private $servername;
private $username;
private $pass;
private $db;
private $connect;
public  $_instance;

//    protected static $db;

//private construct - class cannot be instantiated externally.
    private function __construct()
    {
    $this->servername="localhost";
   $this->username="root";
   $this->pass="";
   $this->db="hotel";
   
    
     self::$this->_instance =mysqli_connect($this->servername,$this->username,$this->pass,$this->db);
   
   if(!$this->_instance)
    die("Connection Failed : " . mysqli_connect_error());
}

public static function getConnection()
    {
   if (!self::$this->_instance) {
        new dbConnection();
        }  
    return self::$this->_instance;
 }
 }

    ?>
    