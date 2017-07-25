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
            foreach ($_POST as $key => $value) {
                echo "$key:\t$value\n<br>";
            }
        } else {
            $view = new \Project4\Views\Customer\RegistrationForm();
            $view->output();
        }
    }
}