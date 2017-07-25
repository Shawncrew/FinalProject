<?php
namespace Project4\Controllers;

class DefaultController {

    public function index() {
        \header('Location: Views/Index.php');
    }
}