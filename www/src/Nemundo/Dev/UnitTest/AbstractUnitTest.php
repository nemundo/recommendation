<?php

namespace Nemundo\Dev\UnitTest;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;

abstract class AbstractUnitTest extends AbstractBaseClass
{

    abstract public function test();


    protected function showFailedMessage($message)
    {

        (new Debug())->write($message);

    }


    protected function isEqual($value1, $value2, $message = '')
    {


        if ($value1 !== $value2) {

            (new Debug())->write($this->getClassNameWithoutNamespace() . ' failed: ' . $message);

        }

    }


    protected function isTrue($value)
    {

    }


    protected function isFalse($value)
    {

    }


}