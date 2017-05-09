<?php

/**
 * Created by PhpStorm.
 * User: Minsu Lee (w0293156)
 * Date: 10/9/16
 * Time: 1:46 PM
 */

/**
 * Class Shape
 */
abstract class Shape
{
    // define vaiables
    protected $name;
//    protected $area;

    // define abstract method
    abstract public function calculateArea();

    /**
     * Shape constructor.
     * @param $in_name
     * @param $in_area
     */
    public function __construct($in_name)
    {
        $this->name = $in_name;
        //$this->area = $in_area;
    }// end __construct()

    /**
     * @return $this->name
     */
    public function getName()
    {
        return ($this->name);
    }// end getName()

//    /**
//     * @return mixed
//     */
//    public function getArea()
//    {
//        return ($this->area);
//    }// end getArea()



}// end Shape class

?>