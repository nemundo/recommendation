<?php

namespace Nemundo\Model\Data;


use Nemundo\Db\Filter\Filter;
use Nemundo\Model\Data\TypeValue\ModelTypeValueList;
use Nemundo\Model\Definition\Model\AbstractModel;

// ModelDataUpdate
class ModelUpdate extends AbstractModelUpdate
{

    /**
     * @var AbstractModel
     */
    public $model;

    /**
     * @var ModelTypeValueList
     */
    public $typeValueList;

    /**
     * @var Filter
     */
    public $filter;

}