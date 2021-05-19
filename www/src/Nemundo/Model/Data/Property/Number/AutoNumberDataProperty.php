<?php

namespace Nemundo\Model\Data\Property\Number;

use Nemundo\Model\Data\Property\AbstractDataProperty;
use Nemundo\Model\Data\TypeValue\ModelTypeValueList;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Model\Type\Number\AutoNumberType;
use Nemundo\Model\Value\ModelDataValue;

class AutoNumberDataProperty extends AbstractDataProperty
{

    /**
     * @var AutoNumberType
     */
    protected $type;

    public function __construct(AbstractModelType $type, ModelTypeValueList $typeValueList, AbstractModel $model)
    {

        parent::__construct($type, $typeValueList, $model);

        $data = new  ModelDataValue();
        $data->model =$model;
        $data->field = $this->type;
        $maxValue = $data->getMaxValue();

        if ($maxValue == '') {
            $maxValue = $this->type->startNumber - 1;
        }
        $maxValue++;

        $this->typeValueList->setModelValue($this->type, $maxValue);

    }

}