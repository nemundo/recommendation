<?php

namespace Nemundo\Core\Validation;


use Nemundo\Core\Base\AbstractBase;

class DateTimeValidation extends AbstractBase
{

    public function isDate($date)
    {

    }

    public function isTime($time)
    {

        $valid = true;
        try {
            new \DateTime($time);
        } catch (\Exception $exception) {
            $valid= false;
        }

        return $valid;

    }

}