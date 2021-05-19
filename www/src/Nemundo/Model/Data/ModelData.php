<?php

namespace Nemundo\Model\Data;


use Nemundo\Model\Data\TypeValue\ModelTypeValueList;
use Nemundo\Model\Definition\Model\AbstractModel;


class ModelData extends AbstractModelData
{

    /**
     * @var AbstractModel
     */
    public $model;


    /**
     * @var ModelTypeValueList
     */
    public $typeValueList;

}