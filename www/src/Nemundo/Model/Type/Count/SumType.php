<?php

namespace Nemundo\Model\Type\Count;


use Nemundo\Model\Type\AbstractModelType;

class SumType extends AbstractModelType
{

    /**
     * @var AbstractModelType
     */
    public $sumType;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->fieldName = 'SUM(' . $this->sumType->getFieldName() . ') summe';
    }

}