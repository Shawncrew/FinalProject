<?php
namespace Project4\Models\Repositories;

class Database {


    static private $dbName = "WebProgramming_Project4";
    static private $dbUsername = "administrator";
    static private $dbPassword = "security";

    /** @var \mysqli */
    private $sql;

    public function __construct() {
        $this->sql = null;
        $s = new \mysqli("localhost", Database::$dbUsername, Database::$dbPassword);
        if($s->select_db(Database::$dbName)) {
        }  else {
            $s->query('CREATE DATABASE '.Database::$dbName.';');
        }
        $s->close();
    }

    public function Connect() {
        $this->sql = new \mysqli("localhost", Database::$dbUsername, Database::$dbPassword, Database::$dbName);
    }

    public function Close() {
        $this->sql->close();
    }

    /** @return \mysqli_result */
    public function FullQuery($query) {
        $this->Connect();
        $result = $this->sql->query($query);
        $this->Close();
        return $result;
    }

    public function Query($query) {
        return $this->sql->query($query);
    }
}