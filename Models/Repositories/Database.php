<?php
namespace Project4\Models\Repositories;

class Database {


    const DB_NAME = "mydb";
    const DB_USERNAME = "nrylee";
    const DB_PASSWORD = "nr013174";

    /** @var \mysqli */
    private $sql;

    public function __construct() {
        $this->sql = null;
        $s = new \mysqli("localhost", self::DB_USERNAME, self::DB_PASSWORD);
        if($s->select_db(Database::$dbName)) {
        }  else {
            $s->query('CREATE DATABASE '.self::DB_NAME.';');
        }
        $s->close();
    }

    public function Connect() {
        $this->sql = new \mysqli("localhost", self::DB_USERNAME, self::DB_PASSWORD, self::DB_NAME);
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