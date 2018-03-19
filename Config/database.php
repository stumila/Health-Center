<?php

class database {
    static $host, $database, $user, $password,$connection;

    function __construct($host = "localhost", $database="przychodnia", $user="root", $password="oktaguna"){
        self::$host=$host;                         
        self::$database=$database;
        self::$user=$user;
        self::$password=$password;
    }

    function connect(){
        self::$connection = mysqli_connect(self::$host, self::$user, self::$password,  self::$database);

        if(!self::$connection){
            echo 'Error: ';
        }else{
            
            return self::$connection;
        }
    }
    function pconnect(){
        self::$connection = mysqli_connect('p:'.self::$host, self::$user, self::$password,  self::$database);

        if(!self::$connection){
            echo 'Error: ';
        }else{
            
        }
    }
    function query($q=""){
		return mysqli_query($this->connect(), $q);
    }
    function pquery($q=""){
		return mysqli_query(self::$connection, $q);
    }
    function disconnect(){
        mysqli_close(self::$connection);
    }

}


?>