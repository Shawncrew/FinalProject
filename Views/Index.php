<?php
namespace Project4\Views;

class Index {
    private $template;
    private $msg;
    private $layout = __DIR__ . '/../Templates/_DefaultLayout.php';
    /** @param \Project4\Models\Customer $model */
    public function __construct($msg = '') {
        $this->template = __DIR__ . '/../Templates/tmpHome.php';
        $this->msg = $msg;
    }

    public function output() {
        $pageTitle = "Project 4 | Web Programming";
        $currentUsername = "sconnell";
        $isLoggedIn = false; // THIS NEEDS TO BE CHANGED FOR LOGIN FUNCTIONALITY
        include($this->layout);
    }
}