<?php

namespace Nemundo\Core\Math;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Log\LogMessage;


class PrimeNumber extends AbstractBaseClass
{

    /**
     * @var int
     */
    public $minNumber = 2;

    /**
     * @var int
     */
    public $maxNumber = 1000;


    public function getPrimeNumberList()
    {

        if ($this->minNumber < 1) {
            (new LogMessage())->writeError('Min Number kleiner als 1');
            exit;
        }

        $number = [];

        for ($n = $this->minNumber; $n <= $this->maxNumber; $n++) {
            $number[$n] = true;
        }

        for ($n = $this->minNumber; $n <= $this->maxNumber; $n++) {
            $count = $n;
            do {
                $count = $count + $n;
                $number[$count] = false;
            } while ($count < $this->maxNumber);
        }

        $returnList = [];
        for ($n = $this->minNumber; $n <= $this->maxNumber; $n++) {
            if ($number[$n]) {
                $returnList[] = $n;
            }
        }

        return $returnList;

    }

}
