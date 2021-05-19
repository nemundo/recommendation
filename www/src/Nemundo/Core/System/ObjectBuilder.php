<?php

namespace Nemundo\Core\System;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Log\LogMessage;

class ObjectBuilder extends AbstractBase
{

    public function getObject($className, $checkClass = true)
    {

        $object = null;
        if (class_exists($className)) {
            $object = new $className();
        } else {
            if ($checkClass) {
                (new LogMessage())->writeError('Class "' . $className . '" does not exist');
            }
        }

        return $object;

    }

}