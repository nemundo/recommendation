<?php


namespace Nemundo\Core\Date\Week;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\Date;


// DateNumber
class WeekYearNumber extends AbstractBase
{



    public function getDayNumber(Date $date) {

        $number = ($date->getYear()*400)+$date->getDayOfYear();
        return $number;


    }



    public function getWeekYearNumber($week, $year)
    {

        $weekYear = ($year * 52) + $week;
        return $weekYear;

    }



    public function getMonthYearNumber($month, $year)
    {

        $monthYear = ($year * 12) + $month;
        return $monthYear;

    }





    public function getText()
    {

    }

}