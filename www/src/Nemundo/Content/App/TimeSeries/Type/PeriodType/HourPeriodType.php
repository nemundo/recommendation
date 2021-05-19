<?php


namespace Nemundo\Content\App\TimeSeries\Type\PeriodType;


class HourPeriodType extends AbstractPeriodType
{

    protected function loadPeriodType()
    {
        $this->id = 5;
        $this->periodType = 'Hour';
    }

}