<?php
namespace libreria\ORM;
/*
 * PHP CLASS
 */
class Modelo {
    private $data = array();
    function __construct($data=null) {
        $this->data = $data;
    }
    public function __get($name) {
        return $this->data[$name];
    }
    public function __set($name, $value) {
        $this->data[$name]=$value;
    }
}
