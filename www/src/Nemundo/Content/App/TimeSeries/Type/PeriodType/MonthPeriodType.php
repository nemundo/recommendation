<?php


namespace Nemundo\Content\App\TimeSeries\Type\PeriodType;


class MonthPeriodType extends AbstractPeriodType
{

    protected function loadPeriodType()
    {
        $this->id = 3;
        $this->periodType = 'Month';
    }

}