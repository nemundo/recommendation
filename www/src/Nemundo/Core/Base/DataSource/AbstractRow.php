<?php

namespace Nemundo\Core\Base\DataSource;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;

abstract class AbstractRow extends AbstractBaseClass
{

    protected $data;

    public function __construct($data)
    {
        $data = array_change_key_case($data);
        $this->data = $data;
    }


    protected function getHeader()
    {
        $list = array_keys($this->data);
        return $list;
    }


    protected function hasValue($name)
    {

        $value=false;

        $name = strtolower($name);
        if (array_key_exists($name, $this->data)) {
            $value =true;
        }

        return $value;

    }


    protected function getValue($name)
    {

        $name = strtolower($name);

        $value = '';
        if (array_key_exists($name, $this->data)) {
            $value = trim($this->data[$name]);
        } else {
            (new LogMessage())->writeError('Row Column Name ' . $name . ' does not exist.');
            // Error Raise???
        }

        return $value;

    }


    protected function getValueByNumber($number)
    {

        $value = '';

        if (isset(array_values($this->data)[$number])) {
            $value = array_values($this->data)[$number];
        } else {
            (new LogMessage())->writeError('Row Field Number ' . $number . ' does not exist.');
            (new Debug())->write($this->data);
        }

        return $value;

    }


    protected function getData()
    {

        return $this->data;
    }


    public function getRowCount()
    {
        return sizeof($this->data);
    }


}