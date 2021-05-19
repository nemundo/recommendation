<?php

namespace Nemundo\Core\Csv\Reader;


use Nemundo\Core\Base\DataSource\AbstractRow;
use Nemundo\Core\Type\DateTime\Date;

class CsvRow extends AbstractRow
{

    public function hasValue($name)
    {
        return parent::hasValue($name);
    }


    public function getValue($name)
    {
        return parent::getValue($name);
    }

    public function getDate($name) {

        $date = (new Date($this->getValue($name)));
        return $date;

    }

    public function getValueByNumber($number)
    {
        return parent::getValueByNumber($number);
    }

}