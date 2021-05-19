<?php

namespace Nemundo\Core\Date\Month;

use Nemundo\Core\Base\DataSource\AbstractDataSource;


class MonthReader extends AbstractDataSource
{


    private $monthList;


    public function __construct()
    {
        $this->monthList = array(
            'de' => (array(1 => 'Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember')),
            'en' => (array(1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'))
        );
    }


    protected function loadData()
    {



        $monthShort = array(
            'de' => (array(1 => 'Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez')),
            'en' => (array(1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'))
        );


        $number = 1;
        foreach ($this->monthList['de'] as $month) {

            $item = new MonthItem();
            $item->month = $month;
            $item->monthShort = $monthShort['de'][$number];
            $item->monthNumber = $number;
            $this->addItem($item);
            $number++;

        }

    }


    /**
     * @return MonthItem[]
     */
    public function getData()
    {
        return parent::getData();
    }


    public function getMonth($monthNumber)
    {

        $month = $this->monthList['de'][$monthNumber];
        return $month;

    }

}