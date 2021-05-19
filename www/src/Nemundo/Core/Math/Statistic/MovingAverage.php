<?php


namespace Nemundo\Core\Math\Statistic;


use Nemundo\Core\Base\AbstractBase;


// extends NumberDirectory

class MovingAverage extends AbstractBase
{

    public $movingNumber = 1;

    private $averageList = [];

    private $total = 0;

    private $count = 0;

    // addValue
    public function addNumber($number)
    {

        $this->total = $this->total + $number;
        $this->count++;

        if ($this->count == $this->movingNumber) {

            $this->averageList[] = $this->total / $this->count;

            $this->count = 0;
            $this->total = 0;

        }

        return $this;

    }


    public function getMovingAverageList()
    {

        return $this->averageList;

    }


    public function getLastAverageNumber()
    {

        $list = $this->getMovingAverageList();
        $lastValue = end($list);

        return $lastValue;

    }


    public function getMaxValue()
    {

        $maxValue = null;
        if (sizeof($this->averageList) > 0) {
            $maxValue = max($this->averageList);
        }
        return $maxValue;

    }


    public function getMinValue()
    {

    }


}