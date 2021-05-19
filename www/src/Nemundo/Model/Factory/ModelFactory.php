<?php

namespace Nemundo\Model\Factory;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Model\Definition\Model\AbstractModel;


class ModelFactory extends AbstractBaseClass
{

    public function getModelByClassName($className)
    {

        if (!class_exists($className)) {
            (new LogMessage())->writeError('Class "' . $className . '" does not exist');
            return null;
        }

        /** @var AbstractModel $model */
        $model = new $className();

        return $model;

    }


}