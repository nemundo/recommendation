<?php


namespace Nemundo\Content\App\TimeSeries\Type\PeriodType;


class YearPeriodType extends AbstractPeriodType
{

    protected function loadPeriodType()
    {
        $this->id = 4;
        $this->periodType = 'Year';
    }

}