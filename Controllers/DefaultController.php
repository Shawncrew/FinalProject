<?php
namespace Project4\Controllers;

class DefaultController {
    

    public function __construct() {
    }

    public function index() {
       	
        $view = new \Project4\Views\Index();
        $view->output();
    }
}