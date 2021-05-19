<?php

namespace Nemundo\Model\Database;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Model\Collection\AbstractModelCollection;
use Nemundo\Project\AbstractProject;


abstract class AbstractDatabase extends AbstractBaseClass
{

    /**
     * @var AbstractProject
     */
    public $project;


    /**
     * @var AbstractModelCollection[]
     */
    private $collectionList = [];


    abstract protected function loadDatabase();


    public function __construct()
    {
        $this->loadDatabase();
    }


    protected function addCollection(AbstractModelCollection $collection)
    {
        $this->collectionList[] = $collection;
        return $this;
    }


    /**
     * @return AbstractModelCollection[]
     */
    public function getCollectionList()
    {
        return $this->collectionList;
    }


}