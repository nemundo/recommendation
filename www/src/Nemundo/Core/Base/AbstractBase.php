<?php

namespace Nemundo\Core\Base;

use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;


abstract class AbstractBase
{

    public function __get($name)
    {
        (new LogMessage())->writeError('Property Access does not exist:' . $name);
    }


    public function __set($name, $value)
    {
        (new LogMessage())->writeError('Property Write does not exist:' . $name);
        (new Debug())->write($value);
    }


    protected function checkProperty($propertyName)
    {
        $returnValue = true;

        if (is_array($propertyName)) {

            foreach ($propertyName as $line) {
                if (!$this->checkProperty($line)) {
                    $returnValue = false;
                }
            }
            return $returnValue;
        } else {

            if ($this->$propertyName === null) {
                (new LogMessage())->writeError('Property ' . $propertyName . ' is not defined.');
                $returnValue = false;
            }

            return $returnValue;

        }

    }


    protected function checkPropertyOnNull($propertyName)
    {
        $returnValue = true;


        if ($this->$propertyName === null) {
            (new LogMessage())->writeError('Property ' . $propertyName . ' is not defined.');
            $returnValue = false;
        }

        return $returnValue;


    }



    protected function checkBooleanProperty($propertyName)
    {

        $this->checkProperty($propertyName);

        if (!is_bool($this->$propertyName)) {
            (new LogMessage())->writeError(get_class($this) . '. ' . $propertyName . ' ist kein gültiger Boolean Wert. Value: ' . $this->$propertyName);
        }

    }


    protected function checkObject($propertyName, $object, $className)
    {

        // Throw Exception ???

        $returnValue = $this->checkProperty($propertyName);

        if ($returnValue) {
            if (!is_a($object, $className)) {
                (new LogMessage())->writeError($propertyName . ' did not get the correct Datentype. Datentype: ' . $className);
                $returnValue = false;
            }
        }

        return $returnValue;

    }

}
