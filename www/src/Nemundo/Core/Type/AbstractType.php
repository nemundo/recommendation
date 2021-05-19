<?php

namespace Nemundo\Core\Type;

use Nemundo\Core\Base\AbstractBaseClass;

class AbstractType extends AbstractBaseClass
{

    protected $value;

    /**
     * @param null $value string
     */
    function __construct($value)
    {
        $this->changeValue($value);
    }

    /**
     * @param $value string
     */
    public function changeValue($value)
    {
        $this->value = $value;
    }


    public function getValue()
    {
        return $this->value;
    }

}