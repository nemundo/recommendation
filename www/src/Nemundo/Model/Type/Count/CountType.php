<?php

namespace Nemundo\Model\Type\Count;


use Nemundo\Model\Type\AbstractModelType;

class CountType extends AbstractModelType
{

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->fieldName = 'count';
    }

}