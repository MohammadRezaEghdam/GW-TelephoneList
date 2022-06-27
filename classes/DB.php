<?php

class DB {

    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpass = "";
    private $dbname = "telephonelist";

    public function __construct(){
        try{
            $this->connection = new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname, $this->dbuser, $this->dbpass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "ok";
        // Error handling
            }catch(PDOException $e){
              die("Failed to connect to DB: ". $e->getMessage());
            }
    }
}
?>