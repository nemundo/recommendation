<?php

namespace Nemundo\Core\Check;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Log\LogMessage;

class ValueCheck extends AbstractBase
{

    public function hasValue($value)
    {

        $returnValue = true;
        if ((is_null($value)) || (trim($value) == '')) {
            $returnValue = false;
        }

        return $returnValue;

    }


    public function hasValueOrExit($value, $errorMessage='') {

        if (!$this->hasValue($value)) {
            (new LogMessage())->writeError('No Value. '.$errorMessage);
            exit;
        }

    }

}