<?php

namespace Nemundo\Core\Date;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Type\DateTime\Date;

class DayReader extends AbstractDataSource
{

    /**
     * @var Date
     */
    public $dateFrom;

    /**
     * @var Date
     */
    public $dateTo;


    protected function loadData()
    {

        if (!$this->checkObject('dateFrom', $this->dateFrom, Date::class)) {
            return;
        }

        if (!$this->checkObject('dateTo', $this->dateTo, Date::class)) {
            return;
        }


        $period = new \DatePeriod(
            new \DateTime($this->dateFrom->getIsoDate()),
            new \DateInterval('P1D'),
            new \DateTime($this->dateTo->addDay(1)->getIsoDate())
        );


        foreach ($period as $key => $value) {

            $date = new Date($value->format('Y-m-d'));
            $this->addItem($date);

        }

    }


    /**
     * @return Date[]
     */
    public function getData()
    {
        return parent::getData();
    }

}