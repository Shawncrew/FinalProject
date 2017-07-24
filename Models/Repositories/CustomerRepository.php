<?php
namespace Project4\Models\Repositories;
use Project4\Models as Model;

class CustomerRepository implements IRepository {

    private $db;
    public function __construct(Database $database = null) {
        if($database==null) {
            $this->$db = new Database();
        } else {
            $this->$db = $database;
        }
    }

    public function SelectById(int $id) {
        // TODO: Need to cleanse the inputs.
        $customerQuery = $this->db->query("SELECT * FROM Customer WHERE Id=$id");
        
    }
    public function SelectAll() {

    }
    public function Insert(Customer $object) {

    }
    public function Delete(int $id) {

    }
    public function Update($object) {

    }
}