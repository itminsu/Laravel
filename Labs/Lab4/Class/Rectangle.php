<?php

/**
 * Created by PhpStorm.
 * User: Minsu Lee (w0293156)
 * Date: 10/9/16
 * Time: 1:55 PM
 */
// import class
require_once("Shape.php");

class Rectangle extends Shape
{
    // define vaiables
    protected $length;
    protected $width;

    /**
     * Rectangle constructor.
     * @param $in_name
     * @param $in_area
     * @param $in_length
     * @param $in_width
     */
    public function __construct($in_name, $in_length, $in_width)
    {
        parent::__construct($in_name);
        $this->length = $in_length;
        $this->width = $in_width;
    }// end __construct()

    // Abstract class method
    /**
     * @return mixed
     */
    public function calculateArea()
    {
        $this->area = $this->length * $this->width;
        return ($this->area);
    }// end calcuateArea()

}// end Rectangle class

?>