<?php

namespace Project4;

class Request {

    private $uri;
    private $params = array();

    public function __construct($uri, $params) {
        $this->uri = $uri;
    }
}