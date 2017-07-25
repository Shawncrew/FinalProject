<?php
namespace Project4\Views\Customer;

class Edit {
    private $model;
    private $template;

    /** @param \Project4\Models\Customer $model */
    public function __construct($model) {
        $this->model = $model;
        $this->template = __DIR__ . '/../../' . '/Templates/tmpCustomerEdit.php';
    }

    public function output() {
        $Model = $this->model;
        $currentUsername = $Model->_Username;
        $pageTitle = "Edit Customer | $currentUsername";
        include($this->model->template);
    }
}