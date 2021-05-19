<?php


namespace Nemundo\Content\App\TimeSeries\Type\PeriodType;


class WeekSeasonPeriodType extends AbstractPeriodType
{

    protected function loadPeriodType()
    {
        $this->id = 6;
        $this->periodType = 'Week (Season)';
    }

}