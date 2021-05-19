<?php

namespace Nemundo\Core\Validation;


use Nemundo\Core\Base\AbstractBase;

class NumberValidation extends AbstractBase
{

    public function isNumber($number)
    {
        return is_numeric($number);
    }

}