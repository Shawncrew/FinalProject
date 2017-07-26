<?php
namespace Project4\Views\Customer;

class Edit {
    /** @var \Project4\Models\Customer */
    private $model;
    private $template;
    private $msg;
    private $layout = __DIR__ . '/../../Templates/_DefaultLayout.php';

    /** @param \Project4\Models\Customer $model
      * @param string  
      */
    public function __construct($model, $msg = '') {
        if(!isset($_SESSION)) \session_start();
        if(isset($_SESSION['user_id']) && $_SESSION['user_id']==$model->Id) {
            $this->model = $model;
            $this->template = __DIR__ . '/../../Templates/tmpCustomerEdit.php';
            $this->msg = $msg;
        } else {
            $this->template = __DIR__ . '/../../Templates/tmpLogin.php';
            $this->msg = "You cannot edit the profile for " . $model->_Username . ". You are not signed in.";
        }
    }

    public function output() {
        $pageTitle = "Edit Customer | " . $this->model->_Username;
        include($this->layout);
    }
}