<?php

namespace Nemundo\Core\Date;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Type\DateTime\Date;

class CalendarReader extends AbstractDataSource
{

    /**
     * @var int
     */
    public $month;

    /**
     * @var int
     */
    public $year;


    public function __construct()
    {
        $date = new Date();
        $this->year = $date->getYear();
        $this->month = $date->getMonthNumber();
    }


    /**
     * @return Date[]
     */
    public function getData()
    {
        return parent::getData();
    }

    protected function loadData()
    {

        $this->checkProperty('month');
        $this->checkProperty('year');


        $dayCount = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);

        for ($n = 1; $n <= $dayCount; $n++) {
            $date = new Date($this->year . '-' . $this->month . '-' . $n);
            $this->addItem($date);
        }

    }

}