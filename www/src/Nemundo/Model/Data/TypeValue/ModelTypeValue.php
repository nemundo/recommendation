<?php

namespace Nemundo\Model\Data\TypeValue;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Model\Type\AbstractModelType;

class ModelTypeValue extends AbstractBase
{

    /**
     * @var AbstractModelType
     */
    public $type;

    /**
     * @var string
     */
    public $value;

}