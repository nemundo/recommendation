<?php

namespace Nemundo\Content\App\TimeSeries\Row;

use Nemundo\Content\App\TimeSeries\Data\Period\PeriodRow;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\DayPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\MonthPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\MonthSeasonPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\WeekPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\WeekSeasonPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\YearPeriodType;
use Nemundo\Core\Date\Week\WeekYearNumber;

class PeriodCustomRow extends PeriodRow
{


    public function getPeriodText() {

        $text='-';

        if ($this->periodTypeId == (new DayPeriodType())->id) {
            $text = $this->date->getIsoDate();
        }

        if ($this->periodTypeId == (new WeekPeriodType())->id) {
            $text= $this->getWeekYear();
        }

        if ($this->periodTypeId == (new MonthPeriodType())->id) {
            $text=$this->getMonthYear();
        }

        if ($this->periodTypeId == (new YearPeriodType())->id) {
            $text=$this->year;
        }

        if ($this->periodTypeId == (new WeekSeasonPeriodType())->id) {
            $text=$this->week;
        }

        if ($this->periodTypeId == (new MonthSeasonPeriodType())->id) {
            $text=$this->month;
        }

        return $text;

    }


    public function getPeriodNumber() {

        $number= 0;

        if ($this->periodTypeId == (new DayPeriodType())->id) {
            $number = (new WeekYearNumber())->getDayNumber( $this->date);
        }

        if ($this->periodTypeId == (new WeekPeriodType())->id) {
            $number = (new WeekYearNumber())->getWeekYearNumber( $this->week, $this->year);
        }

        if ($this->periodTypeId == (new MonthPeriodType())->id) {
            //$text=$this->getMonthYear();
            $number = $this->monthYear;  //(new WeekYearNumber())->getMonthYearNumber( $this->monthYeardate->getMonthNumber(), $this->date->getYear());
        }

        if ($this->periodTypeId == (new YearPeriodType())->id) {
            $number =  $this->year;
        }

        if ($this->periodTypeId == (new WeekSeasonPeriodType())->id) {
            $number=$this->week;

        }

        if ($this->periodTypeId == (new MonthSeasonPeriodType())->id) {
            $number=$this->month;
        }

        return $number;

    }




    public function getWeekYear()
    {

        $label = $this->week . '/' . $this->year;
        return $label;

    }

    public function getMonthYear()
    {

        $label = $this->month . '/' . $this->year;
        return $label;

    }

}