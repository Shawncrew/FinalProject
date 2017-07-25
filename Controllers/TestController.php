<?php
namespace Project4\Controllers;

class TestController {
    private $model;

    public function __construct() {
    }

    public function index() {
        $model = new \Project4\Models\Model();

        $view = new \Project4\Views\View($model);
        $view->output();
    }
}