<?php
namespace Project4\Controllers;

class CustomerController {
    private $model;

    public function __construct() {
    }

    public function index() {
        $model = new \Project4\Models\Model();

        $view = new \Project4\Views\View($model);
        $view->output();
    }

    public function register() {
        if(\strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
            if(empty($_POST['username'])) {
                $view = new \Project4\Views\Customer\RegistrationForm("Username is required");
                $view->output();
            } else if(empty($_POST['email'])) {
                $view = new \Project4\Views\Customer\RegistrationForm("Email is required");
                $view->output();
            } else if(empty($_POST['password'])) {
                $view = new \Project4\Views\Customer\RegistrationForm("Password is required");
                $view->output();
            } else {
                $repo = new \Project4\Models\Repositories\CustomerRepository();
                if( ! $repo->EmailAvailable($_POST['email'])) {
                    $view = new \Project4\Views\Customer\RegistrationForm("Sorry, the email " . $_POST['email'] . " is already in use.");
                    $view->output();
                } else if( ! $repo->UsernameAvailable($_POST['username'])) {
                    $view = new \Project4\Views\Customer\RegistrationForm("Sorry, the username " . $_POST['username'] . " is already in use.");
                    $view->output();
                } else {
                    $id = $repo->InsertBasic($_POST['username'], $_POST['email'], $_POST['password']);
                    $customer = $repo->SelectById($id);
                    if(!isset($_SESSION)) \session_start();
                    $_SESSION['user_id'] = $customer->Id;
                    $_SESSION['user_username'] = $customer->_Username;
                    $_SESSION['user_fname'] = $customer->_FirstName;
                    $_SESSION['user_lname'] = $customer->_LastName;
                    if(empty($_SESSION['order_checkout_in_progress'])) {
                        header("Location: /Project4/Customer/Edit/$id/You%20have%20been%20registered%20successfully");
                        // $view = new \Project4\Views\Customer\Edit($customer, "You have been registered successfully!");
                        // $view->output();
                    } else {
                        //TODO: Handle this.
                        $view = new \Project4\Views\Customer\RegistrationForm("Something went wrong...");
                        $view->output();
                    }
                }
            }
        } else {
            $view = new \Project4\Views\Customer\RegistrationForm();
            $view->output();
        }
    }

    public function edit(int $id) {
        if(!isset($_SESSION)) \session_start();
        $repo = new \Project4\Models\Repositories\CustomerRepository();
        $msg = '';
        if(\strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
            if(! (isset($_SESSION['user_id']) && $_SESSION['user_id']==$id)) {
                \session_abort();
                header("Location: /Project4/Customer/Login/Error%20with%20login%20account%20not%20updated");
                return;
            } else {
                $customer = new \Project4\Models\Customer();
                $customer->Id=(int)$_POST['customer_id'];
                $customer->_Username=$_POST['username'];
                $customer->_Email=$_POST['email'];
                $customer->_FirstName=$_POST['fname'];
                $customer->_LastName=$_POST['lname'];
                $customer->_Phone=$_POST['phone#'];
                $customer->_StreetAddress=$_POST['addr1'];
                $customer->_StreetAddress2=$_POST['addr2'];
                $customer->_City=$_POST['city'];
                $customer->_State=$_POST['state'];
                $customer->_Zip=$_POST['zip'];
                $repo->Update($customer);
                $msg = "Info Successfully Updated!";
            }
        }
        $c = $repo->SelectById($id);
        $_SESSION['user_id'] = $c->Id;
        $_SESSION['user_username'] = $c->_Username;
        $_SESSION['user_fname'] = $c->_FirstName;
        $_SESSION['user_lname'] = $c->_LastName;     
        $view = new \Project4\Views\Customer\Edit($c, $msg);
        $view->output();        
    }
}