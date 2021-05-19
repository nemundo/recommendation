<?php


namespace Nemundo\Content\App\TimeSeries\Type\PeriodType;


class DayPeriodType extends AbstractPeriodType
{

    protected function loadPeriodType()
    {
        $this->id = 1;
        $this->periodType = 'Day';
    }

}