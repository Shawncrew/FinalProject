<?php
require_once __DIR__ . '/RequiredFiles.php';

$c = new \Project4\Models\Customer();
$c->_Username = 'testname';
$fc = new \Project4\Controllers\FrontController();
// $fc = new \Project4\Controllers\FrontController(array(
//     "controller"    => "test",
//     "action"        => "show",
//     "params"        => array(1)    
// ));
$fc->run();