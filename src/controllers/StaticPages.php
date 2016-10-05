<?php

namespace Controller;

class StaticPages {

    function __construct() {
        
    }

    public function home() {
        getPage("static_pages/home");
    }

    public function sample() {
        getPage("static_pages/sample");
    }

    public function sampleVariable($params) {
        $params = "asdnasdlka";
        include linkPage("static_pages/sample");
    }

}
