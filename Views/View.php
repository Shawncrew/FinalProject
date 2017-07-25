<?php
namespace Project4\Views;

class View {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function output() {
        $pageTitle = 'Project 4 | Web Programming';
        $currentUsername = 'nrylee';
        include($this->model->template);
    }
}