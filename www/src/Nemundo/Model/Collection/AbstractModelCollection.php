<?php

namespace Nemundo\Model\Collection;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Model\Definition\Model\AbstractModel;


abstract class AbstractModelCollection extends AbstractBaseClass
{

    /**
     * @var AbstractModel[]
     */
    private $modelList = [];


    abstract protected function loadCollection();

    public function __construct()
    {
        $this->loadCollection();
    }


    public function addModel(AbstractModel $model)
    {
        $this->modelList[] = $model;
        return $this;
    }


    /**
     * @return AbstractModel[]
     */
    public function getModelList()
    {
        return $this->modelList;
    }

}