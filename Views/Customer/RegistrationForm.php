<?php
namespace Project4\Views\Customer;

class RegistrationForm {
    private $template;
    private $msg;
    private $layout = __DIR__ . '/../../Templates/_DefaultLayout.php';
    /** @param \Project4\Models\Customer $model */
    public function __construct($msg = '') {
        $this->template = __DIR__ . '/../../Templates/tmpRegisterCustomer.php';
        $this->msg = $msg;
    }

    public function output() {
        $pageTitle = "Customer Registration";
        include($this->layout);
    }
}