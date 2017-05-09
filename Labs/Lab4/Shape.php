<?php

/**
 * Created by PhpStorm.
 * User: Minsu Lee (w0293156)
 * Date: 10/9/16
 * Time: 1:46 PM
 */
abstract class Shape {
    protected $shape_name;
    protected $shape_area;

    public function __construct($shape_name) {
        $this->shape_name = $shape_name;
    }

    abstract function calculateArea();

    public function getShape_name() {
        return ($this->shape_name);
    }

}
?>