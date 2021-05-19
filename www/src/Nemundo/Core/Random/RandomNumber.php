<?php

namespace Nemundo\Core\Random;


use Nemundo\Core\Base\AbstractBaseClass;


// NumberRandom
class RandomNumber extends AbstractBaseClass
{

    /**
     * @var int
     */
    public $minNumber = 0;

    /**
     * @var int
     */
    public $maxNumber = 100;

    public function getNumber()
    {
        $randomNumber = rand($this->minNumber, $this->maxNumber);
        return $randomNumber;
    }


    public function getDecimalNumber()
    {

        $factor = 10;
        $randomNumber = rand(($this->minNumber * $factor), ($this->maxNumber * $factor));
        $number = $randomNumber / $factor;
        return $number;

    }


}