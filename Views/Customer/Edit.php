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
    public function __construct($model=null, $msg = '') {
        $this->model = $model;
        $this->template = __DIR__ . '/../../Templates/tmpCustomerEdit.php';
        $this->msg = $msg;
    }

    public function output() {
        $pageTitle = "Edit Customer | " . $this->model->_Username;
        include($this->layout);
    }
}