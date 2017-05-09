<?php

/**
 * Created by PhpStorm.
 * User: Minsu Lee (w0293156)
 * Date: 10/9/16
 * Time: 1:55 PM
 */
class Rectangle extends Shape{

    private $length;
    private $width;

    public function __construct($shape_name, $length, $width){
        parent::__construct($shape_name);
        $this->length = $length;
        $this->width = $width;
    }

    public function calculateArea() {
        if($this->length){
            return "Area: " . $this->length * $this->width;
        }else {
            return "error";
        }
    }

}

?>