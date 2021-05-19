<?php


namespace Nemundo\Core\Math\Random;


use Nemundo\Core\Base\AbstractBase;

class YesNoRandom extends AbstractBase
{


    public $likly = 1;


    public function __construct($likly=1)
    {
        $this->likly=$likly;
    }


    public function getRandom()
    {


        $randomNumber = rand(0, $this->likly);

        $value = false;
        if ($randomNumber == 0) {
            $value = true;
        }

        return $value;


    }





    public function getRandomNumber($max)
    {


        $randomNumber = rand(0, $max);
        return $max;


    }





}