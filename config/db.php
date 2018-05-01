<?php
  class Database {
    private $host = "localhost";
    private $db_name = "user_api";
    public $conn;

    // get the databse connection
    public function getConnection() {
      $this->conn = null;

      try{
        $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name);
        $this->conn->exec("set names utf8");
      } catch(PDOException $exception) {
        echo "Connection error: " . $exception->getMessage();
      }
      return $this->conn;
    }
  }


  // https://www.codeofaninja.com/2017/02/create-simple-rest-api-in-php.html