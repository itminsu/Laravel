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
class Triangle extends Shape implements iResizable
{
    // define vaiables
    protected $base;
    protected $height;

    /**
     * Triangle constructor.
     * @param $in_name
     * @param $in_area
     * @param $in_base
     * @param $in_height
     */
    public function __construct($in_name, $in_base, $in_height)
    {
        parent::__construct($in_name);
        $this->base = $in_base;
        $this->height = $in_height;
    }// end __construct()

    // Abstract class method
    /**
     * @return float|int
     */
    public function calculateArea()
    {
        $this->area = ($this->base * $this->height) / 2;
        return ($this->area);
    }// end calculateArea()

    //Interface method
    /**
     * @param $mode
     * @param $percentage
     * @return string
     */
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

}// end Triangle class