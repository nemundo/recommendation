<?php

namespace Nemundo\Core\Directory;


use Nemundo\Core\Base\AbstractBase;

// UniquList
class UniqueDirectory extends AbstractBase
{

    public $startId=1;

    private $list = [];


    private $currentId;


    public function addKeyValue($key, $value) {

        $this->list[$key]=$value;
        return $value;

    }


    public function addValue($value)
    {

        if ($this->currentId ===null) {
            $this->currentId=$this->startId;
        }

        if (!in_array($value,$this->list)) {
            $this->list[$this->currentId] = $value;
        }

        $this->currentId++;

        /*
        $this->list[] = $value;
        $this->list = array_unique($this->list);
        $this->list = array_values($this->list);*/

        return $this;

    }

    public function sortList()
    {

        //sort($this->list);
        asort($this->list);
        return $this;

    }


    public function getList()
    {
        return $this->list;
    }


    // getKey
    public function getId($value)
    {

        $id = array_search($value, $this->list);
        return $id;
    }

}