<?php

namespace Project4\Models\Repositories;
//use Project4\Models as Model;

class AirportRepository implements IRepository {
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
        $q = $this->db->FullQuery("SELECT * FROM Airport WHERE Id=$id;");
        if(\mysqli_num_rows($q)==0) {
            return null;
        } else {
            $airportArr = $q->fetch_assoc();
            return MapRowToAirport($airportArr);
        }
    }
    /** @return \Project4\Models\RentalCar */
    private static function MapRowToAirport($row) {
        $airport = new \Project4\Models\Airport();
        $airport->Id = $airportArr['airport_id'];
        $airport->_City = $airportArr['city'];
        $airport->_State = $airportArr['state'];
        $airport->_Country = $airportArr['country'];            
        $airport->_AirportCode = $airportArr['airportCode'];
        return $airport;
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
        $this->db->FullQuery("DELETE FROM Airport WHERE airport_id=$id");
    }
    public function Update($object) {
        throw new \BadFunctionCallException("Not Implemented");
    }
}