<?php

namespace Nemundo\Model\Data\Property\Number;

use Nemundo\Model\Data\Property\AbstractDataProperty;
use Nemundo\Model\Data\TypeValue\ModelTypeValueList;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Model\Type\Number\PrefixAutoNumberType;
use Nemundo\Model\Value\ModelDataValue;

class PrefixAutoNumberDataProperty extends AbstractDataProperty
{

    /**
     * @var PrefixAutoNumberType
     */
    protected $type;

    public function __construct(AbstractModelType $type, ModelTypeValueList $typeValueList, AbstractModel $model)
    {

        parent::__construct($type, $typeValueList, $model);

        $data = new  ModelDataValue();
        $data->model = $model;
        $data->field = $this->type->autoNumber;
        $maxValue = $data->getMaxValue();

        if ($maxValue == '') {
            $maxValue = $this->type->startNumber - 1;
        }
        $maxValue++;
        $prefixAutoNumber = $this->type->prefix . $maxValue;

        $this->typeValueList->setModelValue($this->type->autoNumber, $maxValue);
        $this->typeValueList->setModelValue($this->type->prefixAutoNumber, $prefixAutoNumber);

    }

}