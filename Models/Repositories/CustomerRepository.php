<?php
namespace Project4\Models\Repositories;
//use Project4\Models as Model;


class CustomerRepository implements IRepository {

    /** @var \Project4\Models\Repositories\Database */
    private $db;
    public function __construct(Database $database = null) {
        if($database==null) {
            $this->$db = new \Project4\Models\Repositories\Database();
        } else {
            $this->$db = $database;
        }
    }

    /** @return \Project4\Models\Customer */
    public function SelectById(int $id) {
        // TODO: Need to cleanse the inputs.
        $q = $this->db->FullQuery("SELECT * FROM Customers WHERE Id=$id;");
        if(\mysqli_num_rows($q)==0) {
            return null;
        } else {
            $customerArr = $q->fetch_assoc();
            return MapRowToCustomer($customerArr);
        }
    }

    /** @return \Project4\Models\Customer */
    private static function MapRowToCustomer($row) {
        $customer = new \Project4\Models\Customer();
        $customer->Id = $customerArr['customer_id'];
        $customer->_City = $customerArr['city'];
        $customer->_Email = $customerArr['email'];
        $customer->_FirstName = $customerArr['fname'];            
        $customer->_LastName = $customerArr['lname'];
        $customer->_Phone = $customerArr['phone#'];
        $customer->_State = $customerArr['state'];
        $customer->_StreetAddress = $customerArr['addr1'];
        $customer->_StreetAddress2 = $customerArr['addr2'];
        $customer->_Username = $customerArr['username'];
        $customer->_Zip = $customerArr['zip'];
        return $customer;
    }

    /** @return bool */
    public function UsernameAvailable(bool $username) {
        $u = $this->db->sql->real_escape_string($username);
        $q = $this->db->FullQuery("SELECT username FROM Customers WHERE username='$u';");
        return \mysqli_num_rows($q)==0;
    }
    /** @return bool */
    public function EmailAvailable(bool $email) {
        $e = $this->db->sql->real_escape_string($email);
        $q = $this->db->FullQuery("SELECT username FROM Customers WHERE email='$e';");
        return \mysqli_num_rows($q)==0;
    }

    /** @return \Project4\Models\Customer */
    public function SelectFromLogin(string $username, string $password) {
        $u = $this->db->sql->real_escape_string($username);
        $p = $this->db->sql->real_escape_string($password);
        $q = $this->db->FullQuery("SELECT username FROM Customers WHERE username='$u' AND password='$p';");
        if(\mysqli_num_rows($q)==0) {
            return null;
        } else {
            $customerArr = $q->fetch_assoc();
            return MapRowToCustomer($customerArr);
        }
    }

    public function SelectAll() {
        throw new \BadFunctionCallException("Not Implemented");
    }

    public function Insert($object) {
        throw new \BadFunctionCallException("Not Implemented");
    }
    /** @return int */
    public function InsertBasic(string $username, string $email, string $password) {
        $u = $this->db->sql->real_escape_string($username);
        $e = $this->db->sql->real_escape_string($email);
        $p = $this->db->sql->real_escape_string($password);
        $this->db->Connect();
        $this->db->FullQuery("INSERT INTO Customers (username, email, password) VALUES ('$u', '$e', '$p')");
        $id = $this->db->sql->insert_id;
        $this->db->Close();
        return $id;
    }
    public function Delete(int $id) {
        $this->db->FullQuery("DELETE FROM Customers WHERE customer_id=$id");
    }
    public function Update($object) {
        throw new \BadFunctionCallException("Not Implemented");
    }
}