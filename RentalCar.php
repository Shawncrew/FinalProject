<?php

namespace Project4\Models\Repositories;
//use Project4\Models as Model;

class RentalRepository implements IRepository {
    /** @var \Project4\Models\Repositories\Database */
    private $db;
    public function __construct(Database $database = null) {
        if($database==null) {
            $this->$db = new \Project4\Models\Repositories\Database();
        } else {
            $this->$db = $database;
        }
    }
   
    /** @return \Project4\Models\RentalCar */
    public function SelectById(int $id) {
        // TODO: Need to cleanse the inputs.
        $q = $this->db->FullQuery("SELECT * FROM RentalCar WHERE Id=$id;");
        if(\mysqli_num_rows($q)==0) {
            return null;
        } else {
            $rentalArr = $q->fetch_assoc();
            return MapRowToRental($rentalArr);
        }
    }
    /** @return \Project4\Models\RentalCar */
    private static function MapRowToRental($row) {
        $rental = new \Project4\Models\RentalCar();
        $rental->Id = $rentalArr['car_id'];
        $rental->_Make = $rentalArr['make'];
        $rental->_Model = $rentalArr['model'];
        $rental->_Year = $rentalArr['year'];            
        $rental->_Type = $rentalArr['type'];
        $rental->_MaxPassengers = $rentalArr['maxPassenger'];
        $rental->_VIN = $rentalArr['vin#'];
        $rental->_Color = $rentalArr['color'];
        $rental->_Pricing = $rentalArr['pricing'];
        return $rental;
    }
    
    /** @return \Project4\Models\RentalCar */
    
    public function SelectAll() {
        throw new \BadFunctionCallException("Not Implemented");
    }
    public function Insert($object) {
        throw new \BadFunctionCallException("Not Implemented");
    }
    /** @return int */
    public function Delete(int $id) {
        $this->db->FullQuery("DELETE FROM RentalCar WHERE car_id=$id");
    }
    public function Update($object) {
        throw new \BadFunctionCallException("Not Implemented");
    }
}