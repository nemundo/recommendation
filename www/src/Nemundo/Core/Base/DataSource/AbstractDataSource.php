<?php

namespace Nemundo\Core\Base\DataSource;

use Nemundo\Core\Base\AbstractBaseClass;


// AbstractReader
abstract class AbstractDataSource extends AbstractBaseClass
{

    /**
     * @var bool
     */
    public $reverse = false;

    protected $list = [];

    protected $loaded = false;

    /**
     * @var int
     */
    protected $totalCount;

    abstract protected function loadData();

    /**
     * @return array
     */
    public function getData()
    {

        if (!$this->loaded) {

            $this->loadData();

            if ($this->reverse) {
                $this->list = array_reverse($this->list);
            }

            $this->loaded = true;

        }

        return $this->list;

    }


    /**
     * @return int
     */
    public function getCount()
    {
        $this->getData();
        $count = sizeof($this->list);
        return $count;
    }


    public function getTotalCount() {

        $count = $this->getCount();
        return $count;

    }


    /**
     * @return bool
     */
    public function hasItems()
    {

        $returnValue = false;
        if ($this->getCount() > 0) {
            $returnValue = true;
        }
        return $returnValue;

    }


    public function isEmpty()
    {

        $returnValue = false;
        if ($this->getCount() == 0) {
            $returnValue = true;
        }
        return $returnValue;

    }


    protected function addItem($item)
    {
        $this->list[] = $item;
        return $this;
    }

}
