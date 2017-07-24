<?php
namespace Project4\Models\Repositories;

class Database {


    static private $dbName = "WebProgramming_Project4";
    static private $dbUsername = "administrator";
    static private $dbPassword = "security";

    private $db;

    public function __construct() {
        $this->db = null;
        $sql = new \mysqli("localhost", Database::$dbUsername, Database::$dbPassword);
        if($sql->select_db(Database::$dbName)) {
        }  else {
            $sql->query('CREATE DATABASE '.Database::$dbName.';');
        }
        $sql->close();
    }

    public function Connect() {
        $this->db = new \mysqli("localhost", Database::$dbUsername, Database::$dbPassword, Database::$dbName);
    }

    public function Close() {
        $this->db->close();
    }

    public function Query($query) {
        $this->Connect();
        $result = $this->db->query($query);
        $this->Close();
        return $result;
    }
}