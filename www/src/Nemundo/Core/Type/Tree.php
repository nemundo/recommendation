<?php

namespace Nemundo\Core\Type;


class Tree
{

    public $value;

    private $list = array();


    /**
     *
     * @param $parentTree Tree
     */
    function __construct($parentTree = null)
    {

        if ($parentTree !== null) {
            $parentTree->addItem($this);
        }


    }


    /**
     * @param $treeItem Tree
     */
    public function addItem($treeItem)
    {

        $this->list[] = $treeItem;

    }


    public function hasChildren()
    {

        $returnValue = false;
        if ($this->getCount() > 0) {
            $returnValue = true;
        }

        return $returnValue;

    }


    public function getCount()
    {

        $count = sizeof($this->list);
        return $count;

    }

    /**
     * @return Tree[]
     */
    public function getData()
    {

        return $this->list;


    }


}