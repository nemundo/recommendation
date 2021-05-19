<?php

namespace Nemundo\Model\Data\TypeValue;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Model\Type\AbstractModelType;

class ModelTypeValueList extends AbstractBase
{

    /**
     * @var ModelTypeValue[]
     */
    private $typeValueList = [];


    public function setModelValue(AbstractModelType $type, $value)
    {

        if (!is_null($value)) {

            $typeValue = new ModelTypeValue();
            $typeValue->type = $type;
            $typeValue->value = $value;

            $this->typeValueList[] = $typeValue;

        }

        return $this;

    }


    public function getTypeValueList()
    {
        return $this->typeValueList;
    }

}