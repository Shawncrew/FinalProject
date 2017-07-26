<?php
namespace Project4\Models\Repositories;
//use Project4\Models as Model;


class CustomerRepository implements IRepository {

    /** @var \Project4\Models\Repositories\Database */
    private $db;
    public function __construct(Database $database = null) {
        if($database==null) {
            $this->db = new \Project4\Models\Repositories\Database();
        } else {
            $this->db = $database;
        }
    }

    /** @return \Project4\Models\Customer */
    public function SelectById(int $id) {
        // TODO: Need to cleanse the inputs.
        $this->db->Connect();
        $q = $this->db->Query("SELECT * FROM customers WHERE customer_id=$id;");
        $found = $q->num_rows===1;
        if(! $found) {
            $this->db->Close();
            return null;
        } else {
            $customerArr = $q->fetch_assoc();
            $customer = self::MapRowToCustomer($customerArr);
            $this->db->Close();
            return $customer;
        }
    }

    /** @return \Project4\Models\Customer */
    private static function MapRowToCustomer($row) {
        $customer = new \Project4\Models\Customer();
        $customer->Id = $row['customer_id'];
        $customer->_City = $row['city'];
        $customer->_Email = $row['email'];
        $customer->_FirstName = $row['fname'];
        $customer->_LastName = $row['lname'];
        $customer->_Phone = $row['phone#'];
        $customer->_State = $row['state'];
        $customer->_StreetAddress = $row['addr1'];
        $customer->_StreetAddress2 = $row['addr2'];
        $customer->_Username = $row['username'];
        $customer->_Zip = $row['zip'];
        return $customer;
    }

    /** @return bool */
    public function UsernameAvailable(bool $username) {
        $this->db->Connect();
        $u = $this->db->sql->real_escape_string($username);
        $q = $this->db->Query("SELECT username FROM customers WHERE username='$u';");
        $available = $this->db->sql->affected_rows===0;
        $this->db->Close();
        return $available;
    }
    /** @return bool */
    public function EmailAvailable(bool $email) {
        $this->db->Connect();
        $e = $this->db->sql->real_escape_string($email);
        $q = $this->db->Query("SELECT username FROM customers WHERE email='$e';");
        $available = $this->db->sql->affected_rows===0;
        $this->db->Close();
        return $available;
    }

    /** @return \Project4\Models\Customer */
    public function SelectFromLogin(string $username, string $password) {
        $this->db->Connect();
        $u = $this->db->sql->real_escape_string($username);
        $p = $this->db->sql->real_escape_string($password);
        $q = $this->db->Query("SELECT username FROM customers WHERE username='$u' AND password='$p';");
        $notfound = $this->db->sql->affected_rows===0;
        if($notfound) {
            $this->db->Close();
            return null;
        } else {
            $customerArr = $q->fetch_assoc();
            $customer = self::MapRowToCustomer($customerArr);
            $this->db->Close();
            return $customer;
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
        $this->db->Connect();
        // you need to do the real_escape_string on every string that you place in the table
        $u = $this->db->sql->real_escape_string($username);
        $e = $this->db->sql->real_escape_string($email);
        $p = $this->db->sql->real_escape_string($password);
        $this->db->Query("INSERT INTO customers (username, email, password) VALUES ('$u', '$e', '$p')");
        $id = $this->db->sql->insert_id;
        if(!empty($this->db->sql->error)) echo $this->db->sql->error;
        $this->db->Close();
        return $id;
    }
    public function Delete(int $id) {
        $this->db->FullQuery("DELETE FROM customers WHERE customer_id=$id");
    }
    public function Update($object) {
        // you need to do the real_escape_string on every string that you place in the table
        $queryString = ("UPDATE customers SET x=$x, y=$y WHERE customer_id=$id");
        throw new \BadFunctionCallException("Not Implemented");
    }
}