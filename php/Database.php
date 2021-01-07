<?php

require_once "constants/PRIVATE.php";

class Database{

    private string $username;
    private string $password;
    private string $host;
    private string $database;

    public function __construct(){
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->host = HOST;
        $this->database = DATABASE;
    }

    public function connect(){

        try{
            $connection = new PDO(
                "pgsql:host=$this->host;port=5432;dbname=$this->database",
                $this->username,
                $this->password,
                ["sslmode"  => "prefer"]
            );
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;

        }catch (PDOException $ex){
            die("Połącznie zakoczone niepowodzeniem".$ex->getMessage());
        }

    }

}