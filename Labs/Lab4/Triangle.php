<?php

/**
 * Created by PhpStorm.
 * User: Minsu Lee (w0293156)
 * Date: 10/9/16
 * Time: 1:55 PM
 */
class Triangle extends Shape implements iResizable{

    private $base;
    private $height;

    public function __construct($shape_name, $base, $height ){
        parent::__construct($shape_name);
        $this->base = $base;
        $this->height = $height;
    }

    public function calculateArea() {
        if($this->base && $this->height){
            return "Area: " . ($this->base * $this->height)/2;
        }else {
            return "error";
        }
    }


    //Interface method
    public function resize($mode, $percentage){

        if(!empty($mode) && !empty($percentage)) {
            $height = $this->height;
            if($mode == "grow") {
                $height = $height + ($height * ($percentage / 100));
                return "Resized Area: " . ($this->base * $height)/2;
            }else{
                $height = $height - ($height * ($percentage / 100));
                return "Resized Area: " . ($this->base * $height)/2;
            }
        }else{
            return "Can not resize";
        }
    }
}
?>