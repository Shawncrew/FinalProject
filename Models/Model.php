<?php
namespace Project4\Models;

class Model {
    public $template;

    public function __construct() {
        $this->template = __DIR__ . '/../' . '/Templates/tmpHome.php';
    }
}