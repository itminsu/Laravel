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
class Circle extends Shape implements iResizable
{
    // define vaiables
    protected $radius;
    protected $Pi = M_PI;
    /**
     * Circle constructor.
     * @param $in_name
     * @param $in_area
     * @param $in_radius
     */
    public function __construct($in_name, $in_radius)
    {
        parent::__construct($in_name);
        $this->radius = $in_radius;
    }// end __construct()

    // Abstract class method
    /**
     * @return mixed
     */
    public function calculateArea()
    {
        $this->area =  $this->radius * $this->radius * $this->Pi;
        return ($this->area);
    }// end calculateArea()

    // Interface method
    /**
     * @param $mode
     * @param $percentage
     * @return string
     */

    public function resize($mode, $percentage)
    {

        if (!empty($mode) && !empty($percentage)) {
            $radius = $this->radius;
            if ($mode == "grow") {
                $radius = $radius + ($radius * ($percentage / 100));
                return "Resized Area: " . $radius * $radius * $this->PI;
            } else {
                $radius = $radius - ($radius * ($percentage / 100));
                return "Resized Area: " . $radius * $radius * $this->PI;
            }
        } else {
            return "Can not resize";
        }
    }
}// end Circle class

?>
