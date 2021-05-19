<?php


namespace Nemundo\Content\App\TimeSeries\Type\PeriodType;


class WeekPeriodType extends AbstractPeriodType
{

    protected function loadPeriodType()
    {
        $this->id = 2;
        $this->periodType = 'Week';
    }

}