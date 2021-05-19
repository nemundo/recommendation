<?php

namespace Nemundo\Core\Date\Week;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\Date;


// WeekNumber
class CalendarWeek extends AbstractBase
{

    /**
     * @var Date
     */
    public $startDate;

    /**
     * @var Date
     */
    public $endDate;


    public function __construct($week, $year)
    {

        $date = new \DateTime();
        $date->setISODate($year, $week);
        $this->startDate = new Date($date->format('Y-m-d'));

        $date->modify('+6 days');
        $this->endDate = new Date($date->format('Y-m-d'));

    }


}