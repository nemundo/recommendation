<?php

namespace Nemundo\Model\Factory;


use Nemundo\Model\Type\AbstractModelType;

class ModelTypeFactory
{

    /**
     * @param $className
     * @return AbstractModelType
     */
    public function getModelType($className)
    {

        /** @var AbstractModelType $field */
        $type = new $className();

        return $type;

    }

}