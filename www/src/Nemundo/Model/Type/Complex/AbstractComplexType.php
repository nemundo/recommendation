<?php

namespace Nemundo\Model\Type\Complex;


use Nemundo\Model\Definition\Model\TypeListTrait;
use Nemundo\Model\Type\AbstractModelType;

abstract class AbstractComplexType extends AbstractModelType
{

    use TypeListTrait;

    abstract public function createObject();

}