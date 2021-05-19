<?php

namespace Nemundo\Core\Structure;


use Nemundo\Core\Base\DataSource\AbstractDataSource;

class ForLoop extends AbstractDataSource
{

    /**
     * @var int
     */
    public $minNumber = 0;

    /**
     * @var int
     */
    public $maxNumber = 100;

    /**
     * @var int
     */
    public $incrementalValue = 1;
// stepValue


    // function isFirst

    // function isLast



    protected function loadData()
    {

        for ($n = $this->minNumber; $n <= $this->maxNumber; $n = $n + $this->incrementalValue) {
            $this->addItem($n);
        }

    }

}