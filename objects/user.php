<?php
  class User {

    // databse connectio and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $user_id;
    public $name;
    public $email;
    public $password;

    // constructor with $db as databse connection 
    public function __constructor($db) {
      $this->conn = $db;
    }

    // read products
    function read(){
      // select all query
      $query = "SELECT
                  c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
              FROM
                  " . $this->table_name . " p
                  LEFT JOIN
                      categories c
                          ON p.category_id = c.id
              ORDER BY
                  p.created DESC";
      // prepare query statement
      $stmt = $this->conn->prepare($query);

      // execute query
      $stmt->execute();

      return $stmt;
    }
  }