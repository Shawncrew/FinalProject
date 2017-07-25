<?php

namespace Project4\Models\Repositories;
//use Project4\Models as Model;

class rental_car_inventoryRepository implements IRepository {
    /** @var \Project4\Models\Repositories\Database */
    private $db;
    public function __construct(Database $database = null) {
        if($database==null) {
            $this->$db = new \Project4\Models\Repositories\Database();
        } else {
            $this->$db = $database;
        }
    }
   
    /** @return \Project4\Models\rental_car_inventory */
    public function SelectById(int $car_id) {
        // TODO: Need to cleanse the inputs.
        $q = $this->db->FullQuery("SELECT * FROM rental_car_inventory WHERE Id=$car_id;");
        if(\mysqli_num_rows($q)==0) {
            return null;
        } else {
            $$rental_car_inventoryArr = $q->fetch_assoc();
            return MapRowTorental_car_inventory($rental_car_inventoryArr);
        }
    }
    /** @return \Project4\Models\rental_car_inventory */
    private static function MapRowTorental_car_inventory($row) {
        $rental_car_inventory = new \Project4\Models\rental_car_inventory();
        $rental_car_inventory->Id = $rental_car_inventoryArr['car_id'];
        $rental_car_inventory->_Make = $rental_car_inventoryArr['make'];
        $rental_car_inventory->_Model = $rental_car_inventoryArr['model'];
        $rental_car_inventory->_Year = $rental_car_inventoryArr['year'];            
        $rental_car_inventory->_Type = $rental_car_inventoryArr['type'];
        $rental_car_inventory->_MaxPassengers = $rental_car_inventoryArr['maxPassenger'];
        $rental_car_inventory->_VIN = $rental_car_inventoryArr['vin#'];
        $rental_car_inventory->_Color = $rental_car_inventoryArr['color'];
        $rental_car_inventory->_Pricing = $rental_car_inventoryArr['pricing'];
        return $rental_car_inventory;
    }
    
    /** @return \Project4\Models\rental_car_inventory */
    
    public function SelectAll() {
        throw new \BadFunctionCallException("Not Implemented");
    }
    public function Insert($object) {
        throw new \BadFunctionCallException("Not Implemented");
    }
    /** @return int */
    public function Delete(int $id) {
        $this->db->FullQuery("DELETE FROM Customers WHERE car_id=$id");
    }
    public function Update($object) {
        throw new \BadFunctionCallException("Not Implemented");
    }
}