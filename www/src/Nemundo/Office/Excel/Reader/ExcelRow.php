<?php

namespace Nemundo\Office\Excel\Reader;


use Nemundo\Core\Base\DataSource\AbstractRow;
use Nemundo\Office\Excel\Date\ExcelDate;

class ExcelRow extends AbstractRow
{

    public function getValue($name)
    {
        return parent::getValue($name);
    }


    public function getValueByNumber($number)
    {
        return parent::getValueByNumber($number);
    }


    public function getDate($name) {

        $date=(new ExcelDate())->getDate($this->getValue($name));
        return $date;

    }

    public function getDateByNumber($number) {

        $date=(new ExcelDate())->getDate($this->getValueByNumber($number));
        return $date;

    }




}