<?php

namespace Nemundo\Core\Date\Weekday;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Structure\ForLoop;

class WeekdayReader extends AbstractDataSource
{

    // only weekday
    // hide weekend


    /**
     * @return WeekdayItem[]
     */
    public function getData()
    {
        return parent::getData();
    }

    protected function loadData()
    {

        $loop = new ForLoop();
        $loop->minNumber = 1;
        $loop->maxNumber = 7;
        foreach ($loop->getData() as $weekdayNumber) {

            $weekdayItem = new WeekdayItem();
            $weekdayItem->weekdayNumber = $weekdayNumber;
            $weekdayItem->weekday = (new Weekday())->getWeekday($weekdayNumber);
            $this->addItem($weekdayItem);

        }

    }

}