<?php

namespace Nemundo\Db\Row;


class DataRow extends AbstractDataRow
{


    public function getHeader()
    {
        return parent::getHeader();
    }

    public function getValue($name)
    {
        return parent::getValue($name);
    }


    public function getValueByNumber($number)
    {
        return parent::getValueByNumber($number);
    }


    public function getData()
    {
        return parent::getData();
    }

}