<?php

namespace Nemundo\Core\Directory;


use Nemundo\Core\Base\AbstractBase;

class AutoIncrementalUniqueList extends AbstractBase
{

    /**
     * @var bool
     */
    public $ignoreGrossKleinschreibung = false;

    /**
     * @var array
     */
    //private $keyList=[];

    /**
     * @var array
     */
    private $valueList = [];


    public function addValue($value)
    {

        $id = $this->getId($value);
        if ($id === false) {
            $this->valueList[] = $value;
            $id = $this->getId($value);
        }

        return $id;

    }


    public function getId($value)
    {

        $id = array_search($value, $this->valueList);
        return $id;

    }


    public function getValueList()
    {
        return $this->valueList;
    }


    public function addKeyValue(KeyValue $keyValue)
    {
        $this->valueList[$keyValue->key] = $keyValue->value;
        return $this;
    }


    /**
     * @return KeyValue[]
     */
    public function getKeyValueList()
    {


        $list = [];

        foreach ($this->valueList as $key => $value) {
            $keyValue = new KeyValue();
            $keyValue->key = $key;
            $keyValue->value = $value;
            $list[] = $keyValue;
        }
        return $list;

    }

}