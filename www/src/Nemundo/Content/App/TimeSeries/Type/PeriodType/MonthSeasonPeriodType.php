<?php


namespace Nemundo\Content\App\TimeSeries\Type\PeriodType;


class MonthSeasonPeriodType extends AbstractPeriodType
{

    protected function loadPeriodType()
    {
        $this->id = 7;
        $this->periodType = 'Month (Season)';
    }

}