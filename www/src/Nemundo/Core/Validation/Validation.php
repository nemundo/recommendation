<?php

namespace Nemundo\Core\Validation;


use Nemundo\Core\Base\AbstractBase;

class Validation extends AbstractBase
{

    public function isValue($value)
    {
        if (trim($value) == '') {
            return false;
        }

        return true;
    }

}

