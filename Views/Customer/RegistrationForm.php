<?php
namespace Project4\Views\Customer;

class RegistrationForm {
    private $template;

    /** @param \Project4\Models\Customer $model */
    public function __construct() {
        $this->template = __DIR__ . '/../../' . '/Templates/tmpRegisterCustomer.php';
    }

    public function output() {
        $pageTitle = "Customer Registration";
        include($this->template);
    }
}