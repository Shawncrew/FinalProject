<?php
namespace Project4\Views\Customer;

class Edit {
    private $model;
    private $template;

    public function __construct($model) {
        $this->model = $model;
        $this->template = __DIR__ . '/../../' . '/Templates/tmpCustomerEdit.php';
    }

    public function output() {
        $pageTitle = 'Project 4 | Web Programming';
        $currentUsername = 'nrylee';
        $Model = $this->model;
        include($this->model->template);
    }
}