<?php

namespace Nemundo\Model\Factory;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Model\Collection\AbstractModelCollection;


class ModelCollectionFactory extends AbstractBaseClass
{


    public function getModelCollectionByClassName($className)
    {

        if (!class_exists($className)) {
            (new LogMessage())->writeError('Class "' . $className . '" does not exist');
            return null;
        }

        /** @var AbstractModelCollection $collection */
        $collection = new $className();

        return $collection;

    }


}