<?php

/**
 * Created by PhpStorm.
 * User: Minsu Lee (w0293156)
 * Date: 10/9/16
 * Time: 1:55 PM
 */
// import class
require_once("Shape.php");
require_once("iResizable.php");
class Circle extends Shape implements iResizable{

    private $PI = M_PI;
    private $radius;

    public function __construct($shape_name, $radius){
        parent::__construct($shape_name);
        $this->radius = $radius;
    }

    //Abstract class method
    public function calculateArea() {
        if($this->radius){
            return "Area: " . ($this->radius) * ($this->radius) * ($this->PI) ;
        }else {
            return "error";
        }
    }

    //Interface method
    public function resize($mode, $percentage){

        if(!empty($mode) && !empty($percentage)) {
            $radius = $this->radius;
            if($mode == "grow") {
                $radius = $radius + ($radius * ($percentage / 100));
                return "Resized Area: " . $radius * $radius * $this->PI;
            }else{
                $radius = $radius - ($radius * ($percentage / 100));
                return "Resized Area: " . $radius * $radius * $this->PI;
            }
        }else{
            return "Can not resize";
        }
    }

}