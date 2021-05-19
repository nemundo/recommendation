<?php

namespace Nemundo\Core\Directory;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Sorting\SortingListOfObject;

class KeyValueList extends AbstractDataSource
{


    public function addKeyValue(KeyValue $keyValue)
    {

        $this->addItem($keyValue);
        return $this;

    }


    public function sortingByKey()
    {

        $sorting = new SortingListOfObject();
        $sorting->objectList = $this->list;
        $sorting->sortingProperty = 'key';
        $this->list = $sorting->getSortedListOfObject();

        return $this;

    }

    public function sortingByValue()
    {

        $sorting = new SortingListOfObject();
        $sorting->objectList = $this->list;
        $sorting->sortingProperty = 'value';
        $this->list = $sorting->getSortedListOfObject();

        return $this;

    }


    /**
     * @return KeyValue[]
     */
    public function getData()
    {
        return parent::getData();
    }

    protected function loadData()
    {

    }

}