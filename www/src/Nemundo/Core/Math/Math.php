<?php

namespace Nemundo\Core\Math;


use Nemundo\Core\Base\AbstractBase;

class Math extends AbstractBase
{


    public function pi()
    {
        $pi = pi();
        return $pi;
    }


    public function euler()
    {

        $euler = M_E;
        return $euler;

    }


    public function square($number)
    {
        $result = $number * $number;
        return $result;
    }


    public function squareRoot($number)
    {
        $squareRoot = sqrt($number);
        return $squareRoot;
    }


    public function sinus($number)
    {

    }


    public function cosinus($number)
    {


    }


    public function absoluteNumber($number)
    {
        return abs($number);
    }


}